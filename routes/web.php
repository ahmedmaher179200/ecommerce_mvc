<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
        Route::get('/', 'App\Http\Controllers\site\viewsController@homeView');
        Route::get('/productDetails/{id}', 'App\Http\Controllers\site\viewsController@productDetails');
        Route::get('/shop', 'App\Http\Controllers\site\viewsController@shop');

        Route::get('/login', 'App\Http\Controllers\site\authentication\auth@loginView')->name('login')->middleware('guest:web');
        Route::post('/login', 'App\Http\Controllers\site\authentication\auth@login')->middleware('guest:web');

        Route::get('/logout', 'App\Http\Controllers\site\authentication\auth@logout')->middleware('auth:web');

        Route::post('/love', 'App\Http\Controllers\site\products@love')->middleware('auth:web');

    });
