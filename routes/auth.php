<?php

use App\Http\Controllers\Auth\LoginController;

Route::group(['name'=> 'auth'], function () {
    Route::post('/login','LoginController@login')->name('auth.login');
    Route::post('/logout','LoginController@logout')->name('auth.logout');
    Route::post('/register','RegisterController@login')->name('auth.register');
})
?>