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
Route::post(
	'admins/create/',
	'ApiControllers\AdminController@create'
);
Route::get(
	'admins',
	'ApiControllers\AdminController@getAll'
);
Route::get(
	'admins/{id}',
	'ApiControllers\AdminController@get'
);
Route::put(
	'admins/update/{id}',
	'ApiControllers\AdminController@update'
);
Route::delete(
	'admins/delete/{id}',
	'ApiControllers\AdminController@delete'
);

// Books Routes
Route::post(
	'books/create/',
	'ApiControllers\BookController@create'
);

Route::get(
	'books',
	'ApiControllers\BookController@getAll'
);

Route::get(
	'books/{id}',
	'ApiControllers\BookController@get'
);
Route::put(
	'books/update/{id}',
	'ApiControllers\BookController@update'
);
Route::delete(
	'books/delete/{id}',
	'ApiControllers\BookController@delete'
);