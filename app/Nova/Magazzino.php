<?php

namespace App\Nova;

use App\Nova\Actions\Utente;
use App\Nova\Filters\MagazzinoperUtente;
use App\Nova\Resource;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Avatar;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Line;
use Laravel\Nova\Fields\Stack;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class Magazzino extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Magazzino::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'prodotto';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'prodotto'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),

            Text::make(__('Prodotto'), 'prodotto')
                ->sortable()
                ->rules('required'),

            Textarea::make(__('Note'), 'note')
                ->alwaysShow()
                ->rows(1),

            Boolean::make(__('Accettato'), 'accettato')
                ->sortable(),

            BelongsTo::make(__('Utente'), 'user', User::class),

            DateTime::make(__('Preso in carico il'), 'updated_at')
                ->format('DD/MM/YYYY - hh:mm')
                ->onlyOnIndex(),

            Stack::make(__('Note'), 'Details', [
                Line::make('note')->extraClasses('italic font-medium text-80'),

            ]),

            Date::make(__('Chiuso il'), 'created_at')
                ->format('DD/MM/YYYY'),




        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [
            (new MagazzinoperUtente),
        ];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [
            (new Utente),
        ];
    }
}
