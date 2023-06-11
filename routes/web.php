<?php

use App\Models\StreetPart;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/walking', function () {

        $streets = [];

        $streetParts = StreetPart::with('houses')->get();

        $streetParts->each(function (StreetPart $streetPartModel) use (&$streets){
            $street = [];
            $street['name'] = $streetPartModel->name;
            $street['key'] = $streetPartModel->getRouteKey();

            $streetPartModel->houses->each(function (\App\Models\House $houseModel) use (&$street) {

                $weekStatus = $houseModel->weekStatuses()->where('week', 1)->first();

                $house = [];
                $house['number'] = $houseModel->number;
                $house['status'] = $weekStatus->status;

                $street['houses'][] = $house;
            });

            $streets[] = $street;
        });



//        $streets[] = [
//            'name' => 'Graaf Van Egmondstraat',
//            'key' => 'graaf-van-egmondstraat-1',
//            'houses' => [
//                [
//                    'number' => '1',
//                    'status' => 0
//                ],
//                [
//                    'number' => '2',
//                    'status' => 0
//                ]
//            ],
//        ];
//
//        $streets[] = [
//            'name' => 'Klaproosstraat',
//            'key' => 'klaproosstraat-1',
//            'houses' => [
//                [
//                    'number' => '1',
//                    'status' => 0
//                ],
//                [
//                    'number' => '2',
//                    'status' => 0
//                ],
//                [
//                    'number' => '3',
//                    'status' => 0
//                ]
//            ],
//        ];
//
//        $streets[] = [
//            'name' => 'Israelsdreef',
//            'key' => 'israelsdreef-1',
//            'houses' => [
//                [
//                    'number' => '1',
//                    'status' => 0
//                ],
//                [
//                    'number' => '2',
//                    'status' => 1
//                ],
//                [
//                    'number' => '3',
//                    'status' => 2
//                ],
//                [
//                    'number' => '4',
//                    'status' => 3
//                ]
//            ],
//        ];

        return Inertia::render('Walking', ['streets' => $streets]);
    })->name('walking');

    Route::post('/update-status', [\App\Http\Controllers\Controller::class, 'updateStatus'])->name('update-status');
});
