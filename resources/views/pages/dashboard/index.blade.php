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
<button class="btn btn-sm btn-primary">Today</button>
<button class="btn btn-sm">7d</button>
<button class="btn btn-sm">2w</button>
<button class="btn btn-sm">1m</button>
<button class="btn btn-sm">3m</button>
<button class="btn btn-sm">6m</button>
<button class="btn btn-sm">1y</button>
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
<i class="ri-surgical-mask-line fs-4"></i>
</div>
<div class="d-flex flex-column">
<h2 class="m-0 lh-1">9</h2>
<p class="m-0">New Bookings</p>
</div>
</div>
<div class="d-flex align-items-center">
<div class="icon-box lg bg-lime rounded-3 me-3">
<i class="ri-lungs-line fs-4"></i>
</div>
<div class="d-flex flex-column">
<h2 class="m-0 lh-1">3</h2>
<p class="m-0">Checked-in Rooms</p>
</div>
</div>
<div class="d-flex align-items-center">
<div class="icon-box lg bg-peach rounded-3 me-3">
<i class="ri-walk-line fs-4"></i>
</div>
<div class="d-flex flex-column">
<h2 class="m-0 lh-1">2</h2>
<p class="m-0">Checked-outs Today</p>
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
<i class="ri-surgical-mask-line fs-4 text-success"></i>
</div>
</div>
<div class="d-flex flex-column">
<h2 class="lh-1">8</h2>
<p class="m-0">Check-ins Today</p>
</div>
</div>
<div class="d-flex align-items-end justify-content-between mt-1">
<a class="text-success" href="{{route('dashboard')}}">
<span>View All</span>
<i class="ri-arrow-right-line text-success ms-1"></i>
</a>
<div class="text-end">
<p class="mb-0 text-success">+40%</p>
<span class="badge bg-success-subtle text-success small">this month</span>
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
<i class="ri-lungs-line fs-4 text-primary"></i>
</div>
</div>
<div class="d-flex flex-column">
<h2 class="lh-1">360</h2>
<p class="m-0">Check-outs Today</p>
</div>
</div>
<div class="d-flex align-items-end justify-content-between mt-1">
<a class="text-primary" href="javascript:void(0);">
<span>View All</span>
<i class="ri-arrow-right-line ms-1"></i>
</a>
<div class="text-end">
<p class="mb-0 text-primary">+30%</p>
<span class="badge bg-primary-subtle text-primary small">this month</span>
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
<i class="ri-microscope-line fs-4 text-danger"></i>
</div>
</div>
<div class="d-flex flex-column">
<h2 class="lh-1">980</h2>
<p class="m-0">Today's Revenue</p>
</div>
</div>
<div class="d-flex align-items-end justify-content-between mt-1">
<a class="text-danger" href="javascript:void(0);">
<span>View All</span>
<i class="ri-arrow-right-line ms-1"></i>
</a>
<div class="text-end">
<p class="mb-0 text-danger">+60%</p>
<span class="badge bg-danger-subtle text-danger small">this month</span>
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
<i class="ri-money-dollar-circle-line fs-4 text-warning"></i>
</div>
</div>
<div class="d-flex flex-column">
<h2 class="lh-1">$98000</h2>
<p class="m-0">Pending Payments</p>
</div>
</div>
<div class="d-flex align-items-end justify-content-between mt-1">
<a class="text-warning" href="javascript:void(0);">
<span>View All</span>
<i class="ri-arrow-right-line ms-1"></i>
</a>
<div class="text-end">
<p class="mb-0 text-warning">+20%</p>
<span class="badge bg-warning-subtle text-warning small">this month</span>
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
<div class="icon-box md rounded-5 bg-primary mb-3">
<i class="ri-verified-badge-line fs-4 lh-1"></i>
</div>
<h6>Customers</h6>
<h2 class="text-primary m-0">639</h2>
</div>
</div>
</div>
</div>
<div class="col-xl-2 col-sm-6 col-12">
<div class="card mb-3">
<div class="card-body">
<div class="d-flex flex-column align-items-center">
<div class="icon-box md rounded-5 bg-primary mb-3">
<i class="ri-stethoscope-line fs-4 lh-1"></i>
</div>
<h6>Rooms</h6>
<h2 class="text-primary m-0">83</h2>
</div>
</div>
</div>
</div>
<div class="col-xl-2 col-sm-6 col-12">
<div class="card mb-3">
<div class="card-body">
<div class="d-flex flex-column align-items-center">
<div class="icon-box md rounded-5 bg-primary mb-3">
<i class="ri-psychotherapy-line fs-4 lh-1"></i>
</div>
<h6>Users</h6>
<h2 class="text-primary m-0">296</h2>
</div>
</div>
</div>
</div>
<div class="col-xl-2 col-sm-6 col-12">
<div class="card mb-3">
<div class="card-body">
<div class="d-flex flex-column align-items-center">
<div class="icon-box md rounded-5 bg-primary mb-3">
<i class="ri-lungs-line fs-4 lh-1"></i>
</div>
<h6>Staff</h6>
<h2 class="text-primary m-0">49</h2>
</div>
</div>
</div>
</div>
<div class="col-xl-2 col-sm-6 col-12">
<div class="card mb-3">
<div class="card-body">
<div class="d-flex flex-column align-items-center">
<div class="icon-box md rounded-5 bg-primary mb-3">
<i class="ri-hotel-bed-line fs-4 lh-1"></i>
</div>
<h6>Cancelled</h6>
<h2 class="text-primary m-0">2</h2>
</div>
</div>
</div>
</div>
<div class="col-xl-2 col-sm-6 col-12">
<div class="card mb-3">
<div class="card-body">
<div class="d-flex flex-column align-items-center">
<div class="icon-box md rounded-5 bg-primary mb-3">
<i class="ri-walk-line fs-4 lh-1"></i>
</div>
<h6>Lost & Found</h6>
<h2 class="text-primary m-0">3</h2>
</div>
</div>
</div>
</div>
</div>
@endpush



@section('main_content_body')
<div class="row gx-3">
<div class="col-xxl-12 col-sm-12">
<div class="card mb-3">
<div class="card-header">

</div>
<div class="card-body">
<div id="availableBeds"></div>
</div>
</div>
</div>


<div class="col-xxl-3 col-sm-6">
<div class="card mb-3">
<div class="card-header">
<h5 class="card-title">Insurance Claims</h5>
</div>
<div class="card-body">
<div id="claims"></div>
</div>
</div>
</div>
<div class="col-xxl-3 col-sm-6">
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
</div>
</div>
@endsection
