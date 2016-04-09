<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

/**
 | --------------------------------------
 | Auth Protected Routes
 | --------------------------------------
 **/
Route::group(['middleware' => 'auth', 'namespace' => 'Accounts'], function () {

    Route::resource('account', 'AccountsController');

});

Route::get('/home', 'HomeController@index');

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::group(['namespace' => 'ApiServices', 'prefix' => 'services'], function()
{

    Route::post('user/location', [
                                    'as' => 'user.location',
                                    'uses' => 'GoogleMapController@retrieveMapLocation'
                                 ]);

});