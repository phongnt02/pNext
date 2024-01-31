<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
include "auth.php";
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(HomeController::class)->name('home')->group( function () {
    Route::any('/home', 'getDataDefault')->name('home.getDataDefault');
});

Route::group(['name'=>'courses', 'prefix' => 'courses'], function () {
    Route::any('/', 'CoursesController@getListCourses')->name('courses.getListCourses');
    Route::post('/search', 'CoursesController@search')->name('courses.search');
    Route::post('/searchSelect', 'CoursesController@searchSelect')->name('courses.searchSelect');
    Route::post('/getDataLearnDefault', 'CoursesController@getDataLearnDefault')->name('courses.getDataLearnDefault');

});