<?php

namespace App\Classes;

use Carbon\Carbon;

class Time
{
    public static function now(): Carbon
    {
        $time = Carbon::now();
        $time->setTimezone('Europe/Amsterdam');
        return $time;
    }
}
