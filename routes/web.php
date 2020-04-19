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
    return view('index');
});

Route::prefix('student')->group(function() {
    Route::get('home', 'studentController@index')->name('student_home');
    Route::get('detail-course', 'studentController@detail_course')->name('student_detail_course');
    Route::get('course-content', 'studentController@course_content')->name('student_course_content');
    Route::get('login', 'Auth\Login\studentController@showLoginForm')->name('student_login');
    Route::get('signup', 'Auth\Login\studentController@showSignupForm')->name('student_signup');
    Route::post('signup', 'Auth\Login\studentController@signup')->name('student_signup');
    Route::post('login', 'Auth\Login\studentController@login')->name('student_login');
    Route::get('logout', 'Auth\Login\studentController@logout')->name('student_logout');
    
 });

Route::prefix('lecturer')->group(function() {
    Route::get('home', 'lecturerController@index')->name('lecturer_home');
    Route::get('add-course', 'lecturerController@add_course')->name('lecturer_add_course');
    Route::get('view-course', 'lecturerController@view_course')->name('lecturer_view_course');
    Route::get('add-section', 'lecturerController@add_section')->name('lecturer_add_section');
    Route::get('add-content', 'lecturerController@add_content')->name('lecturer_add_content');
    Route::get('login', 'Auth\Login\lecturerController@showLoginForm')->name('lecturer_login');
    Route::get('signup', 'Auth\Login\lecturerController@showSignupForm')->name('lecturer_signup');
    Route::post('signup', 'Auth\Login\lecturerController@signup')->name('lecturer_signup');
    Route::post('login', 'Auth\Login\lecturerController@login')->name('lecturer_login');
    Route::get('logout', 'Auth\Login\lecturerController@logout')->name('lecturer_logout');
    
 });

Route::prefix('management')->group(function() {
    Route::get('home', 'managementController@index')->name('management_home');
    Route::get('login', 'Auth\Login\managementController@showLoginForm')->name('management_login');
    Route::get('signup', 'Auth\Login\managementController@showSignupForm')->name('management_signup');
    Route::post('signup', 'Auth\Login\managementController@signup')->name('management_signup');
    Route::post('login', 'Auth\Login\managementController@login')->name('management_login');
    Route::get('logout', 'Auth\Login\managementController@logout')->name('management_logout');
    
 });