@extends('layout.main.index')

@push('styles')
<style>
.table-responsive {
  width: 100%;
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
}
</style>
@endpush


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

@endpush




@push('page_head2')
<div class="row gx-3">
<div class="col-xl-3 col-sm-6 col-12">
<div class="card mb-3">
<div class="card-body">
<div class="d-flex align-items-center">
<div class="p-2 border border-success rounded-circle me-3">
<div class="icon-box md bg-success-subtle rounded-5">
<i class="ri-key-line fs-4 text-success"></i>
</div>
</div>
<div class="d-flex flex-column">
<h2 class="lh-1">{{ count($Booked_data_today)}}</h2>
<p class="m-0">Checked-Ins Today</p>
</div>
</div>
<div class="d-flex align-items-end justify-content-between mt-1">
<a class="text-success" href="{{route('booking')}}">
<i class="ri-arrow-right-line text-success ms-1"></i>
</a>
<div class="text-end">
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
<i class="ri-key-line fs-4 text-primary"></i>
</div>
</div>
<div class="d-flex flex-column">
<h2 class="lh-1">{{ count($Booked_data) }}</h2>
<p class="m-0">Total Active Bookings</p>
</div>
</div>
<div class="d-flex align-items-end justify-content-between mt-1">
<a class="text-primary" href="#">
<i class="ri-arrow-right-line ms-1"></i>
</a>
<div class="text-end">
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
<i class="ri-wallet-line fs-4 text-danger"></i>
</div>
</div>
<div class="d-flex flex-column">
<h2 class="lh-1">{{ number_format($Booked_thisday,2) }}</h2>
<p class="m-0">Checked-out Revenue Today</p>
</div>
</div>
<div class="d-flex align-items-end justify-content-between mt-1">
<a class="text-danger" href="#">
<i class="ri-arrow-right-line ms-1"></i>
</a>
<div class="text-end">
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
<i class="ri-wallet-line fs-4 text-warning"></i>
</div>
</div>
<div class="d-flex flex-column">
<h2 class="lh-1">{{ number_format($Booked_thisyear,2) }}</h2>
<p class="m-0">Bookings Revenue {{date('Y')}}</p>
</div>
</div>
<div class="d-flex align-items-end justify-content-between mt-1">
<a class="text-warning" href="#">
<i class="ri-arrow-right-line ms-1"></i>
</a>
<div class="text-end">
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
Customer Booking
</button>
<button type="button" class="btn btn-warning" data-bs-toggle="modal"
data-bs-target="#corporateModal">
Corporate Booking
</button>
</div>
</div>
@include('pages.modals.modal_personal_booking')
@include('pages.modals.modal_corporate_booking')
<div class="row gx-3">
<div class="col-sm-12">
<div class="card">
<div class="card-body">
<div class="table-responsive">
<table id="customButtons" class="table m-0 align-middle">
<thead>
<tr>
<th>Name</th>
<th>Occupancy</th>
<th>Phone Number</th>
<th>Duration</th>
<th>Days</th>
<th>Amount Due</th>
<th>Room</th>
<th>Booking Date</th>
<th><center>Action</center></th>
</tr>
</thead>
<tbody>
@php
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
$nx=1;
$duration=0;
$countz = 0;
@endphp
@foreach ($Booked_data as $book)
<tr>
@php
$zvaluz = 0;
$duration = Carbon::parse($book->date_from)->diffInDays(Carbon::parse($book->date_to));
$dateToCheck = Carbon::parse($book->date_to);
$extra_days = 0;
$today = Carbon::today();
if ($dateToCheck->isSameDay($today)) {
if (Carbon::now()->gt(Carbon::today()->addHours(12))) {
$duration = $duration+1;
}
}
if ($today->gt($dateToCheck->addDays(1))) {
$extra_days = $dateToCheck->diffInDays($today);
}
$actual_duration = $duration + $extra_days;
$dtotalz = 0;
$countz = $book->multiple_customers_fromview->count();
$baseFee = $book->occupancy == 1 ? $book->fees : $book->fees_double;

if ($countz > 0) {
$sumOne = $book->multiple_customers_fromview->where('occupancy', 1)->sum('fee');

$sumTwo = $book->multiple_customers_fromview->where('occupancy', '!=', 1)->sum('fee_double');

$masterSum = $sumOne + $sumTwo;

$baseFee = $book->occupancy == 1 ? $book->fees : $book->fees_double;

$dtotalz = $actual_duration * ($masterSum + $baseFee);
}else{
$dtotalz = $actual_duration * $baseFee;
}

