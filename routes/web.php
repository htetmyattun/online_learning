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

Route::get('/', 'guestController@index')->name('guest_home');
Route::get('/{id}', 'guestController@index1')->name('guest_home1');

Route::prefix('student')->group(function() {
    Route::get('fetch-coupon', 'studentController@fetch_coupon')->name('student_fetch_coupon');
    Route::post('fetch-password', 'studentController@fetch_password')->name('student_fetch_password');
    Route::post('update-password','studentController@update_password')->name('student_update_password');
    Route::get('home', 'studentController@index')->name('student_home');
    Route::get('home/{id}', 'studentController@index1')->name('student_home1');
    Route::get('chat', 'studentController@chat')->name('student_chat');
    Route::get('message/{id}', 'studentController@view_message')->name('student_view_message');
    Route::post('message', 'studentController@send_message')->name('student_send_message');
    Route::get('detail-course/{id}', 'studentController@detail_course')->name('student_detail_course');
    Route::get('course-resource/{id}', 'studentController@course_resource')->name('student_course_resource');
    Route::get('course-content/{c_id}&{id}&{p}', 'studentController@course_content')->name('student_course_content');
    Route::get('myclass', 'studentController@myclass')->name('student_myclass');
    Route::get('all-courses', 'studentController@all_courses')->name('student_all_courses');
    Route::get('all-courses/{id}', 'studentController@all_courses1')->name('student_all_courses1');
    Route::post('all-courses', 'studentController@all_courses2')->name('student_all_courses2');
    Route::get('assignment/{id}', 'studentController@assignment')->name('student_assignment');
    Route::post('assignment', 'studentController@assignment_upload')->name('student_assignment_upload');
    Route::get('profile', 'studentController@profile')->name('student_profile');
    Route::get('edit-profile', 'studentController@edit_profile')->name('student_edit_profile');
    Route::post('edit-profile', 'studentController@editprofile')->name('student_edit_profile');
    Route::post('enroll','studentController@enrollment')->name('student_enrollment');
    Route::post('review','studentController@review')->name('student_review');


    Route::get('login', 'Auth\Login\studentController@showLoginForm')->name('student_login');
    Route::get('signup', 'Auth\Login\studentController@showSignupForm')->name('student_signup');
    Route::post('signup', 'Auth\Login\studentController@signup')->name('student_signup');
    Route::post('login', 'Auth\Login\studentController@login')->name('student_login');
    Route::get('logout', 'Auth\Login\studentController@logout')->name('student_logout');
    Route::get('image', 'studentController@image');
 Route::post('store', 'studentController@store')->name('student_store');
    Route::post('save-note','studentController@save_note')->name('student_save_note');
 });

Route::prefix('lecturer')->group(function() {
    Route::get('home', 'lecturerController@index')->name('lecturer_home');
    Route::get('chat', 'lecturerController@chat')->name('lecturer_chat');
    Route::get('message/{id}', 'lecturerController@view_message')->name('lecturer_view_message');
    Route::post('message', 'lecturerController@send_message')->name('lecturer_send_message');
    Route::get('add-course', 'lecturerController@add_course')->name('lecturer_add_course');
    Route::post('add-course', 'lecturerController@addCourse')->name('lecturer_add_course');
    Route::get('view-course', 'lecturerController@view_course')->name('lecturer_view_course');
    Route::get('edit-course', 'lecturerController@edit_course')->name('lecturer_edit_course');
    Route::get('edit-section/{id}', 'lecturerController@edit_section')->name('lecturer_edit_section');
    Route::post('edit-section', 'lecturerController@edit_section_save')->name('lecturer_edit_section');
    Route::get('add-content/{id}', 'lecturerController@add_content')->name('lecturer_add_content');
    Route::post('add-content', 'lecturerController@add_content_save')->name('lecturer_add_content');
    Route::get('edit-content/{id}', 'lecturerController@edit_content')->name('lecturer_edit_content');
    Route::post('edit-content', 'lecturerController@edit_content_save')->name('lecturer_edit_content');
    Route::get('assignment-list', 'lecturerController@assignment_list')->name('lecturer_assignment_list');
    Route::get('assignment-list/{id}', 'lecturerController@assignment_by_course')->name('lecturer_assignment_list');
    Route::get('check-assignment/{id}&{cid}', 'lecturerController@check_assignment')->name('lecturer_check_assignment');
    Route::post('check-assignment/', 'lecturerController@add_assignment_marks')->name('lecturer_add_assignment_marks');
    Route::get('view-course/{id}', 'lecturerController@view_course')->name('lecturer_view_course');
    Route::get('edit-course/{id}', 'lecturerController@edit_course')->name('lecturer_edit_course');
    Route::post('edit-course', 'lecturerController@save_edit_course')->name('lecturer_edit_course');
    Route::get('add-section/{id}', 'lecturerController@add_section')->name('lecturer_add_section');
    Route::post('add-section', 'lecturerController@add_section_save')->name('lecturer_add_section');
    Route::get('delete-section/{id}','lecturerController@delete_section')->name('lecturer_delete_section');
    Route::get('delete-content/{id}&{sid}','lecturerController@delete_content')->name('lecturer_delete_content');
    Route::post('delete-section/{id}','lecturerController@delete_section')->name('lecturer_delete_section');
    Route::get('add-content/{id}', 'lecturerController@add_content')->name('lecturer_add_content');
    Route::get('profile', 'lecturerController@profile')->name('lecturer_profile');
    Route::get('edit-profile', 'lecturerController@edit_profile')->name('lecturer_edit_profile');
    Route::post('edit-profile', 'lecturerController@editprofile')->name('lecturer_edit_profile');
    Route::get('login', 'Auth\Login\lecturerController@showLoginForm')->name('lecturer_login');
    Route::get('signup', 'Auth\Login\lecturerController@showSignupForm')->name('lecturer_signup');
    Route::post('signup', 'Auth\Login\lecturerController@signup')->name('lecturer_signup');
    Route::post('login', 'Auth\Login\lecturerController@login')->name('lecturer_login');
    Route::get('logout', 'Auth\Login\lecturerController@logout')->name('lecturer_logout');
    
 });

Route::prefix('management')->group(function() {
    Route::get('home', 'managementController@index')->name('management_home');
    Route::get('view-request', 'managementController@view_request')->name('management_students_request');
    Route::get('attended_students', 'managementController@attended_students')->name('management_attended_students');
    Route::get('online', 'managementController@online')->name('management_online');
    Route::get('add_new_student', 'managementController@add_new_student')->name('management_add_new_student');
    Route::post('save_new_student', 'managementController@save_new_student')->name('management_save_new_student');
    Route::get('college', 'managementController@college')->name('management_college');
    Route::get('request/{id}', 'managementController@allow_request')->name('management_allow_request');
    Route::get('login', 'Auth\Login\managementController@showLoginForm')->name('management_login');
    Route::get('signup', 'Auth\Login\managementController@showSignupForm')->name('management_signup');
    Route::post('signup', 'Auth\Login\managementController@signup')->name('management_signup');
    Route::post('login', 'Auth\Login\managementController@login')->name('management_login');
    Route::get('logout', 'Auth\Login\managementController@logout')->name('management_logout');
    Route::get('add-coupon','managementController@add_coupon')->name('management_add_coupon');
    Route::post('add-coupon','managementController@save_coupon')->name('management_save_coupon');
    Route::get('all-coupons','managementController@all_coupons')->name('management_all_coupons');
    Route::get('delete_coupon/{id}','managementController@delete_coupon')->name('management_delete_coupon');
 });





