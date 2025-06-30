<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomClass\Userroles;
use App\CustomClass\Userdetails;
use App\Models\Gym;
use App\Models\GymTransactions;
use Illuminate\Support\Facades\DB;

class GymController extends Controller
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
$user = new Userdetails;
$GymCustomers = Hall::all();
$GymTransactions = DB::table('hall_transactions')->get();

return view('pages.gym.index',
compact('title','breadCrumbs','GymCustomers','GymTransactions'));
}


public function index_update(Request $request, $id){
$title = 'Setups';
$breadCrumbs = 'Update Rooms';
$request->validate([
'room_type_edit' => 'required',
'room_name_edit' => 'required',
'room_rate_edit' => 'required|numeric',
'room_rate_double_edit' => 'required|numeric'
]);
$record = Gym::findOrFail($id);
$record->update([
'description' => $request->input('room_name_edit'),
'type_id' => $request->input('room_type_edit'),
'fee' => $request->input('room_rate_edit'),
'fee_double' => $request->input('room_rate_double_edit')
]);

$notification = array(
'message'=>"Room Updated Successfully",
'type' => 'success',
'notification' => 'SUCCESS',
);
return back()->with($notification);
}


public function index_destroy($id){
$title = 'Staff';
$breadCrumbs = 'Human Resources';
Gym::findOrFail($id)->delete();
$notification = array(
'message'=>"Staff Successfully Deleted..!!!",
'alert-type'=>'success',
);
return back()->with($notification,compact('title','breadCrumbs'));
}


}
