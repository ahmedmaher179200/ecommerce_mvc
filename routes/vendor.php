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
        // Route::get('/test', 'App\Http\Controllers\vendor\home@test');

        //login
        Route::get('/login', 'App\Http\Controllers\vendor\authentication@loginView')->middleware('guest:vendor')->name('vendorLogin');
        Route::post('/login', 'App\Http\Controllers\vendor\authentication@login');

        //  signUp
        Route::get('/signUp', 'vendor\login@signUpView')->middleware('guest:vendor');
        Route::post('/signUp', 'vendor\login@signUp')->middleware('guest:vendor');


        //logout
        Route::get('/logout', 'App\Http\Controllers\vendor\authentication@logout')->middleware('auth:vendor');

        //admin
        Route::get('/', 'App\Http\Controllers\vendor\home@homeView')->middleware('auth:vendor')->name('vendorHome');
        
        //orderss
        Route::group(['prefix' => 'orders', 'middleware' => 'auth:vendor'], function(){
            Route::get('/', 'vendor\orders@showView');
            Route::get('/changeStage/{id}', 'vendor\orders@changeStage');
        });

        //items
        Route::group(['prefix'=>'items', 'middleware' => 'auth:vendor'],function(){
            Route::get('/', 'vendor\items@itemsView');
            Route::get('/addItem', 'vendor\items@addItemView');
            Route::post('/addItem', 'vendor\items@add');
            Route::get('/editeItem/{id}', 'vendor\items@editeItem');
            Route::post('/editeItem/{id}', 'vendor\items@edite');
        });

        //edite profile
        Route::group(['prefix'=>'editeProfile', 'middleware' => 'auth:vendor'],function(){
            Route::get('/{id}', 'vendor\editeProfile@editeProfileView');
            Route::post('/{id}', 'vendor\editeProfile@editeProfile');
        });

        //notification
        Route::group(['prefix'=>'notification', 'middleware' => 'auth:vendor'],function(){
            Route::post('/changStatus', 'vendor\notification@changStatus');
        });

    });
});



