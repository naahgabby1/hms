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
Route::get('reservation', [DashboardController::class, 'index'])->name('reservation');
Route::get('active-reservation', [DashboardController::class, 'index'])->name('active-reservation');
Route::get('cancelled-reservation', [DashboardController::class, 'index'])->name('cancelled-reservation');
Route::get('invoice', [DashboardController::class, 'index'])->name('invoice');
Route::get('payments', [DashboardController::class, 'index'])->name('payments');
Route::get('old-customers', [DashboardController::class, 'index'])->name('old-customers');
Route::get('recent-customers', [DashboardController::class, 'index'])->name('recent-customers');
Route::get('expenses-list', [DashboardController::class, 'index'])->name('expenses-list');
Route::get('expenses-category', [DashboardController::class, 'index'])->name('expenses-category');
Route::get('other-activities', [DashboardController::class, 'index'])->name('other-activities');
Route::get('staff-list', [DashboardController::class, 'index'])->name('staff-list');
Route::get('user-list', [DashboardController::class, 'index'])->name('user-list');
Route::get('room-type', [DashboardController::class, 'index'])->name('room-type');
Route::get('rooms', [DashboardController::class, 'index'])->name('rooms');
Route::get('tax-rates', [DashboardController::class, 'index'])->name('tax-rates');
Route::get('sms-settings', [DashboardController::class, 'index'])->name('sms-settings');
Route::get('general-settings', [DashboardController::class, 'index'])->name('general-settings');
Route::get('currency-settings', [DashboardController::class, 'index'])->name('currency-settings');
});

Route::middleware('auth:admin')->group(function(){
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Dashboard

