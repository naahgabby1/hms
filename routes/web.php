<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\SystemuserController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\SetupsController;
use App\Http\Controllers\HallController;
use App\Http\Controllers\GymController;
use App\Http\Controllers\LostandfoundController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\HomeController;



// Authentications
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'auth_login'])->name('login.authentication');
Route::get('forget-password', [LoginController::class, 'showforgotpassform'])->name('forgetpassword');
Route::post('forgetpassword-save', [LoginController::class, 'password'])->name('forgetpassword.submit');
Route::get('register-user', [LoginController::class, 'showregisterform'])->name('register');
Route::get('default-user-page', [LoginController::class, 'showdefaultuserform'])->name('default.user.form');
Route::post('register-save', [LoginController::class, 'register'])->name('register.submit');
Route::post('save-default-password', [LoginController::class, 'change_default_password'])->name('login.changedefault.submit');







Route::middleware('auth:logindetails')->group(function(){
Route::prefix('admin')->group( function (){
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');


// Finance section
Route::prefix('financials')->group( function (){
Route::get('dashboard', [FinanceController::class, 'index'])->name('finance.dashboard');
});

// House keeping section
Route::prefix('housekeeping')->group( function (){
Route::get('dashboard', [HomeController::class, 'index'])->name('house.keepings.dashboard');
});
















// Booking & Reservations
Route::get('booking', [BookController::class, 'bookings'])->name('booking');
Route::get('cancelled-booking', [BookController::class, 'cancelledbooking'])->name('cancelled.booking');
Route::get('reservation', [BookController::class, 'reservations'])->name('reservation');
Route::get('active-reservation', [BookController::class, 'activereservation'])->name('active.reservation');
Route::get('cancelled-reservation', [BookController::class, 'cancelledreservation'])->name('cancelled.reservation');
Route::get('payments-and-checkouts/{id}', [BookController::class, 'check_out'])->name('check.out');
Route::post('confirm-checkout', [BookController::class, 'save_checkout'])->name('checkout.save');
Route::get('confirmation', [BookController::class, 'confirmation_alert'])->name('confirmation');
Route::delete('delete-booking/{id}', [BookController::class, 'booking_delete'])->name('booking.destroy');

Route::put('update-booking/{xid}', [BookController::class, 'booking_editted'])->name('edit.booking');
Route::put('update-corporate-reservation/{xid}', [BookController::class, 'corporate_reservation_editted'])->name('edit.corporate.reservation');
Route::put('update-personal-reservation/{xid}', [BookController::class, 'personal_reservation_editted'])->name('update.personal.reservation');



// Lost & Found
Route::get('lost-and-found',[LostandfoundController::class, 'index'])->name('lost.and.found.page');
Route::post('save-lost-and-found',[LostandfoundController::class, 'lost_and_found_save'])->name('lost.and.found.save');
Route::put('update-lost-and-found/{id}',[LostandfoundController::class, 'lost_and_found_update'])->name('lost.and.found.update');
Route::put('save-lost-and-found-retrieval/{id}',[LostandfoundController::class, 'lost_and_found_retrieval'])->name('save.retrieval.entry');
Route::delete('delete-lost-and-found/{id}',[LostandfoundController::class, 'lost_and_found_destroy'])->name('lost.and.found.destroy');



Route::put('confirm-reservation-as-booked/{xid}', [BookController::class, 'confirm_reservation_into_booked'])->name('confirmation.reservation');



Route::put('update-reservation/{id}', [BookController::class, 'reservation_editted'])->name('edit.reservation');
Route::delete('delete-reservation/{id}', [BookController::class, 'reservation_deleted'])->name('delete.reservation');
Route::put('cancelled-cus-reservation/{id}', [BookController::class, 'reservation_cancelled'])->name('cancel.reservation');
Route::put('confirm-reservation/{id}', [BookController::class, 'confirm_reservation'])->name('confirm.reservation');

Route::get('filter-list/{id}', [RoomController::class, 'getRooms'])->name('get.rooms');
Route::get('filter-list-reservation/{id}', [RoomController::class, 'getRooms_reservation'])->name('get.rooms.reservation');
Route::post('print-receipt', [BookController::class, 'display_receipt'])->name('receipt.show');
Route::post('save_booking_customer', [BookController::class, 'save_booking_customer'])->name('save.booking.customer');
Route::post('save-booking-corporate', [BookController::class, 'save_booking_corporate'])->name('save.booking.corporate');

Route::post('save-extra-customer', [BookController::class, 'save_extracustomer'])->name('save.extra.customer');



Route::post('save_reservation_corporate', [BookController::class, 'save_reservation_corporate'])->name('save.reservation.corporate');
Route::post('save_reservation', [BookController::class, 'save_reservation'])->name('save.reservation');

Route::put('update_booking', [BookController::class, 'update_booking'])->name('update.booking');
Route::put('update_reservation', [BookController::class, 'update_reservation'])->name('update.reservation');

Route::delete('destroy_booking', [BookController::class, 'destroy_booking'])->name('destroy.booking');
Route::delete('destroy_reservation', [BookController::class, 'destroy_reservation'])->name('destroy.reservation');

// Customers
Route::get('registered-customers', [CustomerController::class, 'index'])->name('index.customers');
Route::put('update-customer/{id}', [CustomerController::class, 'update_customers'])->name('update.customer');
Route::post('save-customer', [CustomerController::class, 'save_customers'])->name('save.customer');
Route::delete('delete-customer/{id}', [CustomerController::class, 'destroy_customers'])->name('delete.customer');

// Expenses
Route::get('expenses', [ExpenseController::class, 'index'])->name('index.expenses');
Route::put('update-expenses/{id}', [ExpenseController::class, 'update_expenses'])->name('update.expenses');
Route::put('update-expenses-category/{id}', [ExpenseController::class, 'update_expenses_category'])->name('update.expensescategory');
Route::post('save-expenses', [ExpenseController::class, 'save_expenses'])->name('save.expenses');
Route::post('save-expenses-category', [ExpenseController::class, 'save_expenses_category'])->name('save.expensescategory');
Route::delete('delete-expenses/{id}', [ExpenseController::class, 'destroy_expenses'])->name('delete.expenses');
Route::delete('delete-expenses-category/{id}', [ExpenseController::class, 'destroy_expenses_category'])->name('delete.expensescategory');
Route::get('expenses-categories', [ExpenseController::class, 'index_exptypes'])->name('expenses.category');

// Users
Route::get('users', [SystemuserController::class, 'index'])->name('index.users');
Route::put('update-users/{id}', [SystemuserController::class, 'update_users'])->name('update.users');
Route::delete('delete-users/{id}', [SystemuserController::class, 'destroy_users'])->name('delete.users');
Route::put('reset-user-password/{id}', [SystemuserController::class, 'reset_user_password'])->name('reset.user.password');
Route::post('register-user', [SystemuserController::class, 'save_new_user'])->name('save.new.user');




// payments
Route::get('payments', [PaymentController::class, 'index'])->name('index.payments');
Route::put('update-payment/{id}', [PaymentController::class, 'update_payments'])->name('update.payments');
Route::post('save-payment', [PaymentController::class, 'save_payments'])->name('save.payments');
Route::delete('delete-payment/{id}', [PaymentController::class, 'destroy_payments'])->name('delete.payments');
Route::post('open-payment/{id}', [StaffController::class, 'open_payments'])->name('open.payment.schedule');


// Gym
Route::get('gym-activities', [GymController::class, 'index'])->name('gym.activities.list');
Route::get('gym-clients', [GymController::class, 'index_clients'])->name('gym.clients.list');
Route::put('update-gym-activities', [GymController::class, 'index_update'])->name('update.gym.entry');
Route::delete('delete-gym-activities', [GymController::class, 'index_destroy'])->name('delete.gym.entry');
Route::post('save-gym-customers', [GymController::class, 'save_gym_customers'])->name('save.gym.customers');
Route::post('save-gym-activities', [GymController::class, 'save_gym_activities'])->name('save.gym.activities');
Route::get('filter-customer-phones/{id}', [GymController::class, 'getCustomer_numbers'])->name('get.custmoer.numbers');



// Hall
Route::get('hall-activities', [HallController::class, 'index'])->name('hall.activities.list');
Route::put('update-hall-activities', [HallController::class, 'index_update'])->name('update.hall.entry');
Route::delete('delete-hall-activities', [HallController::class, 'index_destroy'])->name('delete.hall.entry');
Route::post('hall-booking', [HallController::class, 'save_hall_bookings'])->name('save.customer.hall');
Route::post('hall-payments/{id}', [HallController::class, 'hall_payments'])->name('save.hall.payments');
Route::put('hall-booking-update/{id}', [HallController::class, 'update_customers_booking'])->name('update.customer.hall');
Route::delete('delete-hall-booking/{id}',[HallController::class, 'hbook_destroy'])->name('hall.entry.destroy');




// Staff
Route::get('registered-staff', [StaffController::class, 'index'])->name('index.staffpage');
Route::put('update-staff/{id}', [StaffController::class, 'update_staff'])->name('update.staff');
Route::post('save-staff', [StaffController::class, 'save_staff'])->name('save.staff');
Route::delete('delete-staff/{id}', [StaffController::class, 'destroy_staff'])->name('delete.staff');
Route::get('staff-salary', [StaffController::class, 'salary_staff'])->name('salary.staff');




Route::get('invoice', [DashboardController::class, 'index'])->name('invoice');
Route::get('payments', [DashboardController::class, 'index'])->name('payments');
Route::get('old-customers', [DashboardController::class, 'index'])->name('old.customers');
Route::get('recent-customers', [DashboardController::class, 'index'])->name('recent.customers');
Route::get('other-activities', [DashboardController::class, 'index'])->name('other.activities');
Route::get('staff-list', [DashboardController::class, 'index'])->name('staff.list');
Route::get('user-list', [DashboardController::class, 'index'])->name('user.list');


// Setups
Route::get('room-types', [SetupsController::class, 'index_room_types'])->name('room.types');
Route::post('save-room', [SetupsController::class, 'save_room'])->name('save.room.entry');
Route::put('update-room/{id}', [SetupsController::class, 'update_room'])->name('update.room.entry');
Route::post('save-rates-discount', [SetupsController::class, 'save_rates'])->name('save.vat.discount');
Route::get('rooms', [SetupsController::class, 'index_rooms'])->name('rooms');
Route::get('tax-and-discounts', [SetupsController::class, 'index_tax_discounts'])->name('tax.rates.dicounts');
});
});
