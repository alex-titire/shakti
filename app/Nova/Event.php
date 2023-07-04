<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;
use Symfony\Component\Intl\Currencies;
use Vyuldashev\NovaMoneyField\Money;

class Event extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Event::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title_ro';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'title_ro',
    ];

    /**
     * The relationships that should be eager loaded on index queries.
     *
     * @var array
     */
    public static $with = ['eventType'];

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
            BelongsTo::make('Event Type')->withoutTrashed(),

            new Panel('Availability Information', $this->dateFields()),
            new Panel('Details Ro', $this->detailsRoFields()),
            new Panel('Details En', $this->detailsEnFields()),
            new Panel('Notifications', $this->notificationFields()),

            HasMany::make('Pages', 'pages', EventPage::class),
            HasMany::make('Terms', 'terms', EventTerm::class),
        ];
    }

    /**
     * Get the date fields for the resource.
     *
     * @return array
     */
    protected function dateFields()
    {
        return [
            Select::make('Audience')->options(['m' => 'Male Only', 'f' => 'Female Only', 'mixed' => 'Everybody'])->required()->displayUsingLabels(),
            Select::make('Attendance')->options([
                'live' => 'Live only',
                'online' => 'Online only',
                'both' => 'Both live and online'
            ])->required()->displayUsingLabels(),
            Date::make("Date start")->required()->help('The first day of the event'),
            Date::make("Date end")->required()->hideFromIndex()->help('The last day of the event'),
            DateTime::make("Registration Start")->required()->hideFromIndex()->help('When should the registration form be available'),
            DateTime::make("Registration End")->required()->help('Last moment the registration form can be used'),
            DateTime::make("Early Bird Deadline"),
            Select::make('Early Bird Type')->options([
                'fixed' => 'Fixed Value',
                'percentage' => 'Percentage of the Total'
            ])
        ];
    }

    /**
     * Get the Details in Ro fields for the resource.
     *
     * @return array
     */
    protected function detailsRoFields()
    {
        return [
            Text::make('Title Ro')->required()->hideFromIndex(),
            Currency::make('Price Ron')
                ->required()
                ->hideFromIndex()
                ->currency('RON')
                ->asMinorUnits()
                ->resolveUsing(function ($value) {
                    return $value / 100;
                })
                ->help('Default price for general public'),
            Currency::make('Price Online Ron')
                ->hideFromIndex()
                ->currency('RON')
                ->asMinorUnits()
                ->resolveUsing(function ($value) {
                    return $value / 100;
                })
                ->help('Discount price for online attendance'),
            Currency::make('Price Coordinator Ron')
                ->hideFromIndex()
                ->currency('RON')
                ->asMinorUnits()
                ->resolveUsing(function ($value) {
                    return $value / 100;
                })
                ->help('Discount price for Teachers and Coordinators'),
            Currency::make('Price Ashram Ron')
                ->hideFromIndex()
                ->currency('RON')
                ->asMinorUnits()
                ->resolveUsing(function ($value) {
                    return $value / 100;
                })
                ->help('Discount price for people living in Ashram'),
            Currency::make('Early Bird Value Ron')
                ->hideFromIndex()
                ->currency('RON')
                ->asMinorUnits()
                ->resolveUsing(function ($value) {
                    return $value / 100;
                })
                ->help('Early Bird Discount amount configured by Type. DO NOT add % sign for percentage discount type.'),
            Markdown::make('Picture Info Ro')->required()->hideFromIndex()->preset('commonmark')->help('General rules for picture submissions'),
        ];
    }

    /**
     * Get the Details in Ro fields for the resource.
     *
     * @return array
     */
    protected function detailsEnFields()
    {
        return [
            Text::make('Title En')->required()->hideFromIndex(),
            Currency::make('Price Eur')
                ->required()
                ->hideFromIndex()
                ->currency('EUR')
                ->asMinorUnits()
                ->resolveUsing(function ($value) {
                    return $value / 100;
                })
                ->help('Default price for general public abroad'),
            Currency::make('Price Online Eur')
                ->hideFromIndex()
                ->currency('EUR')
                ->asMinorUnits()
                ->resolveUsing(function ($value) {
                    return $value / 100;
                })
                ->help('Discount price for online attendance'),
            Currency::make('Price Coordinator Eur')
                ->hideFromIndex()
                ->currency('EUR')
                ->asMinorUnits()
                ->resolveUsing(function ($value) {
                    return $value / 100;
                })
                ->help('Discount price for Teachers and Coordinators abroad'),
            Currency::make('Price Ashram Eur')
                ->hideFromIndex()
                ->currency('EUR')
                ->asMinorUnits()
                ->resolveUsing(function ($value) {
                    return $value / 100;
                })
                ->help('Discount price for people living in Ashram\'s abroad'),
            Currency::make('Early Bird Value Eur')
                ->hideFromIndex()
                ->currency('EUR')
                ->asMinorUnits()
                ->resolveUsing(function ($value) {
                    return $value / 100;
                })
                ->help('Early Bird Discount amount configured by Type. DO NOT add % sign for percentage discount type.'),
            Markdown::make('Picture Info En')->required()->hideFromIndex()->preset('commonmark')->help('General rules for picture submissions'),
        ];
    }

    /**
     * Get the Notifications fields for the resource.
     *
     * @return array
     */
    protected function notificationFields()
    {
        return [
            BelongsTo::make('Email confirmation card', 'email_card', Notification::class)->nullable()->hideFromIndex(),
            BelongsTo::make('Email confirmation cash', 'email_cash', Notification::class)->nullable()->hideFromIndex(),
            BelongsTo::make('Email confirmation bank', 'email_bank', Notification::class)->nullable()->hideFromIndex(),
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
