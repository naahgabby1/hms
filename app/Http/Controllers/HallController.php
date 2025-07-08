<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomClass\Userroles;
use App\CustomClass\Userdetails;
use App\Models\Hall;
use App\Models\HallCustomers;
use App\Models\HallTransactions;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class HallController extends Controller
{
protected $userDetails;
protected $userRoles;
public function __construct(Userdetails $userDetails, Userroles $userRoles)
{
$this->userDetails = $userDetails;
$this->userRoles = $userRoles;
}




public function index(){
$title = 'Hall Activities';
$breadCrumbs = 'Hall Activities';
$delete_permission = 0;
$user = new Userdetails;
$Catering = DB::table('catering_option')->where('status', 0)->get();
$Events = DB::table('event_type')->where('status', 0)->get();
$HallCustomers = HallCustomers::orderByRaw("CASE WHEN name = 'Organization Not Listed' THEN 0 ELSE 1 END")
                      ->orderBy('name')
                      ->get();
if ($this->userRoles->isEither([1])) {
$HallTransactions = HallTransactions::whereYear('date_time', Carbon::now()->year)->get();
$Booked = DB::table('vw_hallbooking')->where('status', 0)->get();
$delete_permission = 1;
}elseif($this->userRoles->isEither([2])){
$HallTransactions = HallTransactions::whereYear('date_time', Carbon::now()->year)->get();
$Booked = DB::table('vw_hallbooking')->where('status', 0)->get();
}else{
$HallTransactions = HallTransactions::whereYear('date_time', Carbon::now()->year)->where('entered_by', $this->userDetails->username())->get();
$Booked = DB::table('vw_hallbooking')->where('status', 0)->where('entered_by', $this->userDetails->username())->get();
}




return view('pages.hall.index',
compact('title','breadCrumbs','HallCustomers',
'HallTransactions','Catering','Events',
'delete_permission','Booked'));
}


public function save_hall_bookings(Request $request){
$request->validate([
'client_name' => 'required',
'organization' => 'required',
'phone_number' => 'required|numeric',
'event_type' => 'required',
'participants' => 'required|numeric',
'edate' => 'required|date',
'catering_type' => 'required',
'startdate' => 'required|date',
'enddate' => 'required|date',
]);

if ($request->input('organization')==1) {
$request->validate([
'organization_name' => 'required'
]);
$org_namefind = DB::table('hall_customers')->insertGetId([
'name' => $request->input('organization_name')
]);
$org_name = $request->input('organization_name');
}else{
$org_namefind = $request->input('organization');
$org_name = HallCustomers::findOrFail($request->input('organization'))->name;
}

HallTransactions::create([
'client' => $request->input('client_name'),
'organization_id' => $org_namefind,
'organization_name' => $org_name,
'phone_number' => $request->input('phone_number'),
'event_type' => $request->input('event_type'),
'participants' => $request->input('participants'),
'date_of_event' => $request->input('edate'),
'start_date' => $request->input('startdate'),
'end_date' => $request->input('enddate'),
'catering_option' => $request->input('catering_type'),
'entered_by' => $this->userDetails->username()
]);


$notification = array(
'message'=>"Hall Booking Entry Successful",
'type' => 'success',
'notification' => 'SUCCESS',
);
return back()->with($notification);
}




public function update_customers_booking(Request $request, $id){
HallTransactions::findOrFail($id)->update([
'client'=>$request->input('client_name_edits'),
'organization_id'=>$request->input('organization_edits'),
'organization_name'=>$request->input('organization_name_edits'),
'phone_number'=>$request->input('phone_number_edits'),
'event_type'=>$request->input('event_type_edits'),
'participants'=>$request->input('participants_edits'),
'date_of_event'=>$request->input('edate_edits'),
'start_date'=>$request->input('startdate_edits'),
'end_date'=>$request->input('enddate_edits'),
'catering_option'=>$request->input('catering_type_edits')
]);
$notification = array(
'message'=>"Hall Booking Entry Updated",
'type' => 'success',
'notification' => 'SUCCESS',
);
return back()->with($notification);
}





public function hall_payments(Request $request, $id){
HallTransactions::findOrFail($id)->update([
'payment_amount' => $request->input('paid_amounts'),
'status' => 1,
'payment_date' => now(),
'payment_receivedby' => $this->userDetails->username()
]);

$notification = array(
'message'=>"Hall Booking Payments Made Successfully",
'type' => 'success',
'notification' => 'SUCCESS',
);
return back()->with($notification);
}


public function hbook_destroy($id){
HallTransactions::findOrFail($id)->delete();
return response()->json(['message' => 'Hall Booking Data Deleted Successfully.']);
}

}
