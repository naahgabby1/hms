<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;



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




return view('pages.dashboard.index',
compact('title','breadCrumbs','section_title','Greetings'));
}
}
