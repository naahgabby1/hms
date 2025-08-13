<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Systemuser;
use App\Models\Countries;
use App\CustomClass\Userdetails;
use App\CustomClass\Userroles;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\Input;

class SystemuserController extends Controller
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
$title = 'Users';
$breadCrumbs = 'System Users';
$RoleType = Role::get();
$Allusers = DB::table('login_details')->get();

if ($this->userRoles->isAdmin()) {
$delete_permission = 1;
}

return view('pages.users.index',
compact('title','breadCrumbs','RoleType','Allusers','delete_permission'));
}



public function save_new_user(Request $request){
$default = '12345';
$validated = $request->validate([
'role_type' => 'required',
'first_name' => 'required|string|max:255',
'last_name' => 'required|string|max:255',
'user_email' => 'required'
]);

$existingUser = Systemuser::where('email', $request->input('user_email'))->first();
if (!$existingUser) {
Systemuser::create([
'first_name' => $request->input('first_name'),
'last_names' => $request->input('last_name'),
'user_role' => $request->input('role_type'),
'email' => $request->input('user_email'),
'password' => Hash::make($default)
]);
}
$notification = array('success'=>"New User Added");
return back()->with($notification);
}





public function update_users(Request $request, $id){
$validated = $request->validate([
'role_type_edits' => 'required',
'first_name_edits' => 'required|string|max:255',
'last_name_edits' => 'required|string|max:255',
'user_email_edits' => 'required'
]);


Systemuser::findOrFail($id)->update([
'first_name'=>$request->input('first_name_edits'),
'last_names'=>$request->input('last_name_edits'),
'user_role'=>$request->input('role_type_edits'),
'email'=>$request->input('user_email_edits')
]);
$notification = array('success'=>"User Account Updated");
return back()->with($notification);
}



public function reset_user_password(Request $request, $id){
Systemuser::findOrFail($id)->update([
'password'=>Hash::make('12345')
]);
return response()->json(['message' => 'User Password Reset successful']);
}




public function destroy_users($id){
Systemuser::findOrFail($id)->delete();
return response()->json(['message' => 'User deleted successfully.']);
}
}
