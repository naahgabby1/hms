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

    @endpush



    @section('main_content_body')

    {{-- @include('pages.modals.modal_booking') --}}
    <div class="row gx-3">
    <div class="col-sm-12">
    <div class="card">
    <div class="card-header">
    <h5 class="card-title">Payments & Check-outs</h5>
    </div>
    <div class="card-body">
    <div class="row gx-3">
    <div class="col-xxl-6 col-lg-4 col-sm-6">
    <div class="mb-3">
    <label class="form-label" for="name">Customer Name</label>
    <input type="text" class="form-control" id="name" value="{{$checkoutdata->name}}" name="name" readonly>
    </div>
    </div>
    <div class="col-xxl-3 col-lg-4 col-sm-6">
    <div class="mb-3">
    <label class="form-label" for="phone">Phone Number</label>
    <input type="text" class="form-control" id="phone_number" value="{{$checkoutdata->mobile_number}}" name="phone_number" readonly>
    </div>
    </div>
    <div class="col-xxl-3 col-lg-4 col-sm-6">
    <div class="mb-3">
    @php
    use Carbon\Carbon;
    $nx=1;
    $duration=0;
    $duration = Carbon::parse($checkoutdata->date_from)->diffInDays(Carbon::parse($checkoutdata->date_to));
    $dateToCheck = Carbon::parse($checkoutdata->date_to);
    $today = Carbon::today();
    if ($dateToCheck->isSameDay($today)) {
    if (Carbon::now()->gt(Carbon::today()->addHours(12))) {
    $duration = $duration+1;
    }
    }
    @endphp


    <label class="form-label" for="room">Duration (Days)</label>
    <input type="number" class="form-control" id="room" value="{{$duration}}" name="room" readonly>
    </div>
    </div>
    <div class="col-xxl-3 col-lg-4 col-sm-6">
    <div class="mb-3">
    <label class="form-label" for="date_from">Date From</label>
    <input type="text" class="form-control" id="date_from" name="date_from" placeholder="Enter phone number">
    </div>
    </div>
    <div class="col-xxl-3 col-lg-4 col-sm-6">
    <div class="mb-3">
    <label class="form-label" for="a6">Date To</label>
    <input type="date" class="form-control" id="date_to" name="date_to" placeholder="Select date">
    </div>
    </div>
    <div class="col-xxl-3 col-lg-4 col-sm-6">
    <div class="mb-3">
    <label class="form-label" for="duration">Duration of Stay</label>
    <input type="text" class="form-control" id="duration" name="duration" placeholder="Select time">
    </div>
    </div>
    <div class="col-xxl-3 col-lg-4 col-sm-6">
    <div class="mb-3">
    <label class="form-label" for="amount">Amount Due</label>
    <input type="text" class="form-control" id="amount" name="anount" placeholder="Select time">
    </div>
    </div>
    <div class="col-sm-12">
    <div class="d-flex gap-2 justify-content-end">
    <a href="appointments-list.html" class="btn btn-outline-secondary">
    Cancel
    </a>
    <a href="appointments-list.html" class="btn btn-primary">
    Confirm Payment
    </a>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    @endsection
