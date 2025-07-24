<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Countries;
use App\Models\Room;
use App\Models\Roomtype;
use App\Models\Payment;
use App\Models\Customer;
use App\Models\Viewbooking;
use App\Models\Bookmultiple;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\CustomClass\Userroles;
use App\CustomClass\Userdetails;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
protected $user;
protected $user_role;


public function __construct()
{
$user = Auth::guard('logindetails')->user();
if ($user) {
$this->user = $user->email;
$this->user_role = $user->user_role;
} else {
$this->user = null;
$this->user_role = null;
}
}

public function genCode()
{
do { $code = '#00-' . mt_rand(100000, 999999); }
while (Payment::where('code', $code)->exists());
return $code;
}

//
public function booking_delete($id){
$title = 'Booking';
$breadCrumbs = 'Delete Booking';
Book::findOrFail($id)->delete();
return redirect()->back()->with('success', 'Item deleted successfully.');
}

public function bookings(){
$title = 'Booking';
$breadCrumbs = 'Booking';
$Rolex = new Userroles;
$delete_permission = 0;
if ($Rolex->isEither([1,2])) {
$delete_permission = 1;
}
$Countries = Countries::orderByRaw("CASE WHEN name = 'Ghana' THEN 0 ELSE 1 END")->orderBy('name')->get();
$RoomType = Roomtype::orderBy('id', 'asc')->get();
$Room = Room::orderBy('description')->get();
$customers = Customer::orderBy('first_name', 'asc')->where('personal_or_coporate', 1)->get();
$corporates = Customer::orderBy('first_name', 'asc')->where('personal_or_coporate', 2)->get();
if ($this->user_role < 3) {
$Booked_thisyear = DB::table('payments')->where('void_status', 0)->whereYear('date_time', Carbon::now()->year)->sum('amount');
// $Booked_data = DB::table('vw_reservationbooking')->where('status', 1)->where('out_status', 0)->get();
$Booked_data = Viewbooking::with('multiple_customers_fromview')->where('status', 1)->where('out_status', 0)->get();
$Booked_thisday = DB::table('payments')->where('void_status', 0)->whereDate('date_time', Carbon::today())->sum('amount');
$Booked_data_today = DB::table('vw_reservationbooking')->whereDate('date_entered', Carbon::today())->where('status', 1)->where('out_status', 0)->get();
} else {
$Booked_thisyear = DB::table('payments')->where('void_status', 0)
->whereYear('date_time', Carbon::now()->year)
->where('entered_by', $this->user)
->sum('amount');
$Booked_data = DB::table('vw_reservationbooking')
->where('status', 1)
->where('entered_by', $this->user)
->where('out_status', 0)->get();

$Booked_thisday = DB::table('payments')
->where('void_status', 0)
->where('entered_by', $this->user)
->whereDate('date_time', Carbon::today())
->sum('amount');

$Booked_data_today = DB::table('vw_reservationbooking')
->whereDate('date_entered', Carbon::today())
->where('status', 1)
->where('entered_by', $this->user)
->where('out_status', 0)->get();
}

return view('pages.bookings.index', compact(
'title','breadCrumbs',
'Countries','RoomType',
'Room','Booked_data',
'Booked_data_today','Booked_thisyear',
'Booked_thisday','customers',
'corporates','delete_permission'
));
}


public function display_receipt(Request $request){
$title = 'Receipt';
$breadCrumbs = 'Print Receipt';
$vat_discounted = DB::table('vat_discount')->first();
$printing_data = Viewbooking::with('multiple_customers_fromview')
->where('id', $request->mid)->first();
// $printing_data = DB::table('vw_reservationbooking')->where('id', $request->mid)->first();
$printing_paid_data = DB::table('payments')->where('resbooking_id', $request->mid)->first();
$hotel_details = DB::table('company_details')->first();
return view('pages.bookings.receipt',
compact('title','breadCrumbs',
'printing_data','printing_paid_data',
'hotel_details','vat_discounted'));
}



