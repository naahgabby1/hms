<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
public function bookings(){
$title = 'Booking';
$breadcrumb = 'Booking';
return view('pages.reservations', compact('title','breadcrumb'));
}

public function cancelledbooking(){
$title = 'Booking';
$breadcrumb = 'Active Booking';
return view('pages.active_reservations', compact('title','breadcrumb'));
}

public function reservations(){
$title = 'Reservations';
$breadcrumb = 'Reservations';
return view('pages.cancelled_reservations', compact('title','breadcrumb'));
}

public function activereservation(){
$title = 'Reservations';
$breadcrumb = 'Active Reservations';
return view('pages.cancelled_reservations', compact('title','breadcrumb'));
}

public function cancelledreservation(){
$title = 'Reservations';
$breadcrumb = 'Cancelled Reservations';
return view('pages.cancelled_reservations', compact('title','breadcrumb'));
}

public function save_booking(Request $request){
$title = 'Customers';
return view('pages.reservations', compact('title'));
}

public function save_reservation(Request $request){
$title = 'Customers';
return view('pages.reservations', compact('title'));
}

public function update_booking(){
$title = 'Customers';
return view('pages.reservations', compact('title'));
}

public function update_reservation(){
$title = 'Customers';
return view('pages.reservations', compact('title'));
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
