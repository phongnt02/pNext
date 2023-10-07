<?php
Route::group(['name'=>'courses'], function () {
    Route::any('/courses', 'CoursesController@getListCourses')->name('courses.getListCourses');
})

?>