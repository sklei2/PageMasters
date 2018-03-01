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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Admin Routes
Route::post('admins/{admin}', 'AdminApiController@create');
Route::get('admins', 'AdminApiController@getAll');
Route::get('admins/{id}', 'AdminApiController@get');
Route::put('admins/{admin}', 'AdminApiController@update');
Route::delete('admins/{id}', 'AdminApiController@delete');
