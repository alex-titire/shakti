<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;

class EventPage extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\EventPage::class;

    /**
     * Indicates if the resource should be displayed in the sidebar.
     *
     * @var bool
     */
    public static $displayInNavigation = false;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'key';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'key', 'title_ro', 'title_en',
    ];

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

            BelongsTo::make('Event')->required()->withoutTrashed(),
            Text::make('Key')->required()->help('Unique identifier (terms, rules, about, faq, ty-card, ty-cash, ty-transfer)'),

            new Panel('Details Ro', $this->detailsRoFields()),
            new Panel('Details En', $this->detailsEnFields()),
        ];
    }

    /**
     * Get the details ro fields for the resource.
     *
     * @return array
     */
    protected function detailsRoFields()
    {
        return [
            Text::make('Title Ro')->nullable(),
            Text::make('Meta Title Ro')->nullable()->hideFromIndex(),
            Markdown::make('Content Ro')->nullable()->preset('commonmark'),
            Text::make('URL Ro')->nullable()->hideFromIndex()
        ];
    }

    /**
     * Get the details en fields for the resource.
     *
     * @return array
     */
    protected function detailsEnFields()
    {
        return [
            Text::make('Title En')->nullable()->hideFromIndex(),
            Text::make('Meta Title En')->nullable()->hideFromIndex(),
            Markdown::make('Content En')->nullable()->preset('commonmark'),
            Text::make('URL En')->nullable()->hideFromIndex()
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
