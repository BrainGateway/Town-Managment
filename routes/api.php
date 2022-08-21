<?php

use App\Http\Controllers\TownController;
use App\Http\Controllers\BlockController;
use App\Http\Controllers\PlotTypeController;
use App\Http\Controllers\PlotSizeController;

use App\Http\Controllers\PlotController;
use App\Http\Controllers\PlotSaleController;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('towns',                TownController::class);
Route::resource('blocks',               BlockController::class);
Route::resource('plot-sizes',                 PlotSizeController::class);
Route::resource('plots',                 PlotController::class);
Route::resource('plot-sales',                 PlotSaleController::class);