public function confirmation_alert(){
$title = 'Confirmation';
$breadCrumbs = 'Confirmed Check-out';
return view('pages.bookings.checked_out_confirmed',
compact('title','breadCrumbs'));
}

public function cancelledbooking(){
$title = 'Booking';
$breadCrumbs = 'Cancelled Booking';
return view('pages.bookings.cancelled',
compact('title','breadCrumbs'));
}

public function reservations(){
$title = 'Reservations';
$breadCrumbs = 'Reservations';
$Countries = Countries::orderByRaw("CASE WHEN name = 'Ghana' THEN 0 ELSE 1 END")
                      ->orderBy('name')
                      ->get();
$corporates = Customer::orderBy('first_name', 'asc')->where('personal_or_coporate', 2)->get();
$customers = Customer::orderBy('first_name', 'asc')->get();
$RoomType = Roomtype::orderBy('description')->get();
$Room = Room::orderBy('description')->get();
// $Reserved_data = DB::table('vw_reservationbooking')->where('status', 0)->where('cancelled', 0)->get();
$Reserved_data = Viewbooking::with('rooms')->where('status', 0)->where('cancelled', 0)->get();
$Booked_data_today = DB::table('vw_reservationbooking')->whereDate('date_from', Carbon::today())->where('status', 1)->get();
$Booked_data_pending = DB::table('vw_reservationbooking')->where('status', 1)->where('cancelled', 0)->get();
return view('pages.reservations.index',
compact('title','breadCrumbs','Countries',
'RoomType','Room','Reserved_data',
'Booked_data_today','customers',
'Booked_data_pending','corporates'));
}




public function save_extracustomer(Request $request){
$customersJson = $request->input('multiple_customers');
$customers = json_decode($customersJson, true);
if (!is_array($customers)) {
return back()->with('error', 'Invalid customer data. Please try again.');
}
foreach ($customers as $cust) {
Bookmultiple::create([
'occupancy'   => $request['occupancy'],
'booking_id'   => $request['booking_id'],
'first_name'   => $cust['first_name'],
'last_names'   => $cust['last_name'],
'gender'       => $cust['gender'],
'phone_number' => $cust['phone'],
'room_type'    => $cust['room_type'],
'room'         => $cust['room_id'],
]);
Room::where('id', $cust['room_id'])->update(['availability' => 1]);
}
return redirect()->back()->with('success', 'Customers and bookings saved successfully.');
}







public function check_out($id){
$Loggedinuser = new Userdetails;
$Roles = new Userroles;
$title = 'Check-outs';
$breadCrumbs = 'Payments & Check-outs';
$CodeChex = $this->genCode();
$chex = 1;
if ($Roles->isEither([1,2])) {
$checkoutdata = Viewbooking::with('multiple_customers_fromview')
->where('id', $id)->first();
} else {
$checkoutdata = Viewbooking::with('multiple_customers_fromview')
->where('id', $id)
->where('entered_by',$Loggedinuser->username())
->first();
}

$vat_discounted = DB::table('vat_discount')->first();
return view('pages.bookings.checkout_and_payments',
compact('title','breadCrumbs',
'checkoutdata','CodeChex','chex','vat_discounted'));
}




public function save_partpayments($id){
$Loggedinuser = new Userdetails;
$Roles = new Userroles;
$title = 'Check-outs';
$breadCrumbs = 'Payments & Check-outs';
$CodeChex = $this->genCode();
$chex = 1;
if ($Roles->isEither([1,2])) {
$checkoutdata = Viewbooking::with('multiple_customers_fromview')
->where('id', $id)->first();
} else {
$checkoutdata = Viewbooking::with('multiple_customers_fromview')
->where('id', $id)
->where('entered_by',$Loggedinuser->username())
->first();
}

$vat_discounted = DB::table('vat_discount')->first();
return view('pages.bookings.checkout_and_payments',
compact('title','breadCrumbs',
'checkoutdata','CodeChex','chex','vat_discounted'));
}






