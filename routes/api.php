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

// Courses Routes
Route::post(
    'courses',
    'ApiControllers\CourseController@create'
);

Route::get(
    'courses',
    'ApiControllers\CourseController@getAll'
);

Route::get(
    'courses/{id}',
    'ApiControllers\CourseController@get'
);

Route::get(
    'courses/{id}/books',
    'ApiControllers\CourseController@getBooks'
);

Route::put(
    'courses/update/{id}',
    'ApiControllers\CourseController@update'
);
Route::delete(
    'courses/delete/{id}',
    'ApiControllers\CourseController@delete'
);

// Instructors Routes
Route::post(
    'instructors/create/',
    'ApiControllers\InstructorController@create'
);

Route::get(
    'instructors',
    'ApiControllers\InstructorController@getAll'
);

Route::get(
    'instructors/{id}',
    'ApiControllers\InstructorController@get'
);

Route::get(
    'instructors/{id}/courses',
    'ApiControllers\InstructorController@getCourses'
);

Route::put(
    'instructors/update/{id}',
    'ApiControllers\InstructorController@update'
);
Route::delete(
    'instructors/delete/{id}',
    'ApiControllers\InstructorController@delete'
);

// Student Routes
Route::post(
    'students/create/',
    'ApiControllers\StudentController@create'
);

Route::get(
    'students',
    'ApiControllers\StudentController@getAll'
);

Route::get(
    'students/{id}',
    'ApiControllers\StudentController@get'
);

Route::get(
    'students/{id}/courses',
    'ApiControllers\StudentController@getCourses'
);

Route::get(
    'students/{id}/books',
    'ApiControllers\StudentController@getBooks'
);

Route::put(
    'students/update/{id}',
    'ApiControllers\StudentController@update'
);

Route::delete(
    'students/delete/{id}',
    'ApiControllers\StudentController@delete'
);

// Review Routes
Route::post(
    'reviews/create/',
    'ApiControllers\ReviewController@create'
);

Route::get(
    'reviews',
    'ApiControllers\ReviewController@getAll'
);

Route::get(
    'reviews/{id}',
    'ApiControllers\ReviewController@get'
);

Route::get(
    'reviews/book/{id}',
    'ApiControllers\ReviewController@getByBookId'
);

Route::get(
    'reviews/student/{id}',
    'ApiControllers\ReviewController@getByStudentId'
);

Route::put(
    'reviews/update/{id}',
    'ApiControllers\ReviewController@update'
);

Route::delete(
    'reviews/delete/{id}',
    'ApiControllers\ReviewController@delete'
);

// Cart Items

Route::put(
    'carts/{id}/add/',
    'ApiControllers\CartController@addBookToCart'
);

Route::put(
    'carts/{id}/remove/',
    'ApiControllers\CartController@removeBookFromCart'
);

Route::get(
    'carts/{id}',
    'ApiControllers\CartController@getByStudentId'
);

Route::delete(
    'carts/{id}/delete',
    'ApiControllers\CartController@deleteUsersCart'
);

//Currency Conversion route
Route::get(
    'exchange',
    'ApiControllers\ExchangeRateController@get'
);
