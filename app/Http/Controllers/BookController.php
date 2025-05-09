<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Countries;
use App\Models\Room;
use App\Models\Roomtype;

class BookController extends Controller
{
public function bookings(){
$title = 'Booking';
$breadCrumbs = 'Booking';
return view('pages.bookings.index', compact('title','breadCrumbs'));
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
return view('pages.reservations.index', compact('title','breadCrumbs','Countries','RoomType','Room'));
}

public function activereservation(){
$title = 'Reservations';
$breadCrumbs = 'Active Reservations';
return view('pages.reservations.cancelled', compact('title','breadCrumbs'));
}

public function cancelledreservation(){
$title = 'Reservations';
$breadCrumbs = 'Cancelled Reservations';
return view('pages.reservations.cancelled', compact('title','breadCrumbs'));
}

public function save_booking(Request $request){
$title = 'Customers';
// return view('pages.reservations', compact('title'));
}

public function save_reservation(Request $request){
$title = 'Reservation';
$title = 'Reservation';

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
// return back()->with($notification);
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
