<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Staffpayment;
use App\Models\Closeopen;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class StaffController extends Controller
{
public function open_payments(Request $request, $id)
{
$title = 'Staff';
$breadCrumbs = 'Human Resources';

if ($id == 0) {
$id = 1;
$msg = "Staff Successfully Captured..!!!";
} else {
$id = 0;
$Staff_datax = Staff::where('archived', 0)->get();
$msg = "Staff Successfully Captured..!!!";

foreach ($Staff_datax as $mdata) {
$StaffEntry = new Staffpayment();
$StaffEntry->name = $mdata->first_name . ' ' . $mdata->last_name;
$StaffEntry->phone_number = $mdata->phone_number;
$StaffEntry->status = 0;
$StaffEntry->save();
}
}
Closeopen::query()->update(['status' => $id]);
$Staff_data = Staffpayment::where('status', 0)->get();
$notification = [
'message' => $msg,
'alert-type' => 'success',
];
return back()->with($notification)->with(compact('title', 'breadCrumbs'));
}




public function salary_staff(){
$title = 'Staff';
$breadCrumbs = 'Human Resources';
$Staff_data = Staff::where('archived', 0)->get();
$Open_close = DB::table('payments_openclose')->first();
$Staff_salaries = Staffpayment::all()->sum('amount');
$Staff_paylist = Staffpayment::where('status', 0)->get();
$Staff_archived = Staff::where('archived', 1)->get()->count();
return view('pages.staff.salaries', compact('title','breadCrumbs','Staff_data','Staff_salaries','Staff_archived','Open_close','Staff_paylist'));
}


public function index(){
$title = 'Staff';
$breadCrumbs = 'Human Resources';
$Staff_data = Staff::where('archived', 0)->get();
$Staff_salaries = Staffpayment::all()->sum('amount');
$Staff_archived = Staff::where('archived', 1)->get()->count();
return view('pages.staff.index', compact('title','breadCrumbs','Staff_data','Staff_salaries','Staff_archived'));
}


public function save_staff(Request $request){
$title = 'Staff';
$breadCrumbs = 'Human Resources';
$validated = $request->validate([
'first_name' => 'required|string|max:255',
'last_name' => 'required|string|max:255',
'phone_number' => 'required|max:25',
'gender' => 'required',
'contact_person' => 'required',
'contact_number' => 'required',
'ghana_card' => 'required',
'file' => 'required|file|mimes:jpg,jpeg,png,pdf,docx|max:2048',
], [
'first_name.required' => 'Please enter first name.',
'last_name.required' => 'Please enter last name',
'phone_number.required' => 'Please enter phone number',
'gender.required' => 'Please select gender',
'contact_person.required' => 'Please enter contact person',
'contact_number.required' => 'Please enter phone number',
'ghana_card.required' => 'Please enter Ghanacard',
'file.required|file|mimes:jpg,jpeg,png,pdf,docx|max:2048' => 'Check your picture',
]);


$Staff = new Staff();
$Staff->first_name = $request->input('first_name');
$Staff->last_name = $request->input('last_name');
$Staff->phone_number = $request->input('phone_number');
$Staff->gender = $request->input('gender');
$Staff->emergency_contact_name = $request->input('contact_person');
$Staff->emergency_contact_number = $request->input('contact_number');
$Staff->ghana_card = $request->input('ghana_card');
if ($request->hasFile('file')) {
$path = $request->file('file')->store('uploads', 'public');
}else{
$path = '';
}
$Staff->pix = $path;
$Staff->save();

$notification = array(
'message'=>"Staff Successfully Captured..!!!",
'alert-type'=>'success',
);
return back()->with($notification,compact('title','breadCrumbs'));
}



public function update_staff(Request $request, $id)
{
$title = 'Staff';
$breadCrumbs = 'Human Resources';

$validated = $request->validate([
'first_name_edit' => 'required|string|max:255',
'last_name_edit' => 'required|string|max:255',
'phone_number_edit' => 'required|max:25',
'gender_edit' => 'required',
'contact_person_edit' => 'required',
'contact_number_edit' => 'required',
'ghana_card_edit' => 'required',
'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,docx|max:2048',
], [
'first_name_edit.required' => 'Please enter first name.',
'last_name_edit.required' => 'Please enter last name',
'phone_number_edit.required' => 'Please enter phone number',
'gender_edit.required' => 'Please select gender',
'contact_person_edit.required' => 'Please enter contact person',
'contact_number_edit.required' => 'Please enter phone number',
'ghana_card_edit.required' => 'Please enter Ghanacard',
'file.file|mimes:jpg,jpeg,png,pdf,docx|max:2048' => 'Check your picture',
]);

$staff = Staff::findOrFail($id);
if ($request->hasFile('file')) {
if ($staff->pix && Storage::disk('public')->exists($staff->pix)) {
Storage::disk('public')->delete($staff->pix);
}

$path = $request->file('file')->store('uploads', 'public');
$staff->pix = $path;
}
$staff->first_name = $request->input('first_name_edit');
$staff->last_name = $request->input('last_name_edit');
$staff->phone_number = $request->input('phone_number_edit');
$staff->gender = $request->input('gender_edit');
$staff->emergency_contact_name = $request->input('contact_person_edit');
$staff->emergency_contact_number = $request->input('contact_number_edit');
$staff->ghana_card = $request->input('ghana_card_edit');
$staff->save();

$notification = [
'message' => "Staff Successfully Updated..!!!",
'alert-type' => 'success',
];

return back()->with($notification, compact('title', 'breadCrumbs'));
}




public function destroy_staff($id){
$title = 'Staff';
$breadCrumbs = 'Human Resources';
Staff::findOrFail($id)->delete();
$notification = array(
'message'=>"Staff Successfully Deleted..!!!",
'alert-type'=>'success',
);
return back()->with($notification,compact('title','breadCrumbs'));
}
}
