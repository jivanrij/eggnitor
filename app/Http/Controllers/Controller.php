<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function updateStatus(Request $request)
    {
        $weekNumber = $request->post('week_number');
        $streetPartId = $request->post('street_part_id');
        $houseId = $request->post('house_id');
        $status = $request->post('status');

        return response()->json([
            'message' => 'Yes!',
            'weekNumber' => $weekNumber,
            'streetPartId' => $streetPartId,
            'houseId' => $houseId,
            'status' => $status,
        ]);
    }
}
