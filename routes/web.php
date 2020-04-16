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
