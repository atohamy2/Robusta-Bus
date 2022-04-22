<?php

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

Route::namespace('API')->prefix('driver')->middleware(['set.api.locale'])->group(function() {
    Route::post('/register','RegisterController@register');
    
    Route::post('otp/send', "LoginController@sendOTP");
    Route::post('otp/login', "LoginController@loginOTP");

});


