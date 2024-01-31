<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ManageCoursesController;
use App\Http\Controllers\Admin\ManageUserController;
use App\Http\Controllers\Admin\ManageChaptersController;
use App\Http\Controllers\Admin\ManageLessonsController;
use App\Http\Controllers\ResourceController;
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

Route::group(['name' => 'admin', 'prefix' => 'admin'], function () {

    Route::group(['name' => 'dashboard'], function () {
        Route::any('/', [DashboardController::class, 'index'])->name('dashboard.index');
    });

    Route::group(['name' => 'user', 'prefix' => 'user'], function () {
        Route::any('/', [ManageUserController::class, 'index'])->name('user.index');
        Route::any('/add', [ManageUserController::class, 'add'])->name('user.add');
        Route::any('/edit', [ManageUserController::class, 'edit'])->name('user.edit');
        Route::any('/delete', [ManageUserController::class, 'delete'])->name('user.delete');
        Route::any('/storage', [ManageUserController::class, 'store'])->name('user.storage');
    });

    Route::group(['name' => 'courses', 'prefix' => 'courses'], function () {
        Route::any('/', [ManageCoursesController::class, 'index'])->name('courses.index');
        Route::any('/add', [ManageCoursesController::class, 'add'])->name('courses.add');
        Route::any('/store', [ManageCoursesController::class, 'store'])->name('courses.storage');
        Route::any('/edit', [ManageCoursesController::class, 'edit'])->name('courses.edit');
        Route::any('/update', [ManageCoursesController::class, 'update'])->name('courses.update');
        Route::any('/delete', [ManageCoursesController::class, 'delete'])->name('courses.delete');
    });

    Route::group(['name' => 'chapters', 'prefix' => 'chapters'], function () {
        Route::any('index/{courses_id}', [ManageChaptersController::class, 'index'])->name('chapters.index');
        Route::any('/add', [ManageChaptersController::class, 'add'])->name('chapters.add');
        Route::any('/storage', [ManageChaptersController::class, 'store'])->name('chapters.storage');
        Route::any('/edit/{chapters_id}', [ManageChaptersController::class, 'edit'])->name('chapters.edit');
        Route::any('/update', [ManageChaptersController::class, 'update'])->name('chapters.update');
        Route::any('/delete', [ManageChaptersController::class, 'delete'])->name('chapters.delete');
    });

    Route::group(['name' => 'lessons', 'prefix' => 'lessons'], function () {
        Route::any('index/{chapters_id}', [ManageLessonsController::class, 'index'])->name('lessons.index');
        Route::any('/add', [ManageLessonsController::class, 'add'])->name('lessons.add');
        Route::any('/storage', [ManageLessonsController::class, 'store'])->name('lessons.storage');
        Route::any('/edit/{lessons_id}', [ManageLessonsController::class, 'edit'])->name('lessons.edit');
        Route::any('/update', [ManageLessonsController::class, 'update'])->name('lessons.update');
        Route::any('/delete', [ManageLessonsController::class, 'delete'])->name('lessons.delete');
    });
});

Route::group(['name' => 'resource'], function () {
    Route::any('resource/{name_folder_store}/{file_name}', [ResourceController::class, 'show'])->name('resource.show');
    Route::any('resource/subtitle', [ResourceController::class, 'subtitleFile'])->name('resource.subtitle');
});


// route này luôn được đặt ở cuối file
Route::any('{path}', function () {
    return view('index');
})->where('path', '.*');
