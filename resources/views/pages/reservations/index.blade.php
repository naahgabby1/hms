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

@php
$total = $Reserved_data->sum('fees');
@endphp

<h2 class="lh-1">{{ count($Reserved_data) }}</h2>
<p class="m-0">Active Reservations</p>
</div>
</div>
<div class="d-flex align-items-end justify-content-between mt-1">
<a class="text-success" href="{{ route('reservation') }}">
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
<h2 class="lh-1">{{ count($Booked_data_today) }}</h2>
<p class="m-0">Checked-Ins Today</p>
</div>
</div>
<div class="d-flex align-items-end justify-content-between mt-1">
<a class="text-primary" href="#">
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
<h2 class="lh-1">{{ number_format($Booked_data_pending->sum('fees'),2) }}</h2>
<p class="m-0">Booked Revenue Pending</p>
</div>
</div>
<div class="d-flex align-items-end justify-content-between mt-1">
<a class="text-danger" href="#">
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
<h2 class="lh-1">{{ number_format($total,2) }}</h2>
<p class="m-0">Pending Revenue Reserved</p>
</div>
</div>
<div class="d-flex align-items-end justify-content-between mt-1">
<a class="text-warning" href="#">
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
data-bs-target="#resModal">
Customer Reservation
</button>
<button type="button" class="btn btn-warning" data-bs-toggle="modal"
data-bs-target="#corporateReservationModal">
Corporate Reservation
</button>
</div>
</div>


@include('pages.modals.modal_personal_reservation')
@include('pages.modals.modal_corporate_reservation')
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
<th>Action</th>
</tr>
</thead>
<tbody>
@php
use Carbon\Carbon;
$nx=1;
$duration=0;
@endphp
@foreach ($Reserved_data as $reservation)
<tr id="row-{{ $reservation->id }}">
<td>{{ $nx }}</td>
<td>{{ $reservation->name }}</td>
<td>{{ $reservation->mobile_number }}</td>
@php
$duration = Carbon::parse($reservation->date_from)->diffInDays(Carbon::parse($reservation->date_to));
$dateToCheck = Carbon::parse($reservation->date_to);
$today = Carbon::today();
if ($dateToCheck->isSameDay($today)) {
if (Carbon::now()->gt(Carbon::today()->addHours(12))) {
$duration = $duration+1;
}
}
@endphp
<td>{{ Carbon::parse($reservation->date_from)->format('d-M-Y') }} -to- {{ Carbon::parse($reservation->date_to)->format('d-M-Y') }}</td>
<td>{{ $duration }}</td>
<td>
@if ($reservation->rooms && $reservation->rooms->availability == 1)
<span class="badge bg-danger">{{ $reservation->room }} - Booked</span>
@else
<span class="badge bg-success">{{ $reservation->room }} - Available</span>
@endif
</td>
<td>{{ Carbon::parse($reservation->date_entered)->format('d-M-Y') }}</td>
<td>
<button type="button" class="btn btn-success" data-bs-toggle="modal"
data-bs-target="#confrimModalMasterUpdate{{$reservation->id}}">
<i class="ri-thumb-up-line"></i>
</button>


@if($reservation->category==1)
<button type="button" class="btn btn-info" data-bs-toggle="modal"
data-bs-target="#cusresModalUpdates{{$reservation->id}}">
<i class="ri-edit-line"></i>
</button>
@else
<button type="button" class="btn btn-info" data-bs-toggle="modal"
data-bs-target="#corResUpdates{{$reservation->id}}">
<i class="ri-edit-line"></i>
</button>
@endif

<button type="submit" id="canClicked" class="btn btn-warning" data-cxid="{{ $reservation->id }}">
<i class="ri-close-fill"></i>
</button>
<button type="button" id="delClicked" class="btn btn-danger" data-id="{{ $reservation->id }}">
<i class="ri-delete-bin-line"></i>
</button>
</td>
</tr>
@php
$nx++;
@endphp

