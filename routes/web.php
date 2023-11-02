<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ManageCoursesController;
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

include "auth.php";
Route::group(['name' => 'admin', 'prefix' => 'admin'], function () {

    Route::group(['name' => 'dashboard'], function () {
        Route::any('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    
    });
    
    Route::group(['name' => 'courses', 'prefix' => 'courses'], function () {
        Route::any('/', [ManageCoursesController::class, 'index'])->name('courses.index');
        Route::any('/add', [ManageCoursesController::class, 'add'])->name('courses.add');
        Route::any('/storage', [ManageCoursesController::class, 'store'])->name('courses.storage');
    });

});


// route này luôn được đặt ở cuối file
Route::any('{path}', function () {
    return view('index');
})->where('path', '.*');
