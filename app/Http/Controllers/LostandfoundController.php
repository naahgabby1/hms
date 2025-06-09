<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staffpayment;
use App\Models\Lostandfound;
use App\Models\Room;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LostandfoundController extends Controller
{

public function index(){
$title = 'Lost and Found';
$breadCrumbs = 'Lost & Found';
$LostData = Lostandfound::all();
$RoomData = Room::all();
return view('pages.lostandfound.index',
compact('title','breadCrumbs','LostData','RoomData'));
}


public function lost_and_found_save(Request $request){
$title = 'Lost and Found';
$breadCrumbs = 'Lost & Found';

$validated = $request->validate([
'customer_type' => 'required'
]);

if ($request->customer_type==2) {
$xroomdata = $request->founded_name_room;
$room_room = $request->room_room;
$area = 'Room Found';
$validated = $request->validate([
'founded_name_room' => 'required',
'room_room' => 'required',
'last_occupant' => 'required',
'item_description' => 'required',
'date_found' => 'required',
'item_qty' => 'required',
'any_comments' => 'required'
]);
} else {
$xroomdata = $request->founded_name_compound;
$room_room = $request->item_location;
$area = 'Compound Found';
$validated = $request->validate([
'founded_name_compound' => 'required',
'item_location' => 'required',
'item_description' => 'required',
'date_found' => 'required',
'item_qty' => 'required',
'any_comments' => 'required'
]);
}

try {
Lostandfound::create([
'lostarea' => $area,
'area_room_found' => $xroomdata,
'itemqty' => $request->input('item_qty'),
'item_description' => $request->input('item_description'),
'found_by' => $room_room,
'summary' => $request->input('item_description'),
'comments' => $request->input('any_comments'),
'status' => 0
]);

$notification = array(
'message'=>"Reservation Successfully Updated..!!!",
'alert-type'=>'success',
);
return back()->with($notification,compact('title','breadCrumbs'));
} catch (\Exception $e) {
$notification = array(
'message'=>"Failed to capture:" . $e->getMessage(),
'color'=>'success',
);
return back()->with($notification,compact('title','breadCrumbs'));
}
}


public function lost_and_found_update(Request $request, $id){
$title = 'Lost and Found';
$breadCrumbs = 'Lost & Found';
Lostandfound::findOrFail($id)->update([
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



public function lost_and_found_destroy($id){
$title = 'Lost and Found';
$breadCrumbs = 'Lost & Found';
Lostandfound::findOrFail($id)->delete();
$notification = array(
'message'=>"Customer Successfully Deleted..!!!",
'alert-type'=>'success',
);
return back()->with($notification,compact('title','breadCrumbs'));
}




}
