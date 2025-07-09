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

public function getCustomer_numbers($id)
{
$rooms = DB::table('gym_customers')
->select('name', 'phone_number')
->where('id', $id)
->first();

return response()->json([
'success' => true,
'data' => $rooms
]);
}



public function index_clients(){
$title = 'Gym Clients';
$breadCrumbs = 'Gym Clients';
$delete_permission = 0;
$GymCustomers = Gym::all();
$MemType = DB::table('gym_membership_type')->get();
$GymTransactions = DB::table('gym_transactions')->get();
if ($this->userRoles->isEither([1])) {
$delete_permission = 1;
}
$GymTrainers = DB::table('gym_trainers')->where('status', 0)->get();

return view('pages.gym.clients',
compact('title','breadCrumbs','GymCustomers','GymTransactions','MemType','GymTrainers','delete_permission'));
}




public function index(){
$title = 'Gym Activities';
$breadCrumbs = 'Gym Activities';
$delete_permission = 0;
$GymCustomers = Gym::all();
$MemType = DB::table('gym_membership_type')->get();
$GymTransactions = DB::table('gym_transactions')->get();
if ($this->userRoles->isEither([1])) {
$delete_permission = 1;
}
$GymTrainers = DB::table('gym_trainers')->where('status', 0)->get();

return view('pages.gym.index',
compact('title','breadCrumbs','GymCustomers','GymTransactions','MemType','GymTrainers','delete_permission'));
}

public function save_gym_customers(Request $request){
$request->validate([
'discounts' => 'required|numeric',
'gym_trainer' => 'required',
'emergency_contact' => 'required',
'start_date' => 'required',
'address' => 'required',
'gender' => 'required',
'email' => 'required',
'phone_number' => 'required',
'membership' => 'required',
'client_name' => 'required'
]);

Gym::create([
'name' => $request->input('client_name'),
'address' => $request->input('address'),
'phone_number' => $request->input('phone_number'),
'email' => $request->input('email'),
'gender' => $request->input('gender'),
'emergency_contact' => $request->input('emergency_contact'),
'membership_type' => $request->input('membership'),
'start_date' => $request->input('start_date'),
'trainer_id' => $request->input('gym_trainer'),
'discount' => $request->input('discounts')/100,
'entered_by' => $this->userDetails->username()
]);


$notification = array(
'message'=>"Gym Customer Registered Successfully",
'type' => 'success',
'notification' => 'SUCCESS',
);
return back()->with($notification);
}


public function save_gym_activities(Request $request){
$chex = $request->validate([
'membership_preselected' => 'required'
]);


if ($request->input('membership_preselected')==1) {
$request->validate([
'membership_registered' => 'required'
]);
// date_time 	payment_enteredby 	payment_datetime
DB::table('gym_transactions')->insert([
'gym_client_group' => 1,
'gym_client' => $request->input('membership_registered_phone_hidden'),
'phone_number' => $request->input('membership_registered_phone'),
'client_group' => 'Seasonal Client'
]);

}else{
$request->validate([
'onetime_customer' => 'required'
]);
DB::table('gym_transactions')->insert([
'gym_client_group' => 2,
'gym_client' => $request->input('onetime_customer'),
'phone_number' => $request->input('onetime_customer_phone'),
'client_group' => 'Onetime Client'
]);
}

$notification = array(
'message'=>"Gym Transaction Saved Successfully",
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
