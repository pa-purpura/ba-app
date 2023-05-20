<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Procedures\AssignmentProcedure;


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

Route::rpc('/v1/GetOilPriceTrend', [AssignmentProcedure::class])->name('GetOilPriceTrend.rpc-endpoint');


// Route::get('/GetOil', function (Request $request) {

//     $response = Http::get('https://datahub.io/core/oil-prices/r/brent-day.json');
//     dump($response->status());
//     // dump($response->ok());

//     $items = $response->json();

//     $start = "2012-10-10";
//     $end = "2012-12-10";

//     $prices = [];

//     foreach ($items as $item) {        
//         if ($end > $item["Date"] && $item["Date"] > $start) {
//             array_push($prices, $item);            
//         }        
//     }

//     $result = json_encode(['prices' => $prices]);

//     return response()->json([
//         'id' => 1,
//         'jsonrpc' => '2.0',
//         "result" => $result,
//     ]);
    
// });
