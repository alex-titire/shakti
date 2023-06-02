<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Email;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Actions\ExportAsCsv;
use Laravel\Nova\Http\Requests\NovaRequest;

class Order extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Order::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'user_id',
        'event_id',
        'first_name',
        'last_name',
        'baptism_name',
        'email',
        'mtv_code'
    ];

    /**
     * The relationships that should be eager loaded on index queries.
     *
     * @var array
     */
    public static $with = ['user', 'event', 'order_status'];

    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'Content';

    /**
     * The visual style used for the table. Available options are 'tight' and 'default'.
     *
     * @var string
     */
    public static $tableStyle = 'tight';

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
            BelongsTo::make('Order Status', 'order_status')
                ->filterable()
                ->withoutTrashed()
                ->showOnPreview(),
            BelongsTo::make('User')->withoutTrashed()->nullable()->searchable()->filterable(),
            Text::make('First Name')->nullable(),
            Text::make('Last Name')->nullable()->sortable(),
            Text::make('Baptism Name')->nullable(),
            Select::make('Sex')->hideFromIndex()->nullable()->options([
                'M' => 'Man',
                'F' => 'Woman',
            ])->filterable(),
            Text::make('Yoga Year')->hideFromIndex()->nullable(),
            Text::make('City')->hideFromIndex()->nullable()->sortable(),
            Date::make('Date of birth', 'dob')->hideFromIndex()->nullable(),
            Text::make('Phone')->nullable(),
            Email::make('Email')->nullable()->sortable(),
            Image::make('Picture Front')->hideWhenCreating()
                ->store(function (Request $request, $model) {
                    $img = $model->save_image($request, 'picture_front');
                    return [
                        'picture_front' => $img
                    ];
                }),
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
            Select::make('Event participation', 'attendance')
                ->nullable()
                ->filterable()
                ->options([
                    'online' => 'Online',
                    'live' => 'Venue'
                ])
                ->displayUsingLabels()
                ->sortable(),
            Currency::make('Price')
                ->hideFromIndex()
                ->currency($this->currency ?? 'RON')
                ->asMinorUnits()
                ->resolveUsing(function ($value) {
                    return $value / 100;
                })
                ->default(0)
                ->onlyOnForms(),
            Select::make('Currency')->hideFromIndex()->filterable()->options([
                'EUR' => 'EUR',
                'RON' => 'RON'
            ]),
            Select::make('Payment')->filterable()->sortable()->options([
                'transfer'  => 'Bank transfer',
                'card'      => 'Online Card',
                'cash'      => 'Cash'
            ]),
            Textarea::make('Comments')->rows(3)->showOnPreview(),
            Text::make('Mtv Code')->nullable(),
            DateTime::make('Code sent at')->nullable()->hideFromIndex(),
            BelongsTo::make('Event')->withoutTrashed()->nullable()->filterable()->hideFromIndex(),
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
        return [
            ExportAsCsv::make()->nameable()->withFormat(function ($model) {
                return [
                    'ID' => $model->getKey(),
                    'Nume' => $model->last_name,
                    'Prenume' => $model->first_name,
                    'Nume Botez' => $model->baptism_name,
                    'Sex' => $model->sex,
                    'Data Nasterii' => $model->dob->format('d.m.Y'),
                    'An curs' => $model->yoga_year,
                    'Oras' => $model->city,
                    'Telefon' => $model->phone,
                    'Email' => $model->email,
                    'AZA' => $model['aza'] > 0 ? "AZA". $model['aza'] : "-",
                    'Participare curs' => $model->yoga_attendance,
                    'Limba' => $model->language,
                    'Instructor' => $model->is_instructor > 0 ? 'Yes' : 'No',
                    'Ashram' => $model->is_in_ashram > 0 ? 'Yes' : 'No',
                    'Participare tabără' => $model->attendance,
                    'Pret' => ($model->price / 100) .' '. $model->currency,
                    'Plata' => $model->payment,
                    'Status' => $model->order_status->caption,
                    'Cod MTV' => $model->mtv_code,
                    'Comentarii' => $model->comments,
                    'Imagine' => str_replace("registrations/{$model->getKey()}/", "", $model->picture_front),
                    'Creat la' => $model->created_at,
                    'Ultima modificare' => $model->updated_at,
                    'Sters la' => $model->deleted_at
                ];
            }),

            new Actions\ExportRegistrations,
            new Actions\CustomExports,
        ];
    }
}
