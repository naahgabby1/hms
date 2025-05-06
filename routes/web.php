<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;

// Authentications
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::POST('login', [LoginController::class, 'auth_login'])->name('login.authentication');

Route::get('forget-password', [LoginController::class, 'showforgotpassform'])->name('forgetpassword');
Route::POST('forgetpassword-save', [LoginController::class, 'password'])->name('forgetpassword.submit');

Route::get('register-user', [LoginController::class, 'showregisterform'])->name('register');
Route::POST('register-save', [LoginController::class, 'register'])->name('register.submit');

Route::prefix('admin')->group( function (){
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware('auth:admin')->group(function(){
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Dashboard

