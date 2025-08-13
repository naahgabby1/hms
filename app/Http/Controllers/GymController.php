<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomClass\Userroles;
use App\CustomClass\Userdetails;
use App\Models\Gym;
use App\Models\GymPayments;
use Carbon\Carbon;
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
$GymCustomers_data = DB::table('vw_gymcustomers')->get();
$MemType = DB::table('gym_membership_type')->get();
$GymTransactions = DB::table('gym_transactions')->get();
if ($this->userRoles->isEither([1])) {
$delete_permission = 1;
}
$GymTrainers = DB::table('gym_trainers')->where('status', 0)->get();
return view('pages.gym.clients',
compact('title','breadCrumbs','GymCustomers','GymTransactions','MemType','GymTrainers','delete_permission','GymCustomers_data'));
}




public function index(){
$title = 'Gym Activities';
$breadCrumbs = 'Gym Activities';
$delete_permission = 0;
$now = Carbon::now();
$PaymentSums = [
'this_month' => DB::table('gym_payments')
->whereYear('date_time', now()->year)
->whereMonth('date_time', now()->month)
->sum('amount'),
'this_year' => DB::table('gym_payments')
->whereYear('date_time', now()->year)
->sum('amount'),
];

$currentYear = Carbon::now()->year;
$GymCustomers = DB::table('vw_gymcustomers as g')
->leftJoin('gym_payments as z', function($join) use ($currentYear) {
$join->on('g.id', '=', 'z.customer_id')
->whereYear('z.date_time', $currentYear);
})
->select(
'g.*',
DB::raw('SUM(z.amount) as total_payments')
)
->groupBy('g.id', 'g.name', 'g.phone_number', 'g.email')
->get();

$MemType = DB::table('gym_membership_type')->get();
$GymTransactions = DB::table('gym_transactions')
->where('status', 0)->get();
if ($this->userRoles->isEither([1])) {
$delete_permission = 1;
}
$GymTrainers = DB::table('gym_trainers')->where('status', 0)->get();
return view('pages.gym.index',compact(
'title',
'breadCrumbs',
'GymCustomers',
'GymTransactions',
'MemType',
'GymTrainers',
'delete_permission',
'PaymentSums'
));
}


public function save_gym_payment(Request $request){
$request->validate([
'paid_amounts' => 'required|numeric'
]);

if ($request->input('paid_amounts_hidden')==1) {
GymTransactions::where('gym_client_id', $request->input('id'))->update([
'amount' => 0,
'payment_enteredby' => $this->userDetails->username(),
'payment_datetime' => now(),
'status' => 1
]);
GymPayments::create([
'customer_id' => $request->input('id'),
'amount' => $request->input('paid_amounts'),
'paid_to' => $this->userDetails->username()
]);
}else{
GymTransactions::where('id', $request->input('id'))->update([
'amount' => 0,
'payment_enteredby' => $this->userDetails->username(),
'payment_datetime' => now(),
'status' => 1
]);
GymPayments::create([
'customer_name' => $request->input('idmastername'),
'amount' => $request->input('paid_amounts'),
'paid_to' => $this->userDetails->username()
]);
}
$notification = array('success'=>"Gym Payment Saved");
return back()->with($notification);
}





public function save_gym_customers(Request $request){
$request->validate([
'discounts' => 'required|numeric',
'gym_trainer' => 'required',
'emergency_contact' => 'required',
'start_date' => 'required',
'address' => 'required',
'gender' => 'required',
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

$notification = array('success'=>"Gym Customer Registered");
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
DB::table('gym_transactions')->insert([
'gym_client_group' => 1,
'gym_client' => $request->input('membership_registered_phone_hidden'),
'gym_client_id' => $request->input('membership_registered_id_hidden'),
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
$notification = array('success'=>"Transaction Saved");
return back()->with($notification);
}

public function gym_waiver($id){
DB::table('gym_transactions')->where('id', $id)->update([
'status' => 1,
]);
return response()->json([
'success' => true,
'data' => 'Transaction Waived'
]);
}

public function gym_destroy($id){
DB::table('gym_transactions')->where('id', $id)->delete();
return response()->json([
'success' => true,
'data' => 'Gym Data Entry Deleted'
]);
}

}
