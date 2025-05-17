<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Countries;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function index(){
$title = 'Roles';
$breadCrumbs = 'User Roles';
$Customers_data = Customer::all();
$Countries = Countries::orderBy('name')->get();
$sixMonthsAgo = Carbon::now()->subMonths(6);
$olderThanSixMonths = Customer::where('date_time', '<', $sixMonthsAgo)->count();
$withinSixMonths = Customer::where('date_time', '>=', $sixMonthsAgo)->count();

return view('pages.customers.index', compact('title','breadCrumbs','Customers_data','olderThanSixMonths','withinSixMonths','Countries'));
}

public function save_customers(Request $request){
$title = 'Roles';
$breadCrumbs = 'User Roles';
$validated = $request->validate([
'first_name' => 'required|string|max:255',
'last_names' => 'required|string|max:255',
'phone_number' => 'required|max:25',
'gender' => 'required'
], [
'first_name.required' => 'Please enter first name.',
'last_names.required' => 'Please enter last name',
'phone_number.required' => 'Please enter phone number',
'gender.required' => 'Please select gender'
]);

$Customer = new Customer();
$Customer->first_name = $request->input('first_name');
$Customer->last_names = $request->input('last_names');
$Customer->phone_number = $request->input('phone_number');
$Customer->gender = $request->input('gender');
$Customer->country = $request->input('country');
$Customer->address = $request->input('address');
$Customer->save();

$notification = array(
'message'=>"Reservation Successfully Updated..!!!",
'alert-type'=>'success',
);
return back()->with($notification,compact('title','breadCrumbs'));
}



public function update_customers(Request $request, $id){
$title = 'Roles';
$breadCrumbs = 'User Roles';
Customer::findOrFail($id)->update([
'first_name'=>$request->input('first_name_edits'),
'last_names'=>$request->input('last_names_edits'),
'phone_number'=>$request->input('phone_number_edits'),
'gender'=>$request->input('gender_edits'),
'country'=>$request->input('country_edits'),
'address'=>$request->input('address_edits')
]);
$notification = array(
'message'=>"Customer Successfully Updated..!!!",
'alert-type'=>'success',
);
return back()->with($notification,compact('title','breadCrumbs'));

}



public function destroy_customers($id){
$title = 'Roles';
$breadCrumbs = 'User Roles';
Customer::findOrFail($id)->delete();
$notification = array(
'message'=>"Customer Successfully Deleted..!!!",
'alert-type'=>'success',
);
return back()->with($notification,compact('title','breadCrumbs'));
}
}
