<?php

namespace App\Nova\Metrics;

use App\Models\User;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Partition;


class UsersPerRole extends Partition
{
    /**
     * Calculate the value of the metric.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return mixed
     */
    public function calculate(NovaRequest $request)
    {
        return $this->count($request, User::class, 'role')
            ->label(function ($value) {
                switch ($value) {
                    case null:
                        return '-';
                    case 'user':
                        return 'Utente';
                    case 'admin':
                        return 'Amministratore';
                    default:
                        return ucfirst($value);
                }
            })
            ->colors([
                'user' => '#6F1A07',
                'admin' => '#2B2118',
                'moderatore' => '#F7F3E3',
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
        return 'users-per-role';
    }
}
