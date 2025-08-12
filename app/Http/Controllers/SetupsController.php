<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\CustomClass\Userroles;
use App\CustomClass\Userdetails;
use App\Models\Roomtype;
use App\Models\Room;
use App\Models\Taxdiscounts;


class SetupsController extends Controller
{

public function index_room_types(){
$title = 'Room Types';
$breadCrumbs = 'Create Room Types';
$user = new Userdetails;
return view('pages.rooms.room_types',
compact('title','breadCrumbs'));
}

public function index_rooms(){
$title = 'Setups';
$breadCrumbs = 'Rooms Setups';
$user = new Userdetails;
$Tax_discounts = Taxdiscounts::first();
$Business_name = DB::table('company_details')->first();
$RoomType = Roomtype::orderBy('id', 'asc')->get();
$Selected_room = Room::with('rooms_type_name')->get();
return view('pages.rooms.rooms',
compact('title','breadCrumbs','Tax_discounts','Business_name','RoomType','Selected_room'));
}

public function index_tax_discounts(){
$title = 'Setups';
$breadCrumbs = 'Tax & Discounts';
$user = new Userdetails;
$Tax_discounts = Taxdiscounts::first();
$Business_name = DB::table('company_details')->first();

return view('pages.taxdiscounts.tax_discounts',
compact('title','breadCrumbs','Tax_discounts','Business_name'));
}




public function update_room(Request $request, $id){
$title = 'Setups';
$breadCrumbs = 'Update Rooms';
$request->validate([
'room_type_edit' => 'required',
'room_name_edit' => 'required',
'room_rate_edit' => 'required|numeric',
'room_rate_double_edit' => 'required|numeric'
]);
$record = Room::findOrFail($id);
$record->update([
'description' => $request->input('room_name_edit'),
'type_id' => $request->input('room_type_edit'),
'fee' => $request->input('room_rate_edit'),
'fee_double' => $request->input('room_rate_double_edit')
]);
$notification = array('success'=>"Room Entry Updated");
return back()->with($notification);
}


public function save_room(Request $request){
$title = 'Setups';
$breadCrumbs = 'Save Rooms';
$request->validate([
'room_type' => 'required',
'room_name' => 'required',
'room_rate' => 'required|numeric',
'room_rate_double' => 'required|numeric'
]);
Room::create([
'description' => $request->input('room_name'),
'type_id' => $request->input('room_type'),
'fee' => $request->input('room_rate'),
'fee_double' => $request->input('room_rate_double')
]);
$notification = array('success'=>"Room Entry Saved");
return back()->with($notification);
}



public function save_rates(Request $request){
$title = 'Setups';
$breadCrumbs = 'Save Rates & Discounts';
$request->validate([
'vat_rate' => 'required|numeric',
'discount' => 'required|numeric'
]);
$record = Taxdiscounts::findOrFail(1);
$record->update([
'vat_amount' => $request->input('vat_rate')/100,
'discount_amount' => $request->input('discount')/100
]);

$notification = array('success'=>"Rates Entry Save");
return back()->with($notification);
}
}
