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
    Route::group(["prefix" => "admins"], function(){
        Route::get('/', 'App\Http\Controllers\admin\home@index')->middleware('auth:admin');

        Route::get('/login', 'App\Http\Controllers\admin\authentication@loginView')->name('adminlogin')->middleware('guest:admin');
        Route::post('/login', 'App\Http\Controllers\admin\authentication@login')->middleware('guest:admin');

        Route::get('/logout', 'App\Http\Controllers\admin\authentication@logout')->middleware('auth:admin');

        Route::group(['prefix' => 'admins'],function(){
            Route::get('/', 'App\Http\Controllers\admin\admins@index')->middleware('auth:admin');
            Route::get('/delete/{id}', 'App\Http\Controllers\admin\admins@delete')->middleware('auth:admin');
            Route::get('/create', 'App\Http\Controllers\admin\admins@createView')->middleware('auth:admin');
            Route::post('/create', 'App\Http\Controllers\admin\admins@create')->middleware('auth:admin');
            Route::get('/edit/{id}', 'App\Http\Controllers\admin\admins@editView')->middleware('auth:admin');
            Route::post('/edit/{id}', 'App\Http\Controllers\admin\admins@edit')->middleware('auth:admin');
        });

        Route::group(['prefix' => 'users'],function(){
            Route::get('/', 'App\Http\Controllers\admin\users@index')->middleware('auth:admin');
            Route::get('/block/{id}', 'App\Http\Controllers\admin\users@block')->middleware('auth:admin');
        });

        Route::group(['prefix' => 'products'],function(){
            Route::get('/', 'App\Http\Controllers\admin\products@index')->middleware('auth:admin');
            Route::get('/delete/{id}', 'App\Http\Controllers\admin\products@delete')->middleware('auth:admin');
            Route::get('/changeStatus/{id}', 'App\Http\Controllers\admin\products@changeStatus')->middleware('auth:admin');
        });
        Route::group(['prefix' => 'reviews'],function(){
            Route::get('/', 'App\Http\Controllers\admin\reviews@index')->middleware('auth:admin');
            Route::get('/delete/{id}', 'App\Http\Controllers\admin\reviews@delete')->middleware('auth:admin');
        });

        Route::group(['prefix' => 'orders'],function(){
            Route::get('/', 'App\Http\Controllers\admin\orders@index')->middleware('auth:admin');
            Route::get('/cancel/{id}', 'App\Http\Controllers\admin\orders@cancel')->middleware('auth:admin');
            Route::get('/nextStage/{id}', 'App\Http\Controllers\admin\orders@nextStage')->middleware('auth:admin');
        });
    });
});



