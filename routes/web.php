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
    return view('student/pages/home');
});

Route::get('/detail-course',function(){
	return view ('student/pages/detail-course');
});

Route::get('/course-content',function(){
	return view ('student/pages/course-content');
});

Route::prefix('student')->group(function() {
     Route::get('home', 'studentController@index')->name('home');
     Route::get('login', 'Auth\Login\studentController@showLoginForm')->name('login');
    Route::post('login', 'Auth\Login\studentController@login')->name('login');
    Route::get('logout', 'Auth\Login\studentController@logout')->name('logout');
    
 });
