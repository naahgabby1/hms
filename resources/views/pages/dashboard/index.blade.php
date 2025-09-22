@extends('layout.main.index')

@push('breadcrumbs')
<ol class="breadcrumb">
<li class="breadcrumb-item">
<i class="ri-home-8-line lh-1 pe-3 me-3 border-end"></i>
<a href="{{route('dashboard')}}">Home</a>
</li>
<li class="breadcrumb-item text-primary" aria-current="page">
{{$breadCrumbs}}
</li>
</ol>
@endpush

@push('breadcrumbs_right')
<div class="ms-auto d-lg-flex d-none flex-row">
<div class="d-flex flex-row gap-1 day-sorting">
<button class="btn btn-sm btn-primary" style="font-family: monospace;">
Today : {{ date('d-m-Y')}} <span id="clock" style="font-family: monospace;"></span>
</button>
</div>
</div>
@endpush

@push('page_head')
<div class="row gx-3">
<div class="col-xxl-12 col-sm-12">
<div class="card mb-3" style="background-image: url('{{ asset('app_assets/assets/images/customed/hotel.png') }}'); background-size:cover;background-position:right">
<div class="card-body">
<div class="py-4 px-3 text-white">
<h6>{{ $Greetings }},</h6>
<h2>{{ Auth::guard('logindetails')->user()->user_name; }}</h2>
<h5>{{ $section_title }}</h5>
<div class="mt-4 d-flex gap-3">
<div class="d-flex align-items-center">
<div class="icon-box lg bg-arctic rounded-3 me-3">
<i class="ri-calendar-check-line fs-4"></i>
</div>
<div class="d-flex flex-column">
<h2 class="m-0 lh-1">{{ $reservations->where('status', 1)->count() }}</h2>
<p class="m-0">Bookings Today</p>
</div>
</div>
<div class="d-flex align-items-center">
<div class="icon-box lg bg-lime rounded-3 me-3">
{{-- <i class="ri-calendar-check-line fs-4"></i> --}}
<i class="ri-hotel-bed-line fs-4 text-success"></i>
</div>
<div class="d-flex flex-column">
<h2 class="m-0 lh-1">{{ $reservations->where('status', 0)->count() }}</h2>
<p class="m-0">Reservations As At Today</p>
</div>
</div>
<div class="d-flex align-items-center">
<div class="icon-box lg bg-peach rounded-3 me-3">
<i class="ri-hotel-bed-line fs-4"></i>
</div>
<div class="d-flex flex-column">
<h2 class="m-0 lh-1">{{ $reservations->where('status', 2)->count() }}</h2>
<p class="m-0">Checked-Outs Today</p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
@endpush


