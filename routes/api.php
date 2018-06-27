<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['namespace' => 'API', 'middleware' => 'auth:api'], function() {
    Route::get('user', function () {
        return auth()->user();
    });
    // Route::group(['middleware' =>  'auth:api'], function() {
    
    Route::get('pick', 'PickController@index');
    Route::post('user/location', 'LocationController@update');
    // });
});


Route::group(['namepsace' => 'API', 'middleware' => 'auth:api'], function() {

});
