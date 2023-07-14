<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Email;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class Notification extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Notification::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'key';

    /**
    * Get the search result subtitle for the resource.
    *
    * @return string
    */
    public function subtitle()
    {
        return "Subject: {$this->subject_ro}";
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'key', 'subject_ro', 'subject_en'
    ];

    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'Content';

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Key')->rules('required', 'max:255')->help('A unique key used to identify the notification.'),
            Text::make('From Name')->rules('required', 'max:255'),
            Email::make('Reply To', 'reply_to')->rules('required', 'email'),
            Text::make('Subject Ro')->rules('required', 'max:255'),
            Text::make('Subject En')->rules('required', 'max:255'),
            Markdown::make('Content Html ro')->preset('commonmark')->nullable(),
            Markdown::make('Content Html en')->preset('commonmark')->nullable(),
            Textarea::make('Content Text ro')->nullable()->rows(7),
            Textarea::make('Content Text en')->nullable()->rows(7),
            Select::make('Type')->options([
                'transactional' => 'Transactional',
                'broadcast' => 'Broadcast',
            ])
            ->displayUsingLabels()
            ->rules('required'),
            Boolean::make('Active')->default(1),
            BelongsToMany::make('Users', 'users', User::class)
                ->fields(function($request, $relatedModel) {
                    return [
                        DateTime::make('Sent Time')->nullable(),
                        DateTime::make('Error Time')->nullable(),
                    ];
                })
                ->searchable()
                ->withSubtitles(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