public function activereservation(){
$title = 'Reservations';
$breadCrumbs = 'Active Reservations';
return view('pages.reservations.cancelled', compact('title','breadCrumbs'));
}

public function cancelledreservation(){
$title = 'Reservations';
$breadCrumbs = 'Cancelled Reservations';
$cancelled_data_thisweek = DB::table('vw_reservationbooking')->whereBetween('date_entered', [
Carbon::now()->startOfWeek(),
Carbon::now()->endOfWeek()
])->where('status', 2)->get();

$cancelled_data_thismonth = DB::table('vw_reservationbooking')
->whereMonth('date_entered', Carbon::now()->month)
->whereYear('date_entered', Carbon::now()->year)->where('status', 2)
->count();


$cancelled_data_thisyear = DB::table('vw_reservationbooking')
->whereYear('date_entered', Carbon::now()->year)->where('status', 2)
->count();

return view('pages.reservations.cancelled', compact('title','breadCrumbs','cancelled_data_thisweek','cancelled_data_thismonth','cancelled_data_thisyear'));
}


public function confirm_reservation(Request $request, $id){
$title = 'Reservation';
$breadCrumbs = 'Reservation Update';
$validated = $request->validate([
'first_name_confirmation' => 'required|string|max:255',
'last_name_confirmation' => 'required|string|max:255',
'mobile_phone_confirmation' => 'required|max:25',
'gender_confirmation' => 'required|max:25',
'date_from_confirmation' => 'required',
'date_to_confirmation' => 'required',
'country_confirmation' => 'required',
'city_confirmation' => 'required',
'room_type_confirmation' => 'required',
'room_confirmation' => 'required',
'address_confirmation' => 'required',
], [
'first_name_confirmation.required' => 'Please enter first name.',
'last_name_confirmation.required' => 'Please enter last name',
'mobile_phone_confirmation.required' => 'Please enter phone number',
'gender_confirmation.required' => 'Please select gender',
'date_from_confirmation.required' => 'Select date from',
'date_to_confirmation.required' => 'Select date to',
'country_confirmation.required' => 'Select country',
'city_confirmation.required' => 'Enter city',
'room_type_confirmation.required' => 'Select room type',
'room_confirmation.required' => 'Select room',
'address_confirmation.required' => 'Enter address',
]);
if (Room::where('id', $request->input('room_confirmation'))->where('availability', 0)->exists()) {
Book::where('id', $id)->update([
'first_name' => $request->input('first_name_confirmation'),
'last_name' => $request->input('last_name_confirmation'),
'mobile_number' => $request->input('mobile_phone_confirmation'),
'gender' => $request->input('gender_confirmation'),
'date_from' => $request->input('date_from_confirmation'),
'date_to' => $request->input('date_to_confirmation'),
'country' => $request->input('country_confirmation'),
'city' => $request->input('city_confirmation'),
'room_type_id' => $request->input('room_type_confirmation'),
'room_id' => $request->input('room_confirmation'),
'address' => $request->input('address_confirmation'),
'status' => 1,
]);
Room::findOrFail($request->input('room_confirmation'))->update([
"availability"=>1
]);
$status = 'success';
} else {
$status = 'error';
}
$notification = array(
'message'=>"Reservation Successfully Confirmed..!!!",
'alert-type'=>$status
);
return back()->with($notification,compact('title','breadCrumbs'));
}


