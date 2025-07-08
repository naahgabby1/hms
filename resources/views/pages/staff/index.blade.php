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
<div class="p-2 border border-success rounded-circle me-3">
<div class="icon-box md bg-success-subtle rounded-5">
<i class="ri-user-line fs-4 text-primary"></i>
</div>
</div>
<div class="d-flex flex-column">
<h2 class="lh-1">{{ number_format($Staff_data->count())}}</h2>
<p class="m-0">Active Staff Count</p>
</div>
</div>
<div class="d-flex align-items-end justify-content-between mt-1">
<i class="ri-arrow-right-line text-success ms-1"></i>
<div class="text-end">
<span class="badge bg-success-subtle text-success small">Registered Active Staff</span>
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
<h2 class="lh-1">{{ number_format($Staff_archived) }}</h2>
<p class="m-0">Archive Staff Count</p>
</div>
</div>
<div class="d-flex align-items-end justify-content-between mt-1">
<a class="text-danger" href="#">
<i class="ri-arrow-right-line ms-1"></i>
</a>
<div class="text-end">
<span class="badge bg-danger-subtle text-danger small">Registered Staff Archived</span>
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
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staffModal">
Register New Staff
</button>
</div>
</div>
@include('pages.modals.modal_staff')
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
<th>Staff Name</th>
<th>Phone number</th>
<th>Contact Person</th>
<th>Contact Person Number</th>
<th>Action</th>
</tr>
</thead>
<tbody>
@php
use Carbon\Carbon;
$nx=1;
$duration=0;
@endphp
@foreach ($Staff_data as $staff)
<tr>
<td>{{ $nx }}</td>
<td>{{ $staff->first_name }} {{$staff->last_name }}</td>
<td>{{ $staff->phone_number }}</td>

<td>{{ $staff->emergency_contact_name }}</td>
<td>{{ $staff->emergency_contact_number }}</td>
<td>
<form action="{{ route('delete.staff', $staff->id) }}" method="POST">
@csrf
@method('DELETE')
<button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
data-bs-target="#staffEditModal{{$staff->id}}">
<i class="ri-edit-line"></i>
</button>
<button type="button" data-mastername="{{$staff->first_name.' '.$staff->last_name}}" id="delClicked" class="btn btn-danger btn-sm">
<i class="ri-delete-bin-line"></i>
</button>
</form>
</td>
</tr>
@php
$nx++;
@endphp
@include('pages.modals.modal_staff_edit')
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


$(document).on('click','#delClicked',function(){
const form = this.closest('form');
let mastername = $(this).data('mastername');
_alert(mastername,form);
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
