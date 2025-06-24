@extends('layout.auth.index')

@section('content')
<div class="container">
<div class="auth-wrapper">
<form action="{{route('login.changedefault.submit')}}" method="POST">
@csrf
@method('POST')
<div class="auth-box">
<center><img src="{{asset('app_assets/assets/logo/logo.jpg')}}" style="width: 50%; height: 50%"></center><hr>
<h4 class="mb-4 mt-3">Change Default Password</h4>
<div class="mb-3">
<label class="form-label" for="email">Enter New Password <span class="text-danger">*</span></label>
<div class="input-group">
<input type="password" name="password" class="form-control"
placeholder="Enter Your Password" required>
<button class="btn btn-outline-secondary" type="button">
<i class="ri-eye-line text-primary"></i>
</button>
</div>
</div>
<div class="mb-2">
<label class="form-label" for="password">Confirm Password <span class="text-danger">*</span></label>
<div class="input-group">
<input type="hidden" name="hiddencode" value="{{ session('usermastername') }}">
<input type="password" name="password_confirmation" class="form-control"
placeholder="Confirm Your password" required>
<button class="btn btn-outline-secondary" type="button">
<i class="ri-eye-line text-primary"></i>
</button>
</div>
</div>
<div class="mb-3 d-grid gap-2">
<button type="submit" class="btn btn-primary btn-lg" style="background: #108185">Change Password</button>
<a href="{{route('login')}}" class="btn btn-danger btn-lg">Cancel</a>
</div>
</div>
</form>
</div>
</div>
@endsection
