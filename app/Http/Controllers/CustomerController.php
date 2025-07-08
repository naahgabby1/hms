<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Countries;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\CustomClass\Userdetails;
use App\CustomClass\Userroles;



class CustomerController extends Controller
{
protected $userDetails;
protected $userRoles;
public function __construct(Userdetails $userDetails, Userroles $userRoles)
{
$this->userDetails = $userDetails;
$this->userRoles = $userRoles;
}
public function index(){
$delete_permission = 0;
$title = 'Customers';
$breadCrumbs = 'Hotel Customers';
$Customers_data = Customer::all();

$Countries = Countries::orderByRaw("CASE WHEN name = 'Ghana' THEN 0 ELSE 1 END")
                      ->orderBy('name')
                      ->get();
$sixMonthsAgo = Carbon::now()->subMonths(6);
$olderThanSixMonths = Customer::where('date_time', '<', $sixMonthsAgo)->count();
$withinSixMonths = Customer::where('date_time', '>=', $sixMonthsAgo)->count();
if ($this->userRoles->isEither([1,2])) {
$delete_permission = 1;
}

return view('pages.customers.index',
compact(
'title','breadCrumbs','Customers_data',
'olderThanSixMonths','withinSixMonths',
'Countries','delete_permission'
));
}

public function save_customers(Request $request){
$title = 'Customers';
$breadCrumbs = 'Hotel Customers';
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
$title = 'Customers';
$breadCrumbs = 'Hotel Customers';
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
$title = 'Customers';
$breadCrumbs = 'Hotel Customers';
Customer::findOrFail($id)->delete();
$notification = array(
'message'=>"Customer Successfully Deleted..!!!",
'alert-type'=>'success',
);
return back()->with($notification,compact('title','breadCrumbs'));
}


}
