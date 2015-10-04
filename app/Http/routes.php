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

Route::group(['prefix' => 'api'], function(){
    /*
     * Registration API Endpoints
     */
    Route::group(['prefix' => 'register'], function() {
        Route::get('/', function() {
            dd('register!');
        });
    });
    /*
     * User API Endpoints
     */
    Route::group(['prefix' => 'users'], function() {
        Route::post('/', 'Api\UserController@store');
        Route::get('/', 'Api\UserController@index');
        Route::get('{id}', 'Api\UserController@show');
        Route::get('{id}/guests', 'Api\UserController@userWithGuests');
    });
});

Route::get('/', function() {
    return view('pages.home');
});

Route::get('savethedate/{code?}', 'InvitationController@savethedate');
