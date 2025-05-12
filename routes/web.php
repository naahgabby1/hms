<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookController;

// Authentications
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'auth_login'])->name('login.authentication');
Route::get('forget-password', [LoginController::class, 'showforgotpassform'])->name('forgetpassword');
Route::post('forgetpassword-save', [LoginController::class, 'password'])->name('forgetpassword.submit');
Route::get('register-user', [LoginController::class, 'showregisterform'])->name('register');
Route::post('register-save', [LoginController::class, 'register'])->name('register.submit');

Route::middleware('auth:logindetails')->group(function(){
Route::prefix('admin')->group( function (){
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Booking & Reservations
Route::get('booking', [BookController::class, 'bookings'])->name('booking');
Route::get('cancelled-booking', [BookController::class, 'cancelledbooking'])->name('cancelled.booking');
Route::get('reservation', [BookController::class, 'reservations'])->name('reservation');
Route::get('active-reservation', [BookController::class, 'activereservation'])->name('active.reservation');
Route::get('cancelled-reservation', [BookController::class, 'cancelledreservation'])->name('cancelled.reservation');
Route::get('payments-and-checkouts/{id}', [BookController::class, 'check_out'])->name('check.out');
Route::post('confirm-checkout', [BookController::class, 'save_checkout'])->name('checkout.save');
Route::get('confirmation', [BookController::class, 'confirmation_alert'])->name('confirmation');


Route::post('print-receipt', [BookController::class, 'display_receipt'])->name('receipt.show');



Route::post('save_booking', [BookController::class, 'save_booking'])->name('save.booking');
Route::post('save_reservation', [BookController::class, 'save_reservation'])->name('save.reservation');

Route::put('update_booking', [BookController::class, 'update_booking'])->name('update.booking');
Route::put('update_reservation', [BookController::class, 'update_reservation'])->name('update.reservation');

Route::delete('destroy_booking', [BookController::class, 'destroy_booking'])->name('destroy.booking');
Route::delete('destroy_reservation', [BookController::class, 'destroy_reservation'])->name('destroy.reservation');







Route::get('invoice', [DashboardController::class, 'index'])->name('invoice');
Route::get('payments', [DashboardController::class, 'index'])->name('payments');
Route::get('old-customers', [DashboardController::class, 'index'])->name('old.customers');
Route::get('recent-customers', [DashboardController::class, 'index'])->name('recent.customers');
Route::get('expenses-list', [DashboardController::class, 'index'])->name('expenses.list');
Route::get('expenses-category', [DashboardController::class, 'index'])->name('expenses.category');
Route::get('other-activities', [DashboardController::class, 'index'])->name('other.activities');
Route::get('staff-list', [DashboardController::class, 'index'])->name('staff.list');
Route::get('user-list', [DashboardController::class, 'index'])->name('user.list');
Route::get('room-type', [DashboardController::class, 'index'])->name('room.type');
Route::get('rooms', [DashboardController::class, 'index'])->name('rooms');
Route::get('tax-rates', [DashboardController::class, 'index'])->name('tax.rates');
Route::get('sms-settings', [DashboardController::class, 'index'])->name('sms.settings');
Route::get('general-settings', [DashboardController::class, 'index'])->name('general.settings');
Route::get('currency-settings', [DashboardController::class, 'index'])->name('currency.settings');
});
});

// Dashboard

