<?php

namespace App\Nova\Metrics;

use App\Classes\Time;
use App\Models\House;
use App\Models\WeekStatus;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Value;

class NotYetDoneMetric extends Value
{
    public function name()
    {
        return 'Not yet done';
    }

    /**
     * Calculate the value of the metric.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return mixed
     */
    public function calculate(NovaRequest $request)
    {
        $notThisOnes = WeekStatus::query()
            ->activeHouses()
            ->with('house')
            ->where('week', Time::now()->week)
            ->where('year', Time::now()->year)
            ->whereIn('status', [1,2,3])
            ->count();

        $housesCount = House::query()->where('active', true)->count();

        return $this->result($housesCount - $notThisOnes);
    }

    /**
     * Get the ranges available for the metric.
     *
     * @return array
     */
    public function ranges()
    {
        return [
            1 => __('This week'),
        ];
    }

    /**
     * Determine the amount of time the results of the metric should be cached.
     *
     * @return \DateTimeInterface|\DateInterval|float|int|null
     */
    public function cacheFor()
    {
        // return now()->addMinutes(5);
    }
}
