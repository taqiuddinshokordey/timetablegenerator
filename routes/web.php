<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth'], function () {
    Route::get('courses', 'CourseController@index')->name('courses');
    Route::get('courses/store', 'CourseController@store')->name('course.store');

    Route::get('departments', 'DepartmentsController@index')->name('departments');
    Route::post('departments/store', 'DepartmentsController@store')->name('department.store');
    Route::delete('departments/remove/{id}', 'DepartmentsController@remove')->name('department.remove');
    Route::get('time-table', 'TimeTableController@index')->name('timetable.index');

    Route::get('generate', 'TimeTableController@generate');

});