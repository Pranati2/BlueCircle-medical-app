<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});


// Get All Students
Route::GET("/eloquent/students", 'App\Http\Controllers\EloquentStudentsController@getAll');
Route::GET("/eloquent/students/{id}", 'App\Http\Controllers\EloquentStudentsController@get');
Route::POST("/eloquent/students", 'App\Http\Controllers\EloquentStudentsController@update');

Route::GET("/raw/students", 'App\Http\Controllers\RawStudentsController@getAll');
Route::GET("/raw/students/{id}", 'App\Http\Controllers\RawStudentsController@get');
Route::POST("/raw/students", 'App\Http\Controllers\RawStudentsController@update');


// Enrollment
Route::GET("/eloquent/enrollments", 'App\Http\Controllers\EloquentEnrollmentController@getAll');
Route::GET("/eloquent/enrollments/{id}", 'App\Http\Controllers\EloquentEnrollmentController@get');
Route::POST("/eloquent/enrollments", 'App\Http\Controllers\EloquentEnrollmentController@update');

Route::GET("/raw/enrollments", 'App\Http\Controllers\RawEnrollmentController@getAll');
Route::GET("/raw/enrollments/{id}", 'App\Http\Controllers\RawEnrollmentController@get');
Route::POST("/raw/enrollments", 'App\Http\Controllers\RawEnrollmentController@update');