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
Route::get('/test', 'App\Http\Controllers\site\cart@test');

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
        Route::get('/signUp', 'App\Http\Controllers\site\authentication\auth@signUpView')->name('login')->middleware('guest:web');
        Route::post('/signUp', 'App\Http\Controllers\site\authentication\auth@signUp')->name('login')->middleware('guest:web');

        Route::get('/logout', 'App\Http\Controllers\site\authentication\auth@logout')->middleware('auth:web');

        Route::post('/love', 'App\Http\Controllers\site\products@love')->middleware('auth:web');
        Route::post('/addReview', 'App\Http\Controllers\site\products@addReview')->middleware('auth:web');

        Route::get('/cart', 'App\Http\Controllers\site\viewsController@cartView');
        Route::post('/cart/add', 'App\Http\Controllers\site\cart@add');
        Route::post('/cart/remove', 'App\Http\Controllers\site\cart@remove');
        Route::post('/cart/increment', 'App\Http\Controllers\site\cart@increment');
        Route::post('/cart/decrement', 'App\Http\Controllers\site\cart@decrement');
    });
