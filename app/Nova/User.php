<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rules;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Email;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class User extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\User>
     */
    public static $model = \App\Models\User::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
    * Get the search result subtitle for the resource.
    *
    * @return string
    */
    public function subtitle()
    {
        return "@ {$this->email}";
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'name', 'email', 'first_name', 'last_name', 'baptism_name'
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

            // Gravatar::make()->maxWidth(50),

            Text::make('Full Name', 'name')
                ->sortable()
                ->rules('required', 'max:255'),

            Email::make('Email')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:users,email')
                ->updateRules('unique:users,email,{{resourceId}}'),

            Password::make('Password')
                ->onlyOnForms()
                ->creationRules('nullable', Rules\Password::defaults())
                ->updateRules('nullable', Rules\Password::defaults()),

            Text::make('First Name')->nullable(),
            Text::make('Last Name')->nullable()->sortable(),
            Text::make('Baptism Name')->nullable(),
            Text::make('Phone')->nullable(),
            Text::make('Yoga Year')->hideFromIndex()->default(0),
            Text::make('City')->hideFromIndex()->nullable()->sortable(),
            Date::make('Date of birth', 'dob')->hideFromIndex()->nullable(),
            Select::make('Gender')->hideFromIndex()->nullable()->options([
                'M' => 'Man',
                'F' => 'Woman',
            ])->filterable(),
            Select::make('AZA', 'aza')->hideFromIndex()->nullable()->options([
                0 => 'None',
                1 => 'AZA1',
                2 => 'AZA2',
                3 => 'AZA3'
            ]),
            Select::make('Attends courses in', 'yoga_attendance')
                ->hideFromIndex()
                ->filterable()
                ->options([
                    'EN' => 'EN',
                    'RO' => 'RO'
                ]),
            Select::make('Language')
                ->hideFromIndex()
                ->nullable()
                ->filterable()
                ->options([
                    'en' => 'EN',
                    'ro' => 'RO'
                ]),
            Boolean::make('Is instructor')->hideFromIndex(),
            Boolean::make('Is in ashram')->hideFromIndex(),
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