public function corporate_reservation_editted(Request $request, $rid){
$title = 'Reservation';
$breadCrumbs = 'Reservation Update';
$validated = $request->validate([
'corporate_main_name_edit' => 'required|string|max:255',
'corporate_mobile_phone_edit' => 'required|max:25',
'corporate_date_from_edit' => 'required',
'corporate_date_to_edit' => 'required',
'corporate_country_edit' => 'required',
'corporate_city_edit' => 'required'
], [
'corporate_main_name_edit.required' => 'Please enter first name.',
'corporate_mobile_phone_edit.required' => 'Please enter phone number',
'corporate_date_from_edit.required' => 'Select date from',
'corporate_date_to_edit.required' => 'Select date to',
'corporate_country_edit.required' => 'Select country',
'corporate_city_edit.required' => 'Enter city'
]);

$mdate_from = Carbon::parse($request->input('corporate_date_from_edit'));
$mdate_to = Carbon::parse($request->input('corporate_date_to_edit'));

if (
$mdate_to->greaterThan($mdate_from)
) {
Book::where('id', $rid)->update([
'first_name' => $request->input('corporate_main_name_edit'),
'mobile_number' => $request->input('corporate_mobile_phone_edit'),
'date_to' => $request->input('corporate_date_to_edit'),
'country' => $request->input('corporate_country_edit'),
'city' => $request->input('corporate_city_edit'),
'res_payment' => $request->input('corporate_part_payments')
]);

$notification = array(
'message'=>"Reservation Successfully Updated..!!!",
'alert-type'=>'success',
);
}else{
$notification = array(
'message'=>"Failed To Update..!!!",
'alert-type'=>'success',
);
}
return back()->with($notification,compact('title','breadCrumbs'));
}











public function personal_reservation_editted(Request $request, $rid){
$title = 'Reservation';
$breadCrumbs = 'Reservation Update';
$validated = $request->validate([
'first_name_edits' => 'required|string|max:255',
'last_name_edits' => 'required|string|max:255',
'mobile_phone_edits' => 'required|max:25',
'gender_edits' => 'required|max:25',
'date_to_edits' => 'required',
'country_edits' => 'required',
'city_edits' => 'required'
], [
'first_name_edits.required' => 'Please enter first name.',
'last_name_edits.required' => 'Please enter last name',
'mobile_phone_edits.required' => 'Please enter phone number',
'gender_edits.required' => 'Please select gender',
'date_to_edits.required' => 'Select date to',
'country_edits.required' => 'Select country',
'city_edits.required' => 'Enter city'
]);

$mdate_from = Carbon::parse($request->input('date_from_edits'));
$mdate_to = Carbon::parse($request->input('date_to_edits'));

if (
$mdate_to->greaterThan($mdate_from)
) {
Book::where('id', $rid)->update([
'first_name' => $request->input('first_name_edits'),
'last_name' => $request->input('last_name_edits'),
'mobile_number' => $request->input('mobile_phone_edits'),
'gender' => $request->input('gender_edits'),
'date_from' => $request->input('date_from_edits'),
'date_to' => $request->input('date_to_edits'),
'country' => $request->input('country_edits'),
'city' => $request->input('city_edits'),
'room_type_id' => $request->input('room_type_edits'),
'room_id' => $request->input('room_edits'),
'address' => $request->input('address_edits'),
]);

$notification = array(
'message'=>"Reservation Successfully Updated..!!!",
'alert-type'=>'success',
);
}else{
$notification = array(
'message'=>"Failed To Update..!!!",
'alert-type'=>'error',
);
}
return back()->with($notification,compact('title','breadCrumbs'));
}

