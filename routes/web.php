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
Route::get('lang/{locale}',function ($locale){
    App::setLocale($locale);
    session()->put('locale', $locale);
    return back();
});

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::group(['prefix'=>'admin','middleware' => ['web', 'auth']],function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//    Route::get('/settings/languages', [App\Http\Controllers\HomeController::class, 'languages'])->name('languages');
//    Route::get('/settings/countries', [App\Http\Controllers\HomeController::class, 'countries'])->name('countries');
//    Route::get('/settings/cities', [App\Http\Controllers\HomeController::class, 'cities'])->name('cities');
//    Route::get('/settings/roles/create', [App\Http\Controllers\HomeController::class, 'roles_create'])->name('roles.create');
//    Route::get('/settings/roles/list', [App\Http\Controllers\HomeController::class, 'roles_list'])->name('roles.list');
//    Route::get('/users', [App\Http\Controllers\HomeController::class, 'users'])->name('users');
//    Route::get('/users/new', [App\Http\Controllers\HomeController::class, 'users_new'])->name('users.new');
//    Route::get('/account/edit', [App\Http\Controllers\HomeController::class, 'account_edit'])->name('account.edit');

});
