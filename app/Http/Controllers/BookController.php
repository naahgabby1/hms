<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Countries;
use App\Models\Room;
use App\Models\Roomtype;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

class BookController extends Controller
{
public function genCode()
{
do { $code = '#00-' . mt_rand(100000, 999999); }
    while (Payment::where('code', $code)->exists());
return $code;
}




public function bookings(){
$title = 'Booking';
$breadCrumbs = 'Booking';
$Countries = Countries::orderBy('name')->get();
$RoomType = Roomtype::orderBy('description')->get();
$Room = Room::orderBy('description')->get();
$Booked_thisyear = DB::table('vw_reservationbooking')->where('status', 1)->where('out_status', 0)->whereYear('date_entered', Carbon::now()->year)->sum('fees');
$Booked_data = DB::table('vw_reservationbooking')->where('status', 1)->where('out_status', 0)->get();
$Booked_data_today = DB::table('vw_reservationbooking')->whereDate('date_entered', Carbon::today())->where('status', 1)->where('out_status', 0)->get();
return view('pages.bookings.index', compact('title','breadCrumbs','Countries','RoomType','Room','Booked_data','Booked_data_today','Booked_thisyear'));
}


public function display_receipt(Request $request){
    $title = 'Receipt';
    $breadCrumbs = 'Print Receipt';
    $printing_data = DB::table('vw_reservationbooking')->where('id', $request->mid)->first();
    $printing_paid_data = DB::table('payments')->where('resbooking_id', $request->mid)->first();
    $hotel_details = DB::table('company_details')->first();
    return view('pages.bookings.receipt', compact('title','breadCrumbs','printing_data','printing_paid_data','hotel_details'));
    }



public function confirmation_alert(){
    $title = 'Confirmation';
    $breadCrumbs = 'Confirmed Check-out';
    return view('pages.bookings.checked_out_confirmed', compact('title','breadCrumbs'));
    }

public function cancelledbooking(){
$title = 'Booking';
$breadCrumbs = 'Cancelled Booking';
return view('pages.bookings.cancelled', compact('title','breadCrumbs'));
}

public function reservations(){
$title = 'Reservations';
$breadCrumbs = 'Reservations';
$Countries = Countries::orderBy('name')->get();
$RoomType = Roomtype::orderBy('description')->get();
$Room = Room::orderBy('description')->get();
$Reserved_data = DB::table('vw_reservationbooking')->where('status', 0)->get();
$Booked_data = DB::table('vw_reservationbooking')->whereDate('date_entered', Carbon::today())->where('status', 1)->get();
return view('pages.reservations.index', compact('title','breadCrumbs','Countries','RoomType','Room','Reserved_data','Booked_data'));
}


public function check_out($id){
    $title = 'Check-outs';
    $breadCrumbs = 'Payments & Check-outs';
    $CodeChex = $this->genCode();
    $chex = 1;
    $checkoutdata = DB::table('vw_reservationbooking')->where('id', $id)->first();
    return view('pages.bookings.checkout_and_payments', compact('title','breadCrumbs','checkoutdata','CodeChex','chex'));
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




public function save_checkout(Request $request){
    $title = 'Printout';
    $breadCrumbs = 'Printout';
    $confirmation = new Payment();
    $confirmation->resbooking_id = $request->input('transaction_code');
    $confirmation->payment_category = $request->input('payment_cat');
    $confirmation->description = $request->input('description');
    $confirmation->amount = $request->input('amount');
    $confirmation->entered_by = session('user_name');
    $confirmation->code = $request->input('code');
    $confirmation->save();
    $mid = $request->input('transaction_code');

    Book::where('id', $request->input('transaction_code'))->update(['status' => 2]);

    $notification = array(
        'message'=>"Successfully Checkout",
        'alert-type'=>'success',
    );
    return view('pages.bookings.checked_out_confirmed', compact('title','breadCrumbs','mid'));
}






public function save_booking(Request $request){
    $title = 'Booking';
    $breadCrumbs = 'Booking';
    $validated = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'mobile_phone' => 'required|max:25',
        'gender' => 'required|max:25',
        'date_from' => 'required',
        'date_to' => 'required',
        'country' => 'required',
        'city' => 'required',
        'room_type' => 'required',
        'room' => 'required',
        'address' => 'required',
    ], [
        'first_name.required' => 'Please enter first name.',
        'last_name.required' => 'Please enter last name',
        'mobile_phone.required' => 'Please enter phone number',
        'gender.required' => 'Please select gender',
        'date_from.required' => 'Select date from',
        'date_to.required' => 'Select date to',
        'country.required' => 'Select country',
        'city.required' => 'Enter city',
        'room_type.required' => 'Select room type',
        'room.required' => 'Select room',
        'address.required' => 'Enter address',
    ]);
    $reservation = new Book();
    $reservation->first_name = $request->input('first_name');
    $reservation->last_name = $request->input('last_name');
    $reservation->mobile_number = $request->input('mobile_phone');
    $reservation->gender = $request->input('gender');
    $reservation->date_from = $request->input('date_from');
    $reservation->date_to = $request->input('date_to');
    $reservation->country = $request->input('country');
    $reservation->city = $request->input('city');
    $reservation->room_type_id = $request->input('room_type');
    $reservation->room_id = $request->input('room');
    $reservation->address = $request->input('address');
    $reservation->entered_by = session('user_name');
    $reservation->status = 1;
    $reservation->save();

    $notification = array(
        'message'=>"Booking Successfully Saved..!!!",
        'alert-type'=>'success',
    );
    return back()->with($notification);

}

public function save_reservation(Request $request){
$title = 'Reservation';
$breadCrumbs = 'Reservation';

$validated = $request->validate([
    'first_name' => 'required|string|max:255',
    'last_name' => 'required|string|max:255',
    'mobile_phone' => 'required|max:25',
    'gender' => 'required|max:25',
    'date_from' => 'required',
    'date_to' => 'required',
    'country' => 'required',
    'city' => 'required',
    'room_type' => 'required',
    'room' => 'required',
    'address' => 'required',
], [
    'first_name.required' => 'Please enter first name.',
    'last_name.required' => 'Please enter last name',
    'mobile_phone.required' => 'Please enter phone number',
    'gender.required' => 'Please select gender',
    'date_from.required' => 'Select date from',
    'date_to.required' => 'Select date to',
    'country.required' => 'Select country',
    'city.required' => 'Enter city',
    'room_type.required' => 'Select room type',
    'room.required' => 'Select room',
    'address.required' => 'Enter address',
]);
$reservation = new Book();
$reservation->first_name = $request->input('first_name');
$reservation->last_name = $request->input('last_name');
$reservation->mobile_number = $request->input('mobile_phone');
$reservation->gender = $request->input('gender');
$reservation->date_from = $request->input('date_from');
$reservation->date_to = $request->input('date_to');
$reservation->country = $request->input('country');
$reservation->city = $request->input('city');
$reservation->room_type_id = $request->input('room_type');
$reservation->room_id = $request->input('room');
$reservation->address = $request->input('address');
$reservation->entered_by = session('user_name');
$reservation->save();

$notification = array(
    'message'=>"Reservation Successfully Saved..!!!",
    'alert-type'=>'success',
);
return back()->with($notification);
}

public function update_booking(){
$title = 'Customers';
// return view('pages.reservations', compact('title'));
}

public function update_reservation(){
$title = 'Customers';
// return view('pages.reservations', compact('title'));
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
