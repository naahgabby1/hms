<?php

namespace App\Http\Controllers\Auth;

use App\Models\Insertuser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Systemuser;

class LoginController extends Controller
{
public function index(){
$title = 'Login';
$breadCrumb = 'Login';
return view('pages.auth.login', compact('title'));
}


public function showdefaultuserform(){
$title = 'Login';
$breadCrumb = 'Login';
if (!session()->has('usermastername')) {
return redirect()->route('login');
}
return view('pages.auth.defaultuser', compact('title'));
}

public function showforgotpassform(){
$title = 'Forget Password';
$breadCrumb = 'Forget Password';
return view('pages.auth.forget_password', compact('title'));
}

public function showregisterform(){
$title = 'Registration';
$breadCrumb = 'Registration';
return view('pages.auth.register', compact('title'));
}


public function change_default_password(Request $request){
$title = 'Change Password';
$breadCrumb = 'Change Password';
$validated = $request->validate([
'password' => ['required', 'min:4', 'confirmed']
]);

$checx = Systemuser::where('email',$request->input('hiddencode'))->update([
'password'=>Hash::make($request->input('password'))
]);
$notification = array(
'message'=>"Default Password Changed",
'type' => 'success',
'notification' => 'SUCCESS',
);
return back()->with($notification);
}

public function auth_login(Request $request){
$credentials = $request->only('email', 'password');
$title = 'Login';
if (Auth::guard('logindetails')->attempt($credentials)) {
$user = Auth::guard('logindetails')->user();
if ($request->input('password') === '12345') {
Auth::guard('logindetails')->logout();
$request->session()->invalidate();
$request->session()->regenerateToken();
return redirect()->to('default-user-page')->with('usermastername', $request->input('email'));
}
$request->session()->regenerate();
return redirect()->intended('admin/dashboard');
}
return view('pages.auth.login', compact('title'));
}

}
