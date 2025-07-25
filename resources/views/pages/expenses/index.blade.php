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
<i class="ri-archive-drawer-line fs-4 text-success"></i>
</div>
</div>
<div class="d-flex flex-column">
<h2 class="lh-1">{{ number_format(count($expenses_type)) }}</h2>
<p class="m-0">Expenses Categories</p>
</div>
</div>
<div class="d-flex align-items-end justify-content-between mt-1">
<a class="text-danger" href="#">
{{-- <span>View All</span> --}}
<i class="ri-arrow-right-line ms-1"></i>
</a>
<div class="text-end">
{{-- <p class="mb-0 text-danger">+60%</p> --}}
<span class="badge bg-danger-subtle text-danger small">Expenses Category</span>
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
<i class="ri-cash-line fs-4 text-warning"></i>
</div>
</div>
<div class="d-flex flex-column">
<h2 class="lh-1">{{ number_format($expenses_captured,2) }}</h2>
<p class="m-0">Expenses Captured</p>
</div>
</div>
<div class="d-flex align-items-end justify-content-between mt-1">
<a class="text-warning" href="#">
{{-- <span>View All</span> --}}
<i class="ri-arrow-right-line ms-1"></i>
</a>
<div class="text-end">
{{-- <p class="mb-0 text-warning">+20%</p> --}}
<span class="badge bg-warning-subtle text-warning small">Total Expenses</span>
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
data-bs-target="#enterExpenseModal">
New Expenses
</button>
</div>
</div>
@include('pages.modals.modal_expensescapture')
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
<th>Expenses</th>
<th>Amount</th>
<th>Date Captured</th>
<th><center>Action</center></th>
</tr>
</thead>
<tbody>
@php
use Carbon\Carbon;
$nx=1;
$duration=0;
@endphp
@foreach ($expenses_data as $expenses)
<tr>
<td>{{ $nx }}</td>
<td>{{ $expenses->expenses_type }}</td>
<td>{{ $expenses->amount }}</td>
@php
$today = Carbon::today();
@endphp
<td>{{ Carbon::parse($expenses->date_time)->format('d-M-Y') }}</td>
<td><center>
<form action="{{ route('delete.expenses', $expenses->id) }}" method="POST">
@csrf
@method('DELETE')
<button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
data-bs-target="#expensesEditModal{{$expenses->id}}">
<i class="ri-edit-line"></i>
</button>
@if ($delete_permission==1)
<button type="button" id="delClicked" class="btn btn-danger btn-sm">
<i class="ri-delete-bin-line"></i>
</button>
@endif



</form>
</center>
</td>
</tr>
@php
$nx++;
@endphp
@include('pages.modals.modal_expensescapture_edit')
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
_alert('This Expenses',form);
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
