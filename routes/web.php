<?php

use App\Http\Controllers as Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Helpers\S3Helper;

use App\Http\Controllers\TownController;
use App\Http\Controllers\PlotTypeController;
use App\Http\Controllers\PlotSizeController;
use App\Http\Controllers\PlotController;
use App\Http\Controllers\PlotSaleController;




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
//Without Session testing
Route::get('/', function () {
    return  (Auth::check())?redirect('dashboard'):redirect('/login');
});
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});
Auth::routes();
//With Session testing
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    //Route::get('/dashboard', function () {return view('dashboard'); })->name('dashboard');
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

  //Route::middleware("has_access:Permission")->group(function () {
    Route::resource('permissions', App\Http\Controllers\PermissionController::class);
    Route::get('permissions-lists', [App\Http\Controllers\PermissionController::class, 'getPermissionLists'])->name('permissions-lists');
    Route::post('/role/permissions', [App\Http\Controllers\PermissionController::class, 'getPermissionsByRole'])->name('get-permissions-by-role');
  //});
   // Route::middleware("has_access:Role")->group(function () {
    Route::resource('roles', Controllers\RoleController::class);
    //});

    //Route::middleware("has_access:User")->group(function () {
    Route::resource('users', Controllers\UserController::class);
    Route::get('/users-lists', [Controllers\UserController::class, 'getUsersLists'])->name('users-lists');
    //});

    Route::middleware("has_access:Change Password")->group(function () {
    Route::patch('/users-password-update/{id}', [Controllers\UserController::class, 'updatePassword'])->name('update-password');
    });

    Route::resource('towns',                        TownController::class);
    Route::resource('plot-types',                   PlotTypeController::class);
    Route::resource('plots',                        PlotController::class);
    Route::resource('size-dimensions',              PlotSizeController::class);
    Route::resource('plot-sales',                   PlotSaleController::class);


});
