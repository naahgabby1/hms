<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Book;
use Illuminate\Support\Facades\DB;



class DashboardController extends Controller
{
public function index(){
$title = 'Dashboard';
$breadCrumbs = 'Dashboard';
$section_title = 'Welcome..!! Booking Management Section';
$currentHour = Carbon::now()->format('H');
if ($currentHour >= 5 && $currentHour < 12) {
$Greetings = 'Good Morning';
} elseif ($currentHour >= 12 && $currentHour < 17) {
$Greetings = 'Good Afternoon';
} else {
$Greetings = 'Good Evening';
}

$today = Carbon::today();
$reservations = Book::whereDate('date_entered', $today)->get();

$reservations2 = DB::table('vw_reservationbooking')
->select('occupancy', 'fees', 'fees_double', 'advanced_payment')
->where('status', 1)
->get();


$totalAmount = DB::table('payments')->whereDate('date_time', $today)->sum('amount');

$customers = DB::table('customers')->count();
$rooms = DB::table('room')->count();
$users = DB::table('users')->count();
$staff = DB::table('users')->count();
$cancelled = DB::table('booking_reservation')->where('cancelled', 1)->count();
$lostxfound = DB::table('lostandfound')->where('status', 0)->count();

$mcounts = [
'customers'  => $customers,
'rooms'      => $rooms,
'users'      => $users,
'staff'      => $staff,
'cancelled'  => $cancelled,
'lostxfound' => $lostxfound,
];

return view('pages.dashboard.index',
compact('title','breadCrumbs','section_title',
'Greetings','reservations',
'totalAmount','reservations2',
'mcounts'));
}
}
