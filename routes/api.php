<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// https://datahub.io/core/oil-prices/r/brent-day.json
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/GetOil', function (Request $request) {

    $response = Http::get('https://datahub.io/core/oil-prices/r/brent-day.json');
    dump($response->status());
    dump($response->ok());
    $test = $response->json();
    dump($test[2]);
    dump($test[2]["Date"]);
});
