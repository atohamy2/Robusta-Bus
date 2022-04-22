<?php

use Illuminate\Support\Facades\Route;

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

Route::namespace('Backend')->prefix('admin')->middleware(['auth'])->group(function() {
    Route::resource('vehiclebrand', 'VehicleBrandController');
    Route::resource('vehiclemodel', 'VehicleModelController');
    Route::resource('vehicle', 'VehicleController')->except(['index']);
});;
