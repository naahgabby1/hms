<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staffpayment;
use App\Models\Lostandfound;
use App\CustomClass\Userdetails;
use App\CustomClass\Userroles;
use App\Models\Room;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LostandfoundController extends Controller
{
protected $userDetails;
protected $userRoles;
public function __construct(Userdetails $userDetails, Userroles $userRoles)
{
$this->userDetails = $userDetails;
$this->userRoles = $userRoles;
}



public function index(){
$title = 'Lost and Found';
$breadCrumbs = 'Lost & Found';
$LostData = Lostandfound::all();
$RoomData = Room::all();
$delete_permission = $this->userDetails->user_role();
return view('pages.lostandfound.index',
compact('title','breadCrumbs','LostData','RoomData','delete_permission'));
}


public function lost_and_found_save(Request $request){
$title = 'Lost and Found';
$breadCrumbs = 'Lost & Found';

$validated = $request->validate([
'customer_type' => 'required'
]);

if ($request->input('customer_type')==1) {
$validated = $request->validate([
'founded_name_compound' => 'required',
'item_location' => 'required',
'item_description' => 'required',
'date_found' => 'required',
'item_qty' => 'required'
]);
}else{
$validated = $request->validate([
'founded_name_room' => 'required',
'room_room' => 'required',
'last_occupant' => 'required',
'item_description' => 'required',
'date_found' => 'required',
'item_qty' => 'required'
]);
}


if ($request->customer_type==2) {
$xroomdata = $request->founded_name_room;
$room_room = $request->room_room;
$area = 'Room Found';
} else {
$xroomdata = $request->founded_name_compound;
$room_room = $request->item_location;
$area = 'Compound Found';
}

try {
Lostandfound::create([
'lostarea' => $area,
'area_room_found' => $room_room,
'itemqty' => $request->input('item_qty'),
'item_description' => $request->input('item_description'),
'found_by' => $xroomdata,
'summary' => $request->input('item_description'),
'comments' => $request->input('any_comments'),
'status' => 0
]);
$notification = array(
'message'=>"Lost & Found Data Captured",
'type' => 'success',
'notification' => 'SUCCESS',
);
return back()->with($notification);
} catch (\Exception $e) {
$notification = array(
'message'=>"Failed To Capture Lost & Found",
'type' => 'error',
'notification' => 'ERROR',
);
return back()->with($notification);
}
}


public function lost_and_found_retrieval(Request $request, $id){
$title = 'Lost and Found';
$breadCrumbs = 'Lost & Found';
Lostandfound::findOrFail($id)->update([
'status'=>1,
'delivered_by'=>$this->userDetails->username(),
'remarks_on_delivery'=>$request->input('remarks'),
'date_delivered'=>$request->input('retrieval_date')
]);
$notification = array(
'message'=>"Customer Successfully Updated..!!!",
'alert-type'=>'success',
);
return back()->with($notification,compact('title','breadCrumbs'));

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
