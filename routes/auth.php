<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::group(['name' => 'auth'], function () {
    Route::post('/login', [LoginController::class, 'login'])->name('auth.login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout')->middleware('auth:sanctum');
    Route::post('/register', [RegisterController::class, 'register'])->name('auth.register');
});

Route::group(['name' => 'facebook'], function () {
    Route::get('auth-facebook', function () {
        return 'success';
    });

    Route::get('/auth-facebook/policy', function () {
        return '<div>Test</div>';
    });

    Route::get('/auth-facebook/redirect', function () {
        return Socialite::driver('facebook')->redirect();
    });
     
    Route::get('/auth-facebook/callback', function () {
        $user = Socialite::driver('facebook')->user();
    });
});