@endphp
<td><a href="#" class="text-decoration-underline"
data-bs-toggle="modal"
data-bs-target="#detailCustomerClicked{{$book->id}}">
{{ $book->name }}[{{$countz}}]
</a></td>
<td>{{ $book->occupancy == 1 ? 'Single' : 'Double' }}</td>
<td>{{ $book->mobile_number }}</td>
<td>{{ Carbon::parse($book->date_from)->format('d-M-Y') }} -to- {{ Carbon::parse($book->date_to)->format('d-M-Y') }}</td>
<td>{{ $actual_duration }}</td>
<td>{{ number_format($dtotalz,2) }}</td>
<td><span class="badge bg-success">{{ $book->room }} - Booked</span></td>
<td>{{ Carbon::parse($book->date_from)->format('d-M-Y') }}</td>
<td>
<form action="{{ route('booking.destroy', $book->id) }}" method="POST">
@csrf
@method('DELETE')
@if($book->category==1)
<button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
data-bs-target="#resModalUpdates{{$book->id}}">
<i class="ri-edit-line"></i>
</button>
@else
<button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
data-bs-target="#companyBookingUpdates{{$book->id}}">
<i class="ri-edit-line"></i>
</button>
@endif
<a href="{{ route('check.out', $book->id) }}" class="btn btn-success btn-sm">
<i class="fs-6 text-warning">₵</i>
</a>


{{-- @if($delete_permission==1) --}}

<button type="button" class="btn btn-warning btn-sm"
data-bs-toggle="modal"
data-bs-target="#addCustomerClicked{{$book->id}}">
<i class="ri-group-line"></i>
</button>
{{-- @endif --}}

@if($delete_permission==1)
<button type="button" id="delClicked" class="btn btn-danger btn-sm">
<i class="ri-delete-bin-line"></i>
</button>
@endif
</form>
</td>
</tr>
@php
$nx++;
@endphp
@include('pages.modals.modal_booking_edits')
@include('pages.modals.modal_corporate_booking_edits')
@include('pages.modals.modal_addcustomergroup')
@include('pages.modals.modal_addcustomergroup_details')
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

$('.btnAddMultiple').on('click', function () {
const bookId = $(this).data('book-id');

const firstName = $(`#addCustomerClicked${bookId} .first_name_multiple`).val().trim();
const lastName = $(`#addCustomerClicked${bookId} .last_names_multiple`).val().trim();
const phone = $(`#addCustomerClicked${bookId} .phone_number_multiple`).val().trim();
const gender = $(`#addCustomerClicked${bookId} .gender_multiple:checked`).val();
const room_type = $(`#addCustomerClicked${bookId} .room_type_multiple`).val().trim();
const roomx = $(`#addCustomerClicked${bookId} .room_multiple`).val().trim();
const booking_code = $(`#addCustomerClicked${bookId} .booking_id`).val().trim();

var parts = roomx.split('|');
var parts_id = parts[0];
var parts_name = parts[1];

if (!firstName || !lastName || !phone || !gender || !room_type || !roomx) {
Swal.fire({
title: "Failed",
text: "Complete the form before submission",
icon: "error",
draggable: true
});
return;
}

const customer = {
first_name: firstName,
last_name: lastName,
gender: gender,
phone: phone,
room_type: room_type,
room_id: parts_id,
room_name: parts_name
};

// Get and update hidden input value
const $hiddenInput = $(`#multiple_customers${bookId}`);
let customerList = JSON.parse($hiddenInput.val() || '[]');
customerList.push(customer);
$hiddenInput.val(JSON.stringify(customerList));

// Add to preview list
$(`#customerList${bookId}`).append(`
<li class="list-group-item d-flex justify-content-between align-items-center">
${customer.first_name} ${customer.last_name} ( ${customer.phone} ) - (${customer.room_name})
<span class="badge bg-success">✔</span>
</li>
`);

// Clear form
$(`#addCustomerClicked${bookId} .first_name_multiple`).val('');
$(`#addCustomerClicked${bookId} .last_names_multiple`).val('');
$(`#addCustomerClicked${bookId} .phone_number_multiple`).val('');
$(`#addCustomerClicked${bookId} .room_multiple`).val('');
$(`#addCustomerClicked${bookId} .room_type_multiple`).val('');
$(`#addCustomerClicked${bookId} .gender_multiple`).prop('checked', false);
});



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



$(document).on('change', '.room_type_multiple', function () {
var selected = $(this).val();
var modal = $(this).closest('.modal');
var roomSelect = modal.find('.room_multiple');
$.get("filter-list/" + selected, function (responses) {
roomSelect.empty();
roomSelect.append('<option value="">Select Available Room</option>');
if (responses.data && responses.data.length > 0) {
$.each(responses.data, function (index, room) {
roomSelect.append('<option value="' + room.id + '|' + room.description + '">' + room.description + '</option>');
});
} else {
roomSelect.append('<option value="">No rooms available</option>');
}
}).fail(function () {
Swal.fire({
title: "Failed",
text: "Error fetching room data",
icon: "error",
draggable: true
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
Swal.fire({
title: "Failed",
text: "Error fetching room data",
icon: "error",
draggable: true
});
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
