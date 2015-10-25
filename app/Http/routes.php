<?php

Route::group(['prefix' => 'api'], function()
{
    /*
     * User API Endpoints
     */
    Route::group(['prefix' => 'users'], function()
    {
        Route::post('login', 'Api\UserController@login');
        Route::post('/', 'Api\UserController@store');
        Route::post('{id}/activate', 'Api\UserController@activate');
        Route::get('/', 'Api\UserController@index');
        Route::get('{id}', 'Api\UserController@show');
        Route::get('{id}/guests', 'Api\UserController@userWithGuests');
        Route::post('register', 'Api\UserController@register');
    });

    /*
     * Invitation API Endpoints
     */
    Route::group(['prefix' => 'invitations'], function()
    {
        Route::get('code/{code}', 'Api\InvitationController@getByCode');
    });
});

Route::get('svgtest', function()
{
   return view('svgtest');
});

Route::get('/', function()
{
    return view('pages.home');
});

Route::get('guests', 'GuestController@index');
Route::get('savethedate', 'InvitationController@savethedate');

Route::get('login', ['as' => 'user.login', 'uses' => 'UserController@login']);
Route::get('logout', ['as' => 'user.logout', 'uses' => 'UserController@logout']);
Route::get('home', ['as' => 'user.loggedIn.home', 'middleware' => 'auth', 'uses' => 'UserController@loggedInHome']);
