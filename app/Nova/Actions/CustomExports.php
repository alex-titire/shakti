<?php

namespace App\Nova\Actions;

use App\Models\Order;
use App\Models\OrderStatus;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\MultiSelect;

class CustomExports extends Action
{
    use InteractsWithQueue, Queueable;

    /**
     * The displayable name of the action.
     *
     * @var string
     */
    public $name = 'Custom Export';

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
            MultiSelect::make('Fields')->options([
                'first_name' => 'First Name',
                'last_name' => 'Last Name',
                'baptism_name' => 'Baptism Name',
                'sex' => 'Sex',
                'yoga_year' => 'Yoga Year',
                'city' => 'City',
                'dob' => 'Date of Birth',
                'phone' => 'Phone',
                'email' => 'Email',
                'aza' => 'AZA',
                'yoga_attendance' => 'Enroled in',
                'language' => 'Language',
                'is_instructor' => 'Is instructor',
                'is_in_ashram' => 'Is in Ashram',
                'attendance' => 'Event participation',
                'price' => 'Price',
                'currency' => 'Currency',
                'payment' => 'Payment',
                'order_status_id' => 'Status',
                'mtv_code' => 'MTV Code',
                'comments' => 'Comments',
            ]),
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
        $csv_data = "ID," . implode(",", $fields['fields']) ."\n";

        foreach ($models as $item) {

            $csv_data .= "{$item->id}";

            foreach ($fields['fields'] as $key) {

                switch ($key) {
                    case 'dob':
                        $data = date("d.m.Y", strtotime($item->dob));
                        break;

                    case 'aza':
                        $data = $item->aza > 0 ? "AZA". $item->aza : "-";
                        break;

                    case 'first_name':
                    case 'last_name':
                    case 'baptism_name':
                    case 'city':
                    case 'email':
                    case 'phone':
                    case 'comments':
                        $data = str_replace(",", ' ', $item->$key);
                        break;

                    case 'is_instructor':
                    case 'is_in_ashram':
                        $data = $item->$key > 0 ? "Yes" : "No";
                        break;

                    case 'price':
                        $data = $item->$key / 100;
                        break;

                    case 'order_status_id':
                        $data = $item->order_status->caption;
                        break;

                    default:
                        $data = $item->$key;
                }

                $csv_data .= ",{$data}";
            }

            $csv_data .= "\n";
        }

        $csv_data = preg_replace('/[\s\t]{2,}/i', ' ', $csv_data);

        $filename = $fields['file_name'] .'.csv';
        $path = 'storage/tmp/'. $filename;
        file_put_contents($path, $csv_data);

        return Action::download(asset($path), $filename);
    }
}
