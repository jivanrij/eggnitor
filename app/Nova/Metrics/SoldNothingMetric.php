<?php

namespace App\Nova\Metrics;

use App\Classes\Time;
use App\Models\WeekStatus;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Value;

class SoldNothingMetric extends Value
{
    public function name()
    {
        return 'Sold none';
    }

    /**
     * Calculate the value of the metric.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return mixed
     */
    public function calculate(NovaRequest $request)
    {
        $count = WeekStatus::query()
            ->activeHouses()
            ->where('week', Time::now()->week)
            ->where('year', Time::now()->year)
            ->where('status', 3)
            ->count();

        return $this->result($count);
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
