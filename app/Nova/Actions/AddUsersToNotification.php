<?php

namespace App\Nova\Actions;

use App\Models\Notification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Http\Requests\NovaRequest;

class AddUsersToNotification extends Action
{
    use InteractsWithQueue, Queueable;

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        $notification = Notification::find($fields->notification);

        $notification->users()->syncWithPivotValues($models->pluck('id'), ['created_at' => now()], false);
    }

    /**
     * Get the fields available on the action.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        $notifications = Notification::select('id', 'key', 'subject_ro')->get()->mapWithKeys(function($item, $key) {
            return [$item->id => $item['key'] . " ({$item['subject_ro']})"];
        });

        return [
            Select::make('Notification')->searchable()->options($notifications),
        ];
    }
}
