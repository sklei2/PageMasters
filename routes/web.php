<?php

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
Route::get('/', 'Auth\\LoginController@GetLoginPage');
Route::get('loginwithgoogle', 'Auth\\LoginController@loginWithGoogle');
Route::get('logout', 'Auth\\LoginController@logout');
Route::get('signup', 'Auth\\RegisterController@GetRegisterPage');

// Individual Book Page Route
Route::get('/book/{id}', 'BookController@show');

Auth::routes();

Route::get('/preferences', 'PreferencesController@show');
Route::get('/addbooktocourse', 'PreferencesController@addBookToCourse');
Route::get('/admin', 'AdminController@show');

Route::get('/books', 'BookController@getAll');

Route::get('/cart', 'CartController@getCart');

Route::get('/coverage', function () {
    return Redirect::to('report/report/Http/Controllers/ApiControllers/index.html');
});


