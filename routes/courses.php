<?php
Route::group(['name'=>'courses', 'middleware' => ['sanctum']], function () {
    Route::middleware('auth:sanctum')->any('/courses', 'CoursesController@getListCourses')->name('courses.getListCourses');
})

?>