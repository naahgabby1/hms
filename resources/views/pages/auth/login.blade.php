@extends('layout.auth.index')

@section('content')
<div class="container">
<div class="auth-wrapper">
<form action="{{route('login.authentication')}}" method="POST">
@csrf
<div class="auth-box">
<center><img src="{{asset('app_assets/assets/logo/logo.jpg')}}" style="width: 50%; height: 50%"></center><hr>
<h4 class="mb-4">Login</h4>
<div class="mb-3">
<label class="form-label" for="email">Username / Email <span class="text-danger">*</span></label>
<input type="text" name="email" class="form-control" placeholder="Enter Your Email" required>
</div>
<div class="mb-2">
<label class="form-label" for="password">Password <span class="text-danger">*</span></label>
<div class="input-group">
<input type="password" name="password" class="form-control" placeholder="Enter Your Password" required>
<button class="btn btn-outline-secondary" type="button">
<i class="ri-eye-line text-primary"></i>
</button>
</div>
</div>
{{-- <div class="d-flex justify-content-end mb-3">
<a href="{{route('forgetpassword')}}" class="text-decoration-underline">Forgot password?</a>
</div> --}}
<div class="mb-3 d-grid gap-2 mt-4">
<button type="submit" class="btn btn-primary btn-lg" style="background: #108185">Login</button>
{{-- <a href="{{route('register')}}" class="btn btn-secondary">Not registered? Signup</a> --}}
</div>
</div>
</form>
</div>
</div>
@endsection
