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

Route::get('/', [
    'uses' => 'DoController@getHome',
    'as' => 'home'
]);

Route::group(['prefix' => 'do'], function() {
    Route::get('/{action}', [
       'uses' => 'DoController@getDoAction',
       'as' => 'doaction'
    ]);
    
    Route::get('/{action}/{name?}', [
        'uses' => 'DoController@getNiceAction',
        'as' => 'niceaction'
    ]);
    
    Route::post('/add/action', [
        'uses' => 'DoController@postAddAction',
        'as' => 'add_action'
    ]);
    
    Route::post('/', [
        'uses' => 'DoController@postNiceAction',
        'as' => 'benice'
    ]);    
});
