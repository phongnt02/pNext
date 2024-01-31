<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::group(['name' => 'auth'], function () {
    Route::post('/login', [LoginController::class, 'login'])->name('auth.login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout')->middleware('auth:sanctum');
    Route::post('/register', [RegisterController::class, 'register'])->name('auth.register');
});
