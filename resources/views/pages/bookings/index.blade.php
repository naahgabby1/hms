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
<h2 class="lh-1">{{ count($Booked_data_today)}}</h2>
<p class="m-0">Checked-Ins Today</p>
</div>
</div>
<div class="d-flex align-items-end justify-content-between mt-1">
<a class="text-success" href="{{route('booking')}}">
<span>View All</span>
<i class="ri-arrow-right-line text-success ms-1"></i>
</a>
<div class="text-end">
<p class="mb-0 text-success">+40%</p>
<span class="badge bg-success-subtle text-success small">as at now</span>
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
<h2 class="lh-1">{{ count($Booked_data) }}</h2>
<p class="m-0">Total Active Bookings</p>
</div>
</div>
<div class="d-flex align-items-end justify-content-between mt-1">
<a class="text-primary" href="javascript:void(0);">
<span>View All</span>
<i class="ri-arrow-right-line ms-1"></i>
</a>
<div class="text-end">
<p class="mb-0 text-primary">+30%</p>
<span class="badge bg-primary-subtle text-primary small">as at now</span>
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
<h2 class="lh-1">{{ number_format($Booked_thisday,2) }}</h2>
<p class="m-0">Bookings Revenue Today</p>
</div>
</div>
<div class="d-flex align-items-end justify-content-between mt-1">
<a class="text-danger" href="javascript:void(0);">
<span>View All</span>
<i class="ri-arrow-right-line ms-1"></i>
</a>
<div class="text-end">
<p class="mb-0 text-danger">+60%</p>
<span class="badge bg-danger-subtle text-danger small">as at now</span>
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
<h2 class="lh-1">{{ number_format($Booked_thisyear,2) }}</h2>
<p class="m-0">Bookings Revenue Thisyear</p>
</div>
</div>
<div class="d-flex align-items-end justify-content-between mt-1">
<a class="text-warning" href="javascript:void(0);">
<span>View All</span>
<i class="ri-arrow-right-line ms-1"></i>
</a>
<div class="text-end">
<p class="mb-0 text-warning">+20%</p>
<span class="badge bg-warning-subtle text-warning small">as at now</span>
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
<button type="button" class="btn btn-primary" data-bs-toggle="modal"
data-bs-target="#personalModal">
New Personal Booking
</button>
<button type="button" class="btn btn-warning" data-bs-toggle="modal"
data-bs-target="#corporateModal">
New Corporate Booking
</button>
</div>
</div>
@include('pages.modals.modal_personal_booking')
@include('pages.modals.modal_corporate_booking')
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
<th>Booking Date</th>
<th>Action</th>
</tr>
</thead>
<tbody>
@php
use Carbon\Carbon;
$nx=1;
$duration=0;
@endphp
@foreach ($Booked_data as $book)
<tr>
<td>{{ $nx }}</td>
<td>{{ $book->name }}</td>
<td>{{ $book->mobile_number }}</td>
@php
$duration = Carbon::parse($book->date_from)->diffInDays(Carbon::parse($book->date_to));
$dateToCheck = Carbon::parse($book->date_to);
$today = Carbon::today();
if ($dateToCheck->isSameDay($today)) {
if (Carbon::now()->gt(Carbon::today()->addHours(12))) {
$duration = $duration+1;
}
}
@endphp
<td>{{ Carbon::parse($book->date_from)->format('d-M-Y') }} -to- {{ Carbon::parse($book->date_to)->format('d-M-Y') }}</td>
<td>{{ $duration }}</td>
<td><span class="badge bg-success">{{ $book->room }} - Booked</span></td>
<td>{{ Carbon::parse($book->date_entered)->format('d-M-Y') }}</td>
<td>
<form action="{{ route('booking.destroy', $book->id) }}" method="POST">
@csrf
@method('DELETE')
<button type="button" class="btn btn-info" data-bs-toggle="modal"
data-bs-target="#resModalUpdates{{$book->id}}">
<i class="ri-edit-line"></i>
</button>
<a href="{{ route('check.out', $book->id) }}" class="btn btn-success">
<i class="fs-6 text-warning">₵</i>
</a>
<button type="button" id="delClicked" class="btn btn-danger">
<i class="ri-delete-bin-line"></i>
</button>
</form>
</td>
</tr>
@php
$nx++;
@endphp
@include('pages.modals.modal_booking_edits')
@endforeach
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
@endsection

@push('customed_js')
<script type="text/javascript">
$(document).ready(function(){
$('#hideShowOld').hide();
$('#hideShowOldCorporate').hide();

// Corporate side
$('#corporate_group_type').change(function() {
var selected = $(this).val();
if (selected === '1') {
$('#hideShowCorporate').show();
$('#hideShowOldCorporate').hide();
} else {
$('#hideShowOldCorporate').show();
$('#hideShowCorporate').hide();
}
});

$('#corporate_room_type').change(function() {
var selected = $(this).val();
$.get("filter-list/"+ selected, function(responses){
let select = $('#corporate_room');
select.empty();
select.append('<option value="">Select Available Room</option>');
$.each(responses.data, function (index, room) {
select.append('<option value="' + room.id + '">' + room.description + '</option>');
});
});
});






$(document).on('click','#delClicked',function(){
const form = this.closest('form');
_alert('This Booking',form);
});



$('#customer_type').change(function() {
var selected = $(this).val();
if (selected === '1') {
$('#hideShow').show();
$('#hideShowOld').hide();
} else {
$('#hideShowOld').show();
$('#hideShow').hide();
}
});



$(document).on('change', '.room_type_edits', function () {
var selected = $(this).val();
var row = $(this).closest('.modal');
var roomSelect = row.find('.room_edit');
$.get("filter-list/"+ selected, function(responses){
roomSelect.empty();
roomSelect.append('<option value="">Select Available Room</option>');
if (responses.data && responses.data.length > 0) {
$.each(responses.data, function (index, room) {
roomSelect.append('<option value="' + room.id + '">' + room.description + '</option>');
});
} else {
roomSelect.append('<option value="">No rooms available</option>');
}
}).fail(function () {
alert("Error fetching room data.");
});
});




$('#room_type').change(function() {
var selected = $(this).val();
$.get("filter-list/"+ selected, function(responses){
let select = $('#room');
select.empty();
select.append('<option value="">Select Available Room</option>');
$.each(responses.data, function (index, room) {
select.append('<option value="' + room.id + '">' + room.description + '</option>');
});
});
});



function _alert(mheader,form){
Swal.fire({
title: `Delete `+mheader+` ?`,
text: "This action cannot be undone!",
icon: 'warning',
showCancelButton: true,
confirmButtonColor: '#d33',
cancelButtonColor: '#3085d6',
confirmButtonText: 'Yes, delete it!',
reverseButtons: true
}).then((result) => {
if (result.isConfirmed) {
form.submit();
}
});
}
});
</script>
@endpush