@include('pages.modals.modal_personal_reservation_edits')
@include('pages.modals.modal_corporate_reservation_edits')
@include('pages.modals.modal_personal_reservation_confimation')
@include('pages.modals.modal_corporate_reservation_confimation')
@endforeach
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@push('customed_js')
<script type="text/javascript">
$(document).ready(function(){
$('#hideShowOld').hide();
$('#hideShowOldCorporate').hide();

$('#flexCheckChecked').on('change', function () {
if ($(this).is(':checked')) {
$('#hidePayment').show();
} else {
$('#hidePayment').hide();
}
});


$('#flexCheckChecked2_edit').on('change', function () {
if ($(this).is(':checked')) {
$('#hidePayment2Editted_edit').show();
} else {
$('#hidePayment2Editted_edit').hide();
}
});





$('#flexCheckChecked2').on('change', function () {
if ($(this).is(':checked')) {
$('#hidePayment2').show();
} else {
$('#hidePayment2').hide();
}
});




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
$.get("filter-list-reservation/"+ selected, function(responses){
let select = $('#corporate_room');
select.empty();
select.append('<option value="">Select Available Room</option>');
$.each(responses.data, function (index, room) {
select.append('<option value="' + room.id + '">' + room.description + '</option>');
});
});
});



$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});


$(document).on('click','#canClicked',function(){
const cancelledId = $(this).data('cxid');
_alertCancelReservation(cancelledId);
});


$(document).on('click','#delClicked',function(){
const deleteId = $(this).data('id');
const rowdel = $('#row-' + deleteId);
_alertDeleteReservation(deleteId,rowdel);
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


$('#room_type').change(function() {
var selected = $(this).val();
$.get("filter-list-reservation/"+ selected, function(responses){
let select = $('#room');
select.empty();
select.append('<option value="">Select Available Room</option>');
$.each(responses.data, function (index, room) {
select.append('<option value="' + room.id + '">' + room.description + '</option>');
});
});
});



$(document).on('change', '.room_type_confirmation', function () {
var selected = $(this).val();
var row = $(this).closest('.modal');
var roomSelect = row.find('.room_confirmation');
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



$(document).on('change', '.room_type_edits', function () {
var selected = $(this).val();
var row = $(this).closest('.modal');
var roomSelect = row.find('.room_edits');
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





// Cancel Reservation

function _alertCancelReservation(cid){
Swal.fire({
title: `Cancel Reservation ?`,
text: "This action cannot be undone!",
icon: 'warning',
showCancelButton: true,
confirmButtonColor: '#d33',
cancelButtonColor: '#3085d6',
confirmButtonText: 'Yes, cancel it!',
reverseButtons: true
}).then((result) => {
if (result.isConfirmed) {
$.ajax({
url:'cancelled-cus-reservation/'+cid,
type:'PUT',
data: {
cancelled: 1
},
success:function(rdata){
if (rdata.success) {
Swal.fire({
title: "Cancelled!",
text: rdata['message'],
icon: "success"
});
setTimeout(function(){
location.reload();
},1000);
}
}
});
}
});
}



// Delete Reservation

function _alertDeleteReservation(id,rowdata){
Swal.fire({
title: `Delete Reservation ?`,
text: "This action cannot be undone!",
icon: 'warning',
showCancelButton: true,
confirmButtonColor: '#d33',
cancelButtonColor: '#3085d6',
confirmButtonText: 'Yes, delete it!',
reverseButtons: true
}).then((result) => {
if (result.isConfirmed) {
$.ajax({
url:'delete-reservation/'+id,
type:'DELETE',
success:function(rdata){
if (rdata.success) {
rowdata.remove();
Swal.fire({
title: "Deleted!",
text: "Your file has been deleted.",
icon: "success"
});
}
}
});
}
});
}



});
</script>
@endpush