public function booking_editted(Request $request, $id){
$title = 'Booking';
$breadCrumbs = 'Booking Update';
$validated = $request->validate([
'first_name_edit' => 'required|string|max:255',
'mobile_phone_edit' => 'required|max:25',
'gender_edit' => 'required|max:25',
'date_from_edit' => 'required',
'date_to_edit' => 'required',
'country_edit' => 'required',
'room_type_edit' => 'required',
'room_edit' => 'required'
], [
'first_name_edit.required' => 'Please enter first name.',
'mobile_phone_edit.required' => 'Please enter phone number',
'gender_edit.required' => 'Please select gender',
'date_from_edit.required' => 'Select date from',
'date_to_edit.required' => 'Select date to',
'country_edit.required' => 'Select country',
'room_type_edit.required' => 'Select room type',
'room_edit.required' => 'Select room',
]);

$mdate_from = Carbon::parse($request->input('date_from_edit'));
$mdate_to = Carbon::parse($request->input('date_to_edit'));

if (
$mdate_to->greaterThan($mdate_from)
) {
Book::where('id', $id)->update([
'first_name' => $request->input('first_name_edit'),
'last_name' => $request->input('last_name_edit'),
'mobile_number' => $request->input('mobile_phone_edit'),
'gender' => $request->input('gender_edit')==1 ? null : $request->input('gender_edit'),
'date_from' => $request->input('date_from_edit'),
'date_to' => $request->input('date_to_edit'),
'country' => $request->input('country_edit'),
'city' => $request->input('city_edit'),
'room_type_id' => $request->input('room_type_edit'),
'room_id' => $request->input('room_edit'),
'address' => $request->input('address_edit'),
]);

$notification = array(
'message'=>"Booking Successfully Updated..!!!",
'alert-type'=>'success',
);
}else{
$notification = array(
'message'=>"Failed To Update Booking..!!!",
'alert-type'=>'success',
);
}
return back()->with($notification,compact('title','breadCrumbs'));
}



public function save_checkout(Request $request){
$title = 'Printout';
$breadCrumbs = 'Printout';
$Loggedinuser = new Userdetails;
$confirmation = new Payment();
$confirmation->resbooking_id = $request->input('transaction_code');
$confirmation->days = $request->input('mdays');
$confirmation->payment_category = $request->input('payment_cat');
$confirmation->description = $request->input('description');
$confirmation->amount = $request->input('amount');
$confirmation->entered_by = $Loggedinuser->username();
$confirmation->vat = $request->input('vat');
$confirmation->discount = $request->input('discount');
$confirmation->code = $request->input('code');
$confirmation->save();
$mid = $request->input('transaction_code');

$roomtocancel = DB::table('vw_booking_multiple')
    ->where('booking_id', $mid)
    ->pluck('room_id');
// dd($roomtocancel);
foreach ($roomtocancel as $croom) {
Room::where('id', $croom)->update(['availability' => 0]);
}

Book::where('id', $request->input('transaction_code'))->update(['status' => 2]);


$notification = array(
'message'=>"Successfully Checkout",
'alert-type'=>'success',
);
return view('pages.bookings.checked_out_confirmed', compact('title','breadCrumbs','mid'));
}


