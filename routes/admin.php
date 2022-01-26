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

        Route::get('/signUp', 'App\Http\Controllers\admin\authentication@signUpView')->middleware('guest:admin');
        Route::post('/signUp', 'App\Http\Controllers\admin\authentication@signUp')->middleware('guest:admin');
    });
});



