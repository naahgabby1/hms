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

@endpush




@push('page_head2')
<div class="row gx-3">
<div class="col-xl-3 col-sm-6 col-12"></div>
<div class="col-xl-3 col-sm-6 col-12"></div>
<div class="col-xl-3 col-sm-6 col-12">
<div class="card mb-3">
<div class="card-body">
<div class="d-flex align-items-center">
<div class="p-2 border border-danger rounded-circle me-3">
<div class="icon-box md bg-danger-subtle rounded-5">
<i class="ri-building-line fs-4 text-primary"></i>
</div>
</div>
<div class="d-flex flex-column">
<h2 class="lh-1">{{ number_format($HallCustomers->count()) }}</h2>
<p class="m-0">Hall Booking Customers</p>
</div>
</div>
<div class="d-flex align-items-end justify-content-between mt-1">
<a class="text-danger" href="#">
<i class="ri-arrow-right-line ms-1"></i>
</a>
<div class="text-end">
<span class="badge bg-danger-subtle text-danger small">Registered Hall Customers</span>
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
<h2 class="lh-1">{{ number_format($HallTransactions->sum('payment_amount')) }}</h2>
<p class="m-0">Hall Transactions Registered</p>
</div>
</div>
<div class="d-flex align-items-end justify-content-between mt-1">
<a class="text-warning" href="#">
<i class="ri-arrow-right-line ms-1"></i>
</a>
<div class="text-end">
<span class="badge bg-warning-subtle text-warning small">Hall Transactions This Year</span>
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
data-bs-target="#hallModal">
Register Hall Booking
</button>
</div>
</div>
@include('pages.modals.modal_hallentries')
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
<th>Organization(Client)</th>
<th>Event</th>
<th>Catering Option</th>
<th>Booked Date</th>
<th><center>Duration</center></th>
<th><center>Status</center></th>
<th><center>Action</center></th>
</tr>
</thead>
<tbody>
@php
$num=1;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
$duration=0;
@endphp
@foreach ($Booked as $lost_data)
<tr>
@php
$duration = Carbon::parse($lost_data->start_date)->diffInDays(Carbon::parse($lost_data->end_date));
@endphp
<td>{{ $num }}</td>
<td>{{ $lost_data->organization_name.' ('.$lost_data->client.')' }}</td>
<td>{{ $lost_data->event_description }}</td>
<td>{{ $lost_data->catering_description }}</td>
<td>{{ Carbon::parse($lost_data->date_of_event)->format('d-M-Y') }}</td>
<td><center>{{ $duration }}</center></td>
<td>
<center>
@if ($lost_data->status==0)
<span class="badge bg-danger">Pending Payment</span>
@else
<span class="badge bg-success">Paid</span>
@endif
</center>
</td>
<td>
<center>
<button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
data-bs-target="#hallEditsModal{{$lost_data->id}}">
<i class="ri-edit-line"></i>
</button>
<button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
data-bs-target="#hallPaymentsModal{{$lost_data->id}}">
<i class="ri-secure-payment-line"></i>
</button>
@if ($delete_permission==1)
<button class="btn btn-danger btn-sm userDeletes"
data-id="{{ $lost_data->id }}"
data-url="{{ route('hall.entry.destroy', $lost_data->id) }}">
<i class="ri-delete-bin-line"></i>
</button>
@endif
</center>
</td>
</tr>
@php
$num++;
@endphp
@include('pages.modals.modal_hallentries_edits')
@include('pages.modals.modal_hallentries_payments')
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
$('#hideShowOrganization').hide();
$('#hideShowOrganization2').show();
$('#organization').change(function() {
var selected = $(this).val();
if (selected === '1') {
$('#hideShowOrganization').show();
$('#hideShowOrganization2').hide();
} else {
$('#hideShowOrganization').hide();
$('#hideShowOrganization2').show();
}
});







$(document).on('click','.userDeletes',function(){
const url = $(this).data('url');
_deleteAlert(url);
});



function _deleteAlert(url){
Swal.fire({
title: `Delete this Hall Booking Entry ?`,
text: "This action cannot be undone!",
icon: 'warning',
showCancelButton: true,
confirmButtonColor: '#d33',
cancelButtonColor: '#3085d6',
confirmButtonText: 'Confirm Delete',
reverseButtons: true
}).then((result) => {
if (result.isConfirmed) {
$.ajax({
url: url,
type: 'DELETE',
data: {
_token: '{{ csrf_token() }}'
},
success: function (response) {
Swal.fire('Deleted!', response.message , 'success');
setTimeout(function () {
location.reload();
}, 3000);
}
});
}
});
}
});
</script>
@endpush
