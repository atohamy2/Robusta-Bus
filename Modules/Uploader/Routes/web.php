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

Route::namespace('Backend')->prefix('admin')->middleware(['web', 'auth'])->group(function() {
    Route::post('uploader/avatar/', 'UploaderController@upload_avatar')->name('avatar.uploader');
    Route::post('uploader/image/', 'UploaderController@upload_image')->name('single.image.uploader');
    Route::post('uploader/file/', 'UploaderController@upload_file')->name('single.file.uploader');
});
