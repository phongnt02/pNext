<?php
Route::group(['name'=>'courses', 'prefix' => 'courses'], function () {
    Route::any('/', 'CoursesController@getListCourses')->name('courses.getListCourses');
    Route::post('/search', 'CoursesController@search')->name('courses.search');
    Route::post('/searchSelect', 'CoursesController@searchSelect')->name('courses.searchSelect');
})

?>