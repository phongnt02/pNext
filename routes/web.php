<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::group(['name' => 'api', 'prefix' => 'api'], function () {
    include "auth.php";
    include "home.php";
    include "courses.php";
});

// route này luôn được đặt ở cuối file
Route::any('{path}', function () {
    return view('index');
})->where('path', '.*');
