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

Route::get('/', function () {
    return view('login');
});

// Individual Book Page Route
Route::get('book/{id}', 'BookController@show');

Auth::routes();

Route::get('/preferences', function() {
    return view('preferences');
});

Route::get('/books', function () {
    return view('books');
});

Route::get('/cart', function () {
    return view('cart');
});

