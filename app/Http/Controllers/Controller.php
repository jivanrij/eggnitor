<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\WalkingRoute;
use App\Models\WeekStatus;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Inertia\Inertia;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function updateStatus(Request $request)
    {
        $streetPart = $request->post('streetPart');
        $house = $request->post('house');
        $status = $request->post('status');

        WeekStatus::where('house_id', $house)->update(['status' => $status]);


        return response()->json([
            'message' => 'Yes!',
            'streetPart' => $streetPart,
            'house' => $house,
            'status' => $status,
        ]);
    }

    public function walkingRoute(Request $request)
    {
        $weekNumber = now()->weekOfYear;
        $year = now()->year;

        $walkingRoute = WalkingRoute::query()->first();

        $walkingRouteData = [];
        $walkingRoute->houses()->each(function (House $item) use ($weekNumber, $year, &$walkingRouteData) {
            $house = [];
            $house['number'] = $item->number;
            $house['street'] = $item->street->name;
            $house['key'] = $item->getRouteKey();
            $house['status'] = $item->weekStatuses()->where('week', $weekNumber)->where('year', $year)->first()?->status ?? 0;
            $walkingRouteData[] = $house;
        });

        return Inertia::render('WalkingRoute', ['walkingRoute' => $walkingRouteData]);
    }
}
