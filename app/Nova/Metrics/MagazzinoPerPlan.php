<?php

namespace App\Nova\Metrics;

use App\Models\Magazzino;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Partition;

class MagazzinoPerPlan extends Partition
{

    public $name = 'Statistiche pratiche';

    public function calculate(NovaRequest $request)
    {
        return $this->count($request, Magazzino::class, 'note')
            ->colors([
                'Pratiche chiuse' => '#6F1A07',
                'Pratiche In Lavorazione' => '#AF9164',

            ]);
    }

    /**
     * Determine for how many minutes the metric should be cached.
     *
     * @return  \DateTimeInterface|\DateInterval|float|int
     */
    public function cacheFor()
    {
        // return now()->addMinutes(5);
    }

    /**
     * Get the URI key for the metric.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'magazzino-per-plan';
    }
}