public function save_booking_corporate(Request $request){
$title = 'Booking';
$breadCrumbs = 'Booking';
$validated = $request->validate(
['corporate_group_type' => 'required'],
['corporate_group_type.required' => 'Please Select Category']);
$typex = $request->corporate_group_type;
if ($typex==1) {
$validated = $request->validate([
'corporate_main_name' => 'required|string|max:255',
'corporate_mobile_phone' => 'required|max:25',
'corporate_date_from' => 'required',
'corporate_date_to' => 'required',
'corporate_room_type' => 'required',
'corporate_room' => 'required'
], [
'corporate_main_name.required' => 'Please enter name of Oganization',
'corporate_mobile_phone.required' => 'Please enter phone number',
'corporate_date_from.required' => 'Select date from',
'corporate_date_to.required' => 'Select date',
'corporate_room_type.required' => 'Select room type',
'corporate_room.required' => 'Select room'
]);
$firstname = $request->input('corporate_main_name');
$mobilephone = $request->input('corporate_mobile_phone');
} else {
$uid = $request->corporate_type_existing;
$cdata = Customer::findOrFail($uid);
$validated = $request->validate([
'corporate_date_from' => 'required',
'corporate_date_to' => 'required',
'corporate_room_type' => 'required',
'corporate_room' => 'required'
], [
'corporate_date_from.required' => 'Select date from',
'corporate_date_to.required' => 'Select date to',
'corporate_room_type.required' => 'Select room type',
'corporate_room.required' => 'Select room'
]);
$firstname = $cdata->first_name;
$mobilephone = $cdata->phone_number;
}
$mdate_from = Carbon::parse($request->input('corporate_date_from'));
$mdate_to = Carbon::parse($request->input('corporate_date_to'));
$today = Carbon::today();
if (
$mdate_from->lessThanOrEqualTo($today) &&
$mdate_to->greaterThan($mdate_from)
) {
$reservation = new Book();
$reservation->first_name = $firstname;
$reservation->category = 2;
$reservation->mobile_number = $mobilephone;
$reservation->date_from = $request->input('corporate_date_from');
$reservation->date_to = $request->input('corporate_date_to');
$reservation->country = $request->input('corporate_country');
$reservation->city = $request->input('corporate_city');
$reservation->room_type_id = $request->input('corporate_room_type');
$reservation->room_id = $request->input('corporate_room');
$reservation->address = $request->input('corporate_address');
$reservation->entered_by = Auth::guard('logindetails')->user()->email;
$reservation->status = 1;
$reservation->save();
$last_id = $reservation->id;
Room::findOrFail($request->input('corporate_room'))->update([
"availability"=>1,
"present_or_future"=>1,
"booking_code"=>$last_id
]);
$notification = array(
'message'=>"Booking Successful..!!!",
'alert-type'=>'success',
);
}else{
$notification = array(
'message'=>"Failed Check Date..!!!",
'alert-type'=>'error',
);
}
return back()->with($notification);
}



public function save_booking_customer(Request $request){
$validated = $request->validate(
['customer_type' => 'required'],
['customer_type.required' => 'Please Select Customer Type']);
$typex = $request->customer_type;

if ($typex==1) {
$validated = $request->validate([
'first_name' => 'required|string|max:255',
'last_name' => 'required|string|max:255',
'mobile_phone' => 'required|max:25',
'gender' => 'required|max:25',
'date_from' => 'required|date|before_or_equal:date_to',
'date_to' => 'required|date',
'country' => 'required',
'room_type' => 'required',
'room' => 'required'
]);

$firstname = $request->input('first_name');
$lastname = $request->input('last_name');
$mobilephone = $request->input('mobile_phone');
$ugender = $request->input('gender');



} else {
$uid = $request->customer_type_existing;
$cdata = Customer::findOrFail($uid);
$validated = $request->validate([
'date_from' => 'required|date|before_or_equal:date_to',
'date_to' => 'required|date',
'country' => 'required',
'room_type' => 'required',
'room' => 'required'
]);
$firstname = $cdata->first_name;
$lastname = $cdata->last_names;
$mobilephone = $cdata->phone_number;
$ugender = $cdata->gender;
}

$mdate_from = Carbon::parse($request->input('date_from'));
$mdate_to = Carbon::parse($request->input('date_to'));
$today = Carbon::today();

if ($mdate_from->lessThanOrEqualTo($today) && $mdate_to->greaterThan($mdate_from)) {
    // dd('Gabriel');
$reservation = new Book();
$reservation->occupancy = $request->input('occupancy');
$reservation->first_name = $firstname;
$reservation->last_name = $lastname;
$reservation->category = 1;
$reservation->mobile_number = $mobilephone;
$reservation->gender = strtolower($ugender);
$reservation->date_from = $request->input('date_from');
$reservation->date_to = $request->input('date_to');
$reservation->country = $request->input('country');
$reservation->city = $request->input('city');
$reservation->room_type_id = $request->input('room_type');
$reservation->room_id = $request->input('room');
$reservation->address = $request->input('address');
$reservation->entered_by = Auth::guard('logindetails')->user()->email;
$reservation->status = 1;
$reservation->save();
$last_id = $reservation->id;
Room::findOrFail($request->input('room'))->update([
"availability"=>1,
"present_or_future"=>1,
"booking_code"=>$last_id
]);
$notification = array(
'message'=>"Booking Successful..!!!",
'alert-type'=>'success',
);
}else{
$notification = array(
'message'=>"Failed Check Date..!!!",
'alert-type'=>'error',
);
}
return back()->with($notification);
}


