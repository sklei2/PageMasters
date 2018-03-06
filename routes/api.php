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

Route::get(
    'exchange',
    'ApiControllers\ExchangeRateController@get'
);


// Admin Routes
Route::post(
	'admins',
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
	'admins/{id}',
	'ApiControllers\AdminController@update'
);
Route::delete(
	'admins/{id}',
	'ApiControllers\AdminController@delete'
);

// Books Routes
Route::post(
	'books',
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
	'books/{id}',
	'ApiControllers\BookController@update'
);
Route::delete(
	'books/{id}',
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
	'courses/{id}',
	'ApiControllers\CourseController@update'
);
Route::delete(
	'courses/{id}',
	'ApiControllers\CourseController@delete'
);

// Instructors Routes
Route::post(
	'instructors',
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
	'instructors/{id}',
	'ApiControllers\InstructorController@update'
);
Route::delete(
	'instructors/{id}',
	'ApiControllers\InstructorController@delete'
);

// Student Routes
Route::post(
	'students',
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
	'students/{id}',
	'ApiControllers\StudentController@update'
);

Route::delete(
	'instructors/{id}',
	'ApiControllers\StudentController@delete'
);

// Review Routes
Route::post(
	'reviews/',
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
	'reviews/{id}',
	'ApiControllers\ReviewController@update'
);

Route::delete(
	'reviews/{id}',
	'ApiControllers\ReviewController@delete'
);

