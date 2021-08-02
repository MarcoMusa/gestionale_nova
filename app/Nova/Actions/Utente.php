<?php

namespace App\Nova\Actions;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Actions\Action;
use Illuminate\Support\Collection;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ActionFields;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Select;

class Utente extends Action
{
    use InteractsWithQueue, Queueable;

    public $name = "Aggiorna la pratica";


    public function handle(ActionFields $fields, Collection $models)
    {
        foreach ($models as $model) {
            $resp = $model->update([
                'note' => $fields->note,
                'created_at' => $fields->created_at,
                'accettato' => $fields->accettato,

            ]);
        }
    }

    public function fields()
    {
        return [

            Select::make(__('Stato'), 'note')
                ->options([
                    'In Lavorazione' => 'In Lavorazione',
                    'Chiusa' => 'Chiusa',

                ]),
            Date::make(__('Chiuso il'), 'created_at')
                ->format('DD/MM/YYYY'),
            Boolean::make(__('Accettato'), 'accettato'),


        ];
    }
}