public function save_reservation(Request $request){
$title = 'Reservation';
$breadCrumbs = 'Reservation';
$validated = $request->validate(['customer_type' => 'required'],['customer_type.required' => 'Please Select Customer Type']);
$typex = $request->customer_type;
$flexCheckChecked = $request->flexCheckChecked;

if ($typex==1) {
$validated = $request->validate([
'first_name' => 'required|string|max:255',
'last_name' => 'required|string|max:255',
'mobile_phone' => 'required|max:25',
'gender' => 'required|max:25',
'date_from' => 'required',
'date_to' => 'required',
'country' => 'required',
'room_type' => 'required',
'room' => 'required'
], [
'first_name.required' => 'Please enter first name.',
'last_name.required' => 'Please enter last name',
'mobile_phone.required' => 'Please enter phone number',
'gender.required' => 'Please select gender',
'date_from.required' => 'Select date from',
'date_to.required' => 'Select date to',
'country.required' => 'Select country',
'room_type.required' => 'Select room type',
'room.required' => 'Select room'
]);

$firstname = $request->input('first_name');
$lastname = $request->input('last_name');
$mobilephone = $request->input('mobile_phone');
$ugender = $request->input('gender');
}else{
$uid = $request->customer_type_existing;
$cdata = Customer::findOrFail($uid);
$validated = $request->validate([
'date_from' => 'required',
'date_to' => 'required',
'country' => 'required',
'room_type' => 'required',
'room' => 'required',
], [
'date_from.required' => 'Select date from',
'date_to.required' => 'Select date to',
'country.required' => 'Select country',
'room_type.required' => 'Select room type',
'room.required' => 'Select room'
]);
$firstname = $cdata->first_name;
$lastname = $cdata->last_names;
$mobilephone = $cdata->phone_number;
$ugender = $cdata->gender;
}

$mdate_from = Carbon::parse($request->input('date_from'));
$mdate_to = Carbon::parse($request->input('date_to'));
$today = Carbon::today();

if (
$mdate_from->greaterThanOrEqualTo($today) &&
$mdate_to->greaterThan($mdate_from) &&
$mdate_to->greaterThan($today)
) {
$reservation = new Book();
$reservation->first_name = $firstname;
$reservation->last_name = $lastname;
$reservation->category = 1;
$reservation->mobile_number = $mobilephone;
$reservation->gender = strtolower($ugender);
$reservation->date_from = $request->input('date_from');
$reservation->date_to = $request->input('date_to');
$reservation->country = $request->input('country');
$reservation->city = $request->input('city');
$reservation->room_type_id = $request->input('room_type');
$reservation->room_id = $request->input('room');
$reservation->address = $request->input('address');
$reservation->entered_by = Auth::guard('logindetails')->user()->email;
$reservation->status = 0 ;

if($flexCheckChecked != ''){
$amount = $request->payAmount;
$reservation->res_payment = $request->payAmount;
}
$reservation->save();
$notification = array(
'message'=>"Reservation Successful  !!!",
'alert-type'=>'success',
);
}else{
$notification = array(
'message'=>"Reservation Failed..!!!",
'alert-type'=>'error',
);
}
return back()->with($notification);
}




