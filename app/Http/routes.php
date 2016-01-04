<?php

Route::get('test_invites', function() {
    $i = new App\Invitation();
    return $i->all(['code']);
});

Route::get('test', function() {
    dd('changed!');
});

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
        Route::post('{id}/guests', 'Api\UserController@updateUserGuests');
        Route::post('register', 'Api\UserController@register');

        Route::post('{userId}/rsvp', 'Api\RsvpController@store');
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

Route::get('/', 'PageController@index');
Route::get('technology-opt-out', 'PageController@opt_out');

Route::get('guests', 'GuestController@index');
Route::get('invitation', 'InvitationController@savethedate');

Route::get('login', ['as' => 'user.login', 'uses' => 'UserController@login']);
Route::get('logout', ['as' => 'user.logout', 'uses' => 'UserController@logout']);
Route::get('rsvp', ['as' => 'rsvp', 'uses' => 'RsvpController@store']);
Route::get('status', ['as' => 'user.loggedIn.home', 'middleware' => 'auth', 'uses' => 'UserController@loggedInHome']);
Route::get('bummer', 'RsvpController@bummer');