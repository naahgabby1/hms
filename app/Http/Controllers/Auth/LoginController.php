<?php

namespace App\Http\Controllers\Auth;

use App\Models\Insertuser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(){
        $title = 'Login';
        $breadCrumb = 'Login';
        return view('pages.auth.login', compact('title'));
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

    public function register(Request $request){
        $title = 'Registration';
        $breadCrumb = 'Registration';

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:3|max:25',
        ], [
            'name.required' => 'Please enter your name.',
            'email.required' => 'We need your email address',
            'email.email' => 'This is not a valid email format.',
            'email.unique' => 'This email is already registered.',
            'password.required' => 'Please enter a password.',
            'password.confirmed' => 'Passwords do not match.',
        ]);

        $user = new Insertuser();
        $user->first_name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        $notification = array(
            'message'=>"User Successfully Registered..!!!",
            'alert-type'=>'success',
        );
        return back()->with($notification);
        
    }


    public function auth_login(Request $request){
        $credentials = $request->only('email', 'password');
        $title = 'Login';


        if (Auth::guard('logindetails')->attempt($credentials)) {
        $request->session()->regenerate(); // security best practice


        session([
            'user_id' => Auth::guard('logindetails')->user()->id,
            'user_name' => Auth::guard('logindetails')->user()->user_name,
            'user_email' => Auth::guard('logindetails')->user()->email,
            'user_role' => Auth::guard('logindetails')->user()->user_role,
            'user_role_description' => Auth::guard('logindetails')->user()->role_description,
        ]);

        return redirect()->intended('admin/dashboard');
    }


    return view('pages.auth.login', compact('title'));
}




}