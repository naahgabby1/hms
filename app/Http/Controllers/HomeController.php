<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomClass\Userroles;
use App\CustomClass\Userdetails;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
protected $userDetails;
protected $userRoles;
public function __construct(Userdetails $userDetails, Userroles $userRoles)
{
$this->userDetails = $userDetails;
$this->userRoles = $userRoles;
}



public function index(){
$title = 'House Keeping';
$breadCrumbs = 'House Keeping Activities';
$section_title = 'Welcome..!! House Keeping Management';
$currentHour = Carbon::now()->format('H');
if ($currentHour >= 5 && $currentHour < 12) {
$Greetings = 'Good Morning';
} elseif ($currentHour >= 12 && $currentHour < 17) {
$Greetings = 'Good Afternoon';
} else {
$Greetings = 'Good Evening';
}

// $GymTransactions = DB::table('hall_transactions')->get();

return view('pages.housekeeps.index',
compact('title','breadCrumbs','section_title','Greetings'));
}
}
