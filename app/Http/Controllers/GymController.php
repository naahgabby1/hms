<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomClass\Userroles;
use App\CustomClass\Userdetails;
use App\Models\Gym;
use App\Models\GymTransactions;
use Illuminate\Support\Facades\DB;

class GymController extends Controller
{

protected $userDetails;
protected $userRoles;
public function __construct(Userdetails $userDetails, Userroles $userRoles)
{
$this->userDetails = $userDetails;
$this->userRoles = $userRoles;
}




public function index(){
$title = 'Gym Activities';
$breadCrumbs = 'Gym Activities';
$user = new Userdetails;
$GymCustomers = Gym::all();
$MemType = DB::table('gym_membership_type')->get();
$GymTransactions = DB::table('gym_transactions')->get();

return view('pages.gym.index',
compact('title','breadCrumbs','GymCustomers','GymTransactions','MemType'));
}

public function save_gym_customers(Request $request){
$title = 'Setups';
$breadCrumbs = 'Update Rooms';
$request->validate([
'room_type_edit' => 'required',
'room_name_edit' => 'required',
'room_rate_edit' => 'required|numeric',
'room_rate_double_edit' => 'required|numeric'
]);


$notification = array(
'message'=>"Room Updated Successfully",
'type' => 'success',
'notification' => 'SUCCESS',
);
return back()->with($notification);
}


public function save_gym_activities(Request $request){
$title = 'Setups';
$breadCrumbs = 'Update Rooms';
$request->validate([
'room_type_edit' => 'required',
'room_name_edit' => 'required',
'room_rate_edit' => 'required|numeric',
'room_rate_double_edit' => 'required|numeric'
]);


$notification = array(
'message'=>"Room Updated Successfully",
'type' => 'success',
'notification' => 'SUCCESS',
);
return back()->with($notification);
}


public function index_destroy($id){
$title = 'Staff';
$breadCrumbs = 'Human Resources';
Gym::findOrFail($id)->delete();
$notification = array(
'message'=>"Staff Successfully Deleted..!!!",
'alert-type'=>'success',
);
return back()->with($notification,compact('title','breadCrumbs'));
}


}
