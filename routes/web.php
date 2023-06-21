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
    if (!\Illuminate\Support\Facades\Auth::check()) {
        return Inertia::render('Auth/Login', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    }
    return redirect()->route('walking');
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
            $street['key'] = (string) $streetPartModel->getRouteKey();

            $streetPartModel->houses->each(function (\App\Models\House $houseModel) use (&$street) {

                $weekStatus = $houseModel->weekStatuses()->where('week', 1)->first();

                $house = [];
                $house['number'] = $houseModel->number;
                $house['key'] = $houseModel->getRouteKey();
                $house['status'] = $weekStatus->status;



                $house['maps'] = urlencode("{$houseModel->streetPart->name} {$houseModel->number}, Oud-Beijerland");

                $street['houses'][] = $house;
            });

            $streets[] = $street;
        });

        return Inertia::render('Walking', ['streets' => $streets]);
    })->name('walking');

    Route::post('/update-status', [\App\Http\Controllers\Controller::class, 'updateStatus'])->name('update-status');
});
