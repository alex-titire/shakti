<?php

namespace App\Nova\Actions;

use App\Models\Order;
use App\Models\OrderStatus;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Boolean;

class ExportRegistrations extends Action
{
    use InteractsWithQueue, Queueable;

    /**
     * The displayable name of the action.
     *
     * @var string
     */
    public $name = 'Export Registrations';

    /**
     * Get the fields available on the action.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        $statuses = OrderStatus::all();

        $options = [];
        foreach ($statuses as $status)
            $options[$status->id] = $status->caption;

        return [
            Text::make('File name'),
            Select::make('Set status', 'status')->options($options),
            Boolean::make('Skip same status', 'status_check')->default(1),
            Select::make('Gender')->options([
                'all' => 'All together',
                'separate' => 'Separate files',
                'm' => 'Men only',
                'f' => 'Women only'
            ])->default('all')
        ];
    }

    /**
    * Perform the action on the given models.
    *
    * @param  \Laravel\Nova\Fields\ActionFields  $fields
    * @param  \Illuminate\Support\Collection  $models
    * @return mixed
    */
    public function handle(ActionFields $fields, Collection $models)
    {
        $zip_name = $fields->file_name ."_". time() .".zip";

        $zip = new \ZipArchive();

        $filename = "storage/batch/$zip_name";

        if ($zip->open($filename, \ZipArchive::CREATE) !== TRUE) {
            exit("cannot open <$filename>\n");
        }

        $headline = "ID,SEX,NUME COMPLET,NUME BOTEZ,DATA NASTERII,AN CURS,ORAS,TAPAS AZA,CURSANT,INSTRUCTOR,ASHRAM,PARTICIPARE,PRET,PLATA,IMAGINE\n";
        if ($fields->gender == 'separate')
            $csv_data['m'] = $csv_data['f'] = $headline;
        else
            $csv_data = $headline;

        $update = [];

//        $status = OrderStatus::firstOrCreate(
//            ['key' => 'sent'],
//            ['caption' => 'Trimis']
//        );

        $users = $models->unique('user_id');
        foreach ($users as $item) {

            if ($item->order_status_id == $fields['status'] && (int) $fields['status_check'] > 0)
                continue ;

            if (($fields->gender == 'm' && strtolower($item->user->gender) != 'm') || ($fields->gender == 'f' && strtolower($item->user->gender) != 'f'))
                continue ;

            $sex = strtoupper($item->user->gender);
            $date = date("d.m.Y", strtotime($item->user->dob));
            $aza = $item->user->aza > 0 ? "AZA". $item->user->aza : "-";
            $name = str_replace([","], ' ', $item->first_name ." ". $item->last_name);
            $baptism = str_replace([","], '', $item->user->baptism_name);
            $city = str_replace(",", ' ', $item->user->city);
            $image = str_replace("registrations/{$item->event_id}/", "", $item->picture_front);
            $is_instructor = $item->user->is_instructor > 0 ? "Yes" : "No";
            $is_in_ashram = $item->user->is_in_ashram > 0 ? "Yes" : "No";
            $price = $item->price ." ". $item->currency;

            $update[] = $item->id;

            $row = "{$item->id},{$sex},{$name},{$baptism},{$date},{$item->user->yoga_year},{$city},{$aza},{$item->user->yoga_attendance},{$is_instructor},{$is_in_ashram},{$item->user->yoga_attendance},{$price},{$item->payment},{$image}\n";

            if ($fields->gender == 'separate')
                $csv_data[strtolower($item->user->gender)] .= $row;
            else
                $csv_data .= $row;

            $zip->addFile('storage/'. $item->picture_front, $image);
        }

        if ($fields->gender == 'separate') {

            $csv_data['m'] = preg_replace('/[\s\t]{2,}/i', ' ', $csv_data['m']);
            $csv_data['f'] = preg_replace('/[\s\t]{2,}/i', ' ', $csv_data['f']);

            $zip->addFromString("date_m.csv", $csv_data['m']);
            $zip->addFromString("date_f.csv", $csv_data['f']);
        }
        else {
            $csv_data = preg_replace('/[\s\t]{2,}/i', ' ', $csv_data);
            $zip->addFromString("date.csv", $csv_data);
        }

        $zip->close();

        Order::whereIn('id', $update)->update(['order_status_id' => $fields['status']]);

        return Action::download(asset($filename), $zip_name);
    }
}
