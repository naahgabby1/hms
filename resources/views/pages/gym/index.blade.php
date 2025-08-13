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
{{-- <div class="col-xl-3 col-sm-6 col-12"></div> --}}
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
<h2 class="lh-1">{{ number_format($GymCustomers->count()) }}</h2>
<p class="m-0">Gym Customers</p>
</div>
</div>
<div class="d-flex align-items-end justify-content-between mt-1">
<a class="text-danger" href="#">
<i class="ri-arrow-right-line ms-1"></i>
</a>
<div class="text-end">
<span class="badge bg-danger-subtle text-danger small">Registered Customers/Clients</span>
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
<i class="fs-4 text-success">₵</i>
</div>
</div>
<div class="d-flex flex-column">
<h2 class="lh-1">{{ number_format($PaymentSums['this_month'],2) }}</h2>
<p class="m-0">Gym Revenue</p>
</div>
</div>
<div class="d-flex align-items-end justify-content-between mt-1">
<a class="text-success" href="#">
<i class="ri-arrow-right-line ms-1"></i>
</a>
<div class="text-end">
<span class="badge bg-success-subtle text-success small">Generated Revenue This Month</span>
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
<h2 class="lh-1">{{ number_format($PaymentSums['this_year'],2) }}</h2>
<p class="m-0">Gym Revenue</p>
</div>
</div>
<div class="d-flex align-items-end justify-content-between mt-1">
<a class="text-warning" href="#">
<i class="ri-arrow-right-line ms-1"></i>
</a>
<div class="text-end">
<span class="badge bg-warning-subtle text-warning small">Generated Revenue This Year</span>
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
data-bs-target="#GymCustomerModal">
Register Gym Client
</button>
<button type="button" class="btn btn-success" data-bs-toggle="modal"
data-bs-target="#GymTransModal">
Register Gym Transaction
</button>
<button type="button" class="btn btn-primary" data-bs-toggle="modal"
data-bs-target="#GymClientsModal">
Registered Gym Clients
</button>



{{-- <a href="{{ route('gym.clients.list')}}" class="btn btn-info">

</a> --}}
</div>
</div>
@include('pages.modals.modal_gymcustomers')
@include('pages.modals.modal_gymtransaction')
@include('pages.modals.modal_gymclients_list')
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
<th>Client</th>
<th>Phone number</th>
<th>Date </th>
<th>Category</th>
<th><center>Action</center></th>
</tr>
</thead>
<tbody>
@php
$num=1;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
@endphp
@foreach ($GymTransactions as $gymx_data)
<tr>
<td>{{ $num }}</td>
<td>{{ $gymx_data->gym_client }}</td>
<td>{{ $gymx_data->phone_number }}</td>
<td>{{ $gymx_data->client_group }}</td>
<td>{{ Carbon::parse($gymx_data->date_time)->format('d-M-Y') }}</td>
<td>
<center>
<button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
data-bs-target="#GymPaymentsModal{{$gymx_data->id}}">
<i class="ri-secure-payment-line"></i>
</button>
@if ($gymx_data->gym_client_group==1)
<button class="btn btn-primary btn-sm userWaiver"
data-id="{{ $gymx_data->id }}"
data-url="{{ route('gym.entry.waiver', $gymx_data->id) }}">
<i class="ri-user-line"></i>
</button>
@endif
@if ($delete_permission==1)
<button class="btn btn-danger btn-sm userDeletes"
data-id="{{ $gymx_data->id }}"
data-url="{{ route('gym.entry.destroy', $gymx_data->id) }}">
<i class="ri-delete-bin-line"></i>
</button>
@endif
</center>
</td>
</tr>
@php
$num++;
@endphp
@include('pages.modals.modal_gympayments')
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
$('#currentCustomer').show();
$('#currentCustomer2').show();
$('#newCustomer2').hide();
$('#newCustomer').hide();

$('#membership_preselected').change(function() {
var selected = $(this).val();
if (selected === '1') {
$('#currentCustomer').show();
$('#currentCustomer2').show();
$('#newCustomer').hide();
$('#newCustomer2').hide();
} else {
$('#newCustomer').show();
$('#newCustomer2').show();
$('#currentCustomer').hide();
$('#currentCustomer2').hide();
}
});

$(document).on('change', '#membership_registered', function () {
var selected = $(this).val();
$.get("filter-customer-phones/" + selected, function (responses) {
if (responses.success && responses.data) {
$('#membership_registered_phone').val(responses.data.phone_number);
$('#membership_registered_phone_hidden').val(responses.data.name);
$('#membership_registered_id_hidden').val(selected);
} else {
$('#membership_registered_phone').val('');
$('#membership_registered_phone_hidden').val('');
$('#membership_registered_id_hidden').val('');
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

$(document).on('click','.userWaiver',function(){
const url = $(this).data('url');
_waiverAlert(url);
});

$(document).on('click','.userDeletes',function(){
const url = $(this).data('url');
_deleteAlert(url);
});

function _waiverAlert(url){
Swal.fire({
title: `Waive this payment ?`,
text: "This action cannot be undone!",
icon: 'warning',
showCancelButton: true,
confirmButtonColor: '#d33',
cancelButtonColor: '#3085d6',
confirmButtonText: 'Confirm Waiver',
reverseButtons: true
}).then((result) => {
if (result.isConfirmed) { console.log(data);
$.ajax({
url: url,
type: 'PUT',
data: {
_token: '{{ csrf_token() }}'
},
success: function (response) {
Swal.fire('Waiver Completed Successfully !', response.data , 'success');
setTimeout(function () {
location.reload();
}, 3000);
}
});
}
});
}

function _deleteAlert(url){
Swal.fire({
title: `Delete this Gym Entry ?`,
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
Swal.fire('Deleted!', response.data , 'success');
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
