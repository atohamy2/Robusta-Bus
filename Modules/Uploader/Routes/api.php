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

Route::namespace('API')->prefix('uploader')->middleware(['set.api.locale'])->group(function() {
    Route::post('avatar/', 'UploaderController@upload_avatar');
    Route::post('image/', 'UploaderController@upload_image');
    Route::post('file/', 'UploaderController@upload_file');
});
