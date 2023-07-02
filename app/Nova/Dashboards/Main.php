<?php

namespace App\Nova\Dashboards;

use App\Nova\Metrics\NotOpenedMetric;
use App\Nova\Metrics\NotYetDoneMetric;
use App\Nova\Metrics\SoldEggsMetric;
use App\Nova\Metrics\SoldNothingMetric;
use Laravel\Nova\Dashboards\Main as Dashboard;

class Main extends Dashboard
{
    /**
     * Get the cards for the dashboard.
     *
     * @return array
     */
    public function cards()
    {
        return [
            new NotYetDoneMetric,
            new NotOpenedMetric,
            new SoldEggsMetric,
            new SoldNothingMetric,
        ];
    }
}
