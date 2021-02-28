<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'PageController@index');


Route::get('/trainer/{id}', 'TrainerController@profile')->name('trainer.profile');
Route::get('/trainer', 'TrainerController@index')->name('trainer');
Route::get('/course/{id}', 'CourseController@profile')->name('course.profile');
Route::get('/course', 'CourseController@index')->name('course');


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/verify', 'Auth\RegisterController@verifyUser')->name('verify.user');


//Course
// Route::resource('courses','CoursesController');

// Route::get('{path}', 'HomeController@index')->where( 'path' , '([A-z\d\-\/_.]+)?' );

