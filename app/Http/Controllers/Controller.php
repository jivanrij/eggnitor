<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\WeekStatus;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

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
}
