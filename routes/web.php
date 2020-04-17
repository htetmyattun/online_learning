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

Route::get('/detail-course',function(){
	return view ('student/pages/detail-course');
});

Route::get('/course-content',function(){
	return view ('student/pages/course-content');
});

Route::prefix('student')->group(function() {
    Route::get('home', 'studentController@index')->name('student_home');
    Route::get('login', 'Auth\Login\studentController@showLoginForm')->name('student_login');
    Route::get('signup', 'Auth\Login\studentController@showSignupForm')->name('student_signup');
    Route::post('login', 'Auth\Login\studentController@login')->name('student_login');
    Route::get('logout', 'Auth\Login\studentController@logout')->name('student_logout');
    
 });

Route::prefix('lecturer')->group(function() {
    Route::get('home', 'lecturerController@index')->name('lecturer_home');
    Route::get('login', 'Auth\Login\lecturerController@showLoginForm')->name('lecturer_login');
    Route::get('signup', 'Auth\Login\lecturerController@showSignupForm')->name('lecturer_signup');
    Route::post('login', 'Auth\Login\lecturerController@login')->name('lecturer_login');
    Route::get('logout', 'Auth\Login\lecturerController@logout')->name('lecturer_logout');
    
 });

Route::prefix('management')->group(function() {
    Route::get('home', 'managementController@index')->name('management_home');
    Route::get('login', 'Auth\Login\managementController@showLoginForm')->name('management_login');
    Route::get('signup', 'Auth\Login\managementController@showSignupForm')->name('management_signup');
    Route::post('login', 'Auth\Login\managementController@login')->name('management_login');
    Route::get('logout', 'Auth\Login\managementController@logout')->name('management_logout');
    
 });