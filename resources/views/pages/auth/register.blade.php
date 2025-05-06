@extends('layout.auth.index')

@section('content')
<div class="container">
<div class="auth-wrapper">
<form action="{{ route('register.submit') }}" method="POST">
	@csrf
<div class="auth-box">
<a href="{{route('register')}}" class="auth-logo mb-4">
<img src="{{asset('app_assets/assets/images/logo-dark.svg')}}" alt="Bootstrap Gallery">
</a>
<h4 class="mb-4">Signup</h4>

@if ($errors->any())
{{$errors('name')}}
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="mb-3">
<label class="form-label" for="name">Your name <span class="text-danger">*</span></label>
<input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter your name">
</div>
<div class="mb-3">
<label class="form-label" for="email">Your email/username <span class="text-danger">*</span></label>
<input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Enter your email">
</div>

<div class="mb-3">
<label class="form-label" for="password">Your password <span class="text-danger">*</span></label>
<div class="input-group">
<input type="password" id="password" name="password" class="form-control" placeholder="Enter password">
<button class="btn btn-outline-secondary" type="button">
<i class="ri-eye-line text-primary"></i>
</button>
</div>
</div>

<div class="mb-3">
<label class="form-label" for="password">Confirm Your password <span class="text-danger">*</span></label>
<div class="input-group">
<input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm Your Password">
<button class="btn btn-outline-secondary" type="button">
<i class="ri-eye-line text-primary"></i>
</button>
</div>
<div class="form-text">
Your password must be 8-20 characters long.
</div>
</div>
<div class="mb-3 d-grid gap-2">
<button type="submit" class="btn btn-primary">Signup</button>
<a href="{{route('login')}}" class="btn btn-secondary">Already have an account? Login</a>
</div>
</div>
</form>
</div>
</div>
@endsection