@push('page_head2')
<div class="row gx-3">
<div class="col-xl-3 col-sm-6 col-12">
<div class="card mb-3">
<div class="card-body">
<div class="d-flex align-items-center">
<div class="p-2 border border-success rounded-circle me-3">
<div class="icon-box md bg-success-subtle rounded-5">
<i class="ri-calendar-check-line fs-4 text-success"></i>
</div>
</div>
<div class="d-flex flex-column">
<h2 class="lh-1">{{ $reservations->where('status', 1)->count() }}</h2>
<p class="m-0">Bookings Today</p>
</div>
</div>
<div class="d-flex align-items-end justify-content-between mt-1">
<a class="text-success" href="{{route('dashboard')}}">
{{-- <span>View All</span> --}}
<i class="ri-arrow-right-line text-success ms-1"></i>
</a>
<div class="text-end">
{{-- <p class="mb-0 text-success">+40%</p> --}}
<span class="badge bg-success-subtle text-success small">today</span>
</div>
</div>
</div>
</div>
</div>
<div class="col-xl-3 col-sm-6 col-12">
<div class="card mb-3">
<div class="card-body">
<div class="d-flex align-items-center">
<div class="p-2 border border-primary rounded-circle me-3">
<div class="icon-box md bg-primary-subtle rounded-5">
<i class="ri-calendar-check-line fs-4 text-primary"></i>
</div>
</div>
<div class="d-flex flex-column">
<h2 class="lh-1">{{ $reservations->where('status', 0)->count() }}</h2>
<p class="m-0">Check-outs Today</p>
</div>
</div>
<div class="d-flex align-items-end justify-content-between mt-1">
<a class="text-primary" href="#">
{{-- <span>View All</span> --}}
<i class="ri-arrow-right-line ms-1"></i>
</a>
<div class="text-end">
{{-- <p class="mb-0 text-primary">+30%</p> --}}
<span class="badge bg-primary-subtle text-primary small">today</span>
</div>
</div>
</div>
</div>
</div>
<div class="col-xl-3 col-sm-6 col-12">
<div class="card mb-3">
<div class="card-body">
<div class="d-flex align-items-center">
<div class="p-2 border border-danger rounded-circle me-3">
<div class="icon-box md bg-danger-subtle rounded-5">
<i class="ri-wallet-3-line fs-4 text-danger"></i>
</div>
</div>
<div class="d-flex flex-column">
<h2 class="lh-1">{{ number_format($totalAmount,2) }}</h2>
<p class="m-0">Today's Revenue</p>
</div>
</div>
<div class="d-flex align-items-end justify-content-between mt-1">
<a class="text-danger" href="#">
{{-- <span>View All</span> --}}
<i class="ri-arrow-right-line ms-1"></i>
</a>
<div class="text-end">
{{-- <p class="mb-0 text-danger">+60%</p> --}}
<span class="badge bg-danger-subtle text-danger small">today</span>
</div>
</div>
</div>
</div>
</div>
<div class="col-xl-3 col-sm-6 col-12">
<div class="card mb-3">
<div class="card-body">
<div class="d-flex align-items-center">
<div class="p-2 border border-warning rounded-circle me-3">
<div class="icon-box md bg-warning-subtle rounded-5">
<i class="ri-wallet-3-line fs-4 text-warning"></i>
</div>
</div>
<div class="d-flex flex-column">
<h2 class="lh-1">
@php
$amount = 0;
foreach ($reservations2 as $reservation) {
if ($reservation->occupancy == 1) {
$amount += ($reservation->fees - $reservation->advanced_payment);
} else {
$amount += ($reservation->fees_double - $reservation->advanced_payment);
}
}
@endphp
{{ number_format($amount, 2) }}
</h2>
<p class="m-0">Pending Payments</p>
</div>
</div>
<div class="d-flex align-items-end justify-content-between mt-1">
<a class="text-warning" href="#">
{{-- <span>View All</span> --}}
<i class="ri-arrow-right-line ms-1"></i>
</a>
<div class="text-end">
{{-- <p class="mb-0 text-warning">+20%</p> --}}
<span class="badge bg-warning-subtle text-warning small">as at today</span>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row gx-3">
<div class="col-xl-2 col-sm-6 col-12">
<div class="card mb-3">
<div class="card-body">
<div class="d-flex flex-column align-items-center">
<div class="icon-box md rounded-5 mb-3" style="background: #0f8284">
<i class="ri-account-circle-line fs-4 lh-1"></i>
</div>
<h6>Customers</h6>
<h2 class="text-primary m-0">{{ $mcounts['customers'] }}</h2>
</div>
</div>
</div>
</div>
<div class="col-xl-2 col-sm-6 col-12">
<div class="card mb-3">
<div class="card-body">
<div class="d-flex flex-column align-items-center">
<div class="icon-box md rounded-5 mb-3" style="background: #0f8284">
<i class="ri-building-line fs-4 lh-1"></i>
</div>
<h6>Rooms</h6>
<h2 class="text-primary m-0">{{ $mcounts['rooms'] }}</h2>
</div>
</div>
</div>
</div>
<div class="col-xl-2 col-sm-6 col-12">
<div class="card mb-3">
<div class="card-body">
<div class="d-flex flex-column align-items-center">
<div class="icon-box md rounded-5 mb-3" style="background: #0f8284">
<i class="ri-team-line fs-4 lh-1"></i>
</div>
<h6>Users</h6>
<h2 class="text-primary m-0">{{ $mcounts['users'] }}</h2>
</div>
</div>
</div>
</div>
<div class="col-xl-2 col-sm-6 col-12">
<div class="card mb-3">
<div class="card-body">
<div class="d-flex flex-column align-items-center">
<div class="icon-box md rounded-5 mb-3" style="background: #0f8284">
<i class="ri-team-line fs-4 lh-1"></i>
</div>
<h6>Staff</h6>
<h2 class="text-primary m-0">{{ $mcounts['staff'] }}</h2>
</div>
</div>
</div>
</div>
<div class="col-xl-2 col-sm-6 col-12">
<div class="card mb-3">
<div class="card-body">
<div class="d-flex flex-column align-items-center">
<div class="icon-box md rounded-5 mb-3" style="background: #0f8284">
<i class="ri-hotel-bed-line fs-4 lh-1"></i>
</div>
<h6>Cancelled</h6>
<h2 class="text-primary m-0">{{ $mcounts['cancelled'] }}</h2>
</div>
</div>
</div>
</div>
<div class="col-xl-2 col-sm-6 col-12">
<div class="card mb-3">
<div class="card-body">
<div class="d-flex flex-column align-items-center">
<div class="icon-box md rounded-5 mb-3" style="background: #0f8284">
<i class="ri-suitcase-line fs-4 lh-1"></i>
</div>
<h6>Lost & Found</h6>
<h2 class="text-primary m-0">{{ $mcounts['lostxfound'] }}</h2>
</div>
</div>
</div>
</div>
</div>
@endpush



@section('main_content_body')
<div class="row gx-3">
{{-- <div class="col-xxl-12 col-sm-12">
<div class="card mb-3">
<div class="card-header">

</div>
<div class="card-body">
<div id="availableBeds"></div>
</div>
</div>
</div> --}}


{{-- <div class="col-xxl-3 col-sm-6">
<div class="card mb-3">
<div class="card-header">
<h5 class="card-title">Insurance Claims</h5>
</div>
<div class="card-body">
<div id="claims"></div>
</div>
</div>
</div> --}}
{{-- <div class="col-xxl-3 col-sm-6">
<div class="card mb-3">
<div class="card-header">
<h5 class="card-title">Patients by Gender</h5>
</div>
<div class="card-body">
<div class="auto-align-graph">
<div id="genderAge"></div>
</div>
</div>
</div>
</div> --}}
</div>
@endsection
