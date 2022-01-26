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
    Route::group(["prefix" => "vendors"], function(){
        //login
        Route::get('/login', 'App\Http\Controllers\vendor\authentication@loginView')->middleware('guest:vendor')->name('vendorLogin');
        Route::post('/login', 'App\Http\Controllers\vendor\authentication@login');

        //  signUp
        Route::get('/signUp', 'App\Http\Controllers\vendor\authentication@signUpView')->middleware('guest:vendor');
        Route::post('/signUp', 'App\Http\Controllers\vendor\authentication@signUp')->middleware('guest:vendor');


        //logout
        Route::get('/logout', 'App\Http\Controllers\vendor\authentication@logout')->middleware('auth:vendor');

        //admin
        Route::get('/', 'App\Http\Controllers\vendor\home@homeView')->middleware('auth:vendor')->name('vendorHome');
        
        //orderss
        Route::group(['prefix' => 'orders', 'middleware' => 'auth:vendor'], function(){
            Route::get('/', 'App\Http\Controllers\vendor\orders@showView');
            Route::get('/changeStage/{id}', 'App\Http\Controllers\vendor\orders@changeStage');
        });

        //items
        Route::group(['prefix'=>'products', 'middleware' => 'auth:vendor'],function(){
            Route::get('/', 'App\Http\Controllers\vendor\products@itemsView');
            Route::get('/addProduct', 'App\Http\Controllers\vendor\products@addProductView');
            Route::post('/addProduct', 'App\Http\Controllers\vendor\products@add');
            Route::get('/editeProduct/{id}', 'App\Http\Controllers\vendor\products@editeItem');
            Route::post('/editeProduct/{id}', 'App\Http\Controllers\vendor\products@edite');
        });

        //edite profile
        Route::group(['prefix'=>'profile', 'middleware' => 'auth:vendor'],function(){
            Route::get('edite/{id}', 'App\Http\Controllers\vendor\profile@editeView');
            Route::post('edite/{id}', 'App\Http\Controllers\vendor\profile@editeProfile');
        });

        //notification
        Route::group(['prefix'=>'notification', 'middleware' => 'auth:vendor'],function(){
            Route::post('/seen', 'App\Http\Controllers\vendor\notification@notification_seen');
        });

    });
});