public function save_reservation_corporate(Request $request){
$title = 'Booking';
$breadCrumbs = 'Booking';
$validated = $request->validate(
['corporate_group_type' => 'required'],
['corporate_group_type.required' => 'Please Select Category']);
$typex = $request->corporate_group_type;
$flexCheckChecked = $request->flexCheckChecked;
if ($typex==1) {
$validated = $request->validate([
'corporate_main_name' => 'required|string|max:255',
'corporate_mobile_phone' => 'required|max:25',
'corporate_date_from' => 'required',
'corporate_date_to' => 'required',
'corporate_room_type' => 'required',
'corporate_room' => 'required'
], [
'corporate_main_name.required' => 'Please enter name of Oganization',
'corporate_mobile_phone.required' => 'Please enter phone number',
'corporate_date_from.required' => 'Select date from',
'corporate_date_to.required' => 'Select date',
'corporate_room_type.required' => 'Select room type',
'corporate_room.required' => 'Select room'
]);
$firstname = $request->input('corporate_main_name');
$mobilephone = $request->input('corporate_mobile_phone');
} else {
$uid = $request->corporate_type_existing;
$cdata = Customer::findOrFail($uid);
$validated = $request->validate([
'corporate_date_from' => 'required',
'corporate_date_to' => 'required',
'corporate_room_type' => 'required',
'corporate_room' => 'required'
], [
'corporate_date_from.required' => 'Select date from',
'corporate_date_to.required' => 'Select date to',
'corporate_room_type.required' => 'Select room type',
'corporate_room.required' => 'Select room'
]);
$firstname = $cdata->first_name;
$mobilephone = $cdata->phone_number;
}
$mdate_from = Carbon::parse($request->input('corporate_date_from'));
$mdate_to = Carbon::parse($request->input('corporate_date_to'));
$today = Carbon::today();
if (
$mdate_from->greaterThanOrEqualTo($today) &&
$mdate_to->greaterThan($mdate_from) &&
$mdate_to->greaterThan($today)
) {
$reservation = new Book();
$reservation->first_name = $firstname;
$reservation->category = 2;
$reservation->mobile_number = $mobilephone;
$reservation->date_from = $request->input('corporate_date_from');
$reservation->date_to = $request->input('corporate_date_to');
$reservation->country = $request->input('corporate_country');
$reservation->city = $request->input('corporate_city');
$reservation->room_type_id = $request->input('corporate_room_type');
$reservation->room_id = $request->input('corporate_room');
$reservation->address = $request->input('corporate_address');
$reservation->entered_by = Auth::guard('logindetails')->user()->email;
$reservation->status = 0;

if($flexCheckChecked != ''){
$amount = $request->payAmount;
$reservation->res_payment = $request->payAmount;
}
$reservation->save();
$notification = array(
'message'=>"Booking Successful..!!!",
'alert-type'=>'success',
);
}else{
$notification = array(
'message'=>"Failed Check Date..!!!",
'alert-type'=>'error',
);
}
return back()->with($notification);
}



public function confirm_reservation_into_booked(){
$title = 'Customers';

}



public function update_booking(){
$title = 'Customers';
// return view('pages.reservations', compact('title'));
}

public function update_reservation(){
$title = 'Customers';
// return view('pages.reservations', compact('title'));
}




public function reservation_cancelled($cid){
Book::findOrFail($cid)->update([
"cancelled"=>1,
"cancelled_by"=>Auth::guard('logindetails')->user()->email,
]);
return response()->json([
'success' => true,
'message' => 'Reservation Cancelled Successfully.',
]);
}





public function reservation_deleted($id){
Book::findOrFail($id)->delete();
return response()->json([
'success' => true,
'message' => 'Order deleted successfully.',
]);
}


public function destroy_booking(Request $request){
$customer = Book::find($request->id);
$customer->delete();
$notification = array(
'message'=>"Reservation deleted successfully!!!",
'alert-type'=>'success',
);
return back()->with($notification);
}

public function destroy_reservation(Request $request){
$customer = Book::find($request->id);
$customer->delete();
$notification = array(
'message'=>"Reservation deleted successfully!!!",
'alert-type'=>'success',
);
return back()->with($notification);
}




}
