<?php

namespace App\Http\Controllers;

use App\Classes\Time;
use App\Models\House;
use App\Models\WalkingRoute;
use App\Models\WeekStatus;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function updateStatus(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                'message' => 'Not authorized',
            ], 403);
        }

        $houseKey = $request->post('houseKey');
        $status = $request->post('status');
        $week = $request->post('week');
        $year = $request->post('year');

        WeekStatus::updateOrCreate(
            ['house_id' => $houseKey, 'week' => $week, 'year' => $year],
            ['status' => $status]
        );

        return response()->json([
            'message' => 'Yes!',
            'key' => $houseKey,
            'status' => $status,
        ]);
    }

    public function index(Request $request)
    {
        $walkingRoute = WalkingRoute::query()->first();

        $walkingRouteData = [];
        $walkingRoute->houses()->each(function (House $item) use (&$walkingRouteData) {
            $house = [];
            $house['number'] = $item->number;
            $house['street'] = $item->street->name;
            $house['key'] = $item->getRouteKey();
            $house['status'] = $item->weekStatuses()->where('week', Time::now()->week)->where('year', Time::now()->year)->first()?->status ?? 0;
            $walkingRouteData[] = $house;
        });

        return Inertia::render('WalkingRoute', ['walkingRoute' => $walkingRouteData]);
    }
}
