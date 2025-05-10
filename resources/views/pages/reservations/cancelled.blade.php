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
<h2 class="lh-1">{{ count($cancelled_data_thisweek)}}</h2>
<p class="m-0">Cancelled Thisweek</p>
</div>
</div>
<div class="d-flex align-items-end justify-content-between mt-1">
<a class="text-success" href="{{route('reservation')}}">
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
<h2 class="lh-1">{{ $cancelled_data_thismonth }}</h2>
<p class="m-0">Cancelled Thismonth</p>
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
<h2 class="lh-1">{{ $cancelled_data_thisyear }}</h2>
<p class="m-0">Cancelled Thisyear</p>
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
<i class="fs-4 text-warning">₵</i>
</div>
</div>
<div class="d-flex flex-column">
<h2 class="lh-1">{{ $cancelled_data_thisweek->sum('fees') }}</h2>
<p class="m-0">Thisweek Revenue Cancelled</p>
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
@endpush



@section('main_content_body')
<div class="row mb-2">
<div class="col-12">
<a href="{{ route('reservation') }}" class="btn btn-primary">
New Reservation
</a>
</div>
</div>
<div class="row gx-3">
<div class="col-sm-12">
<div class="card">
<div class="card-header">
</div>
<div class="card-body">
<div class="table-responsive">
<table id="customButtons" class="table m-0 align-middle">
<thead>
<tr>
<th>#</th>
<th>Name</th>
<th>Phone number</th>
<th>Duration</th>
<th>Days</th>
<th>Room</th>
<th>Reservation Date</th>
<th>Cancelled Date</th>
<th>Cancelled By</th>
</tr>
</thead>
<tbody>
@php
use Carbon\Carbon;
$nx=1;
$duration=0;
@endphp
@foreach ($cancelled_data_thisweek as $cancelled)
<tr>
<td>{{ $nx }}</td>
<td>{{ $cancelled->name }}</td>
<td>{{ $cancelled->mobile_number }}</td>
@php
$duration = Carbon::parse($cancelled->date_from)->diffInDays(Carbon::parse($cancelled->date_to));
$dateToCheck = Carbon::parse($cancelled->date_to);
$today = Carbon::today();
if ($dateToCheck->isSameDay($today)) {
if (Carbon::now()->gt(Carbon::today()->addHours(12))) {
$duration = $duration+1;
}
}
@endphp
<td>{{ $cancelled->date_from  }} -to- {{ $cancelled->date_to }}</td>
<td>{{ $duration }}</td>
<td>{{ $cancelled->room }}</td>
<td>{{ $cancelled->date_entered }}</td>
<td>{{ $cancelled->cancelled_date }}</td>
<td>{{ $cancelled->cancelled_by }}</td>
</tr>
@php
$nx++;
@endphp
@endforeach
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
@endsection
