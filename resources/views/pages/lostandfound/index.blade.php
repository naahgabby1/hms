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
<div class="col-xl-3 col-sm-6 col-12">
<div class="card mb-3">
<div class="card-body">
<div class="d-flex align-items-center">
<div class="p-2 border border-success rounded-circle me-3">
<div class="icon-box md bg-success-subtle rounded-5">
<i class="ri-star-smile-line fs-4 text-success"></i>
</div>
</div>
<div class="d-flex flex-column">
<h2 class="lh-1">{{ number_format($LostData->count()); }}</h2>
<p class="m-0">Lost & Found Counts</p>
</div>
</div>
<div class="d-flex align-items-end justify-content-between mt-1">
<a class="text-success" href="#">
{{-- <span>View All</span> --}}
<i class="ri-arrow-right-line text-success ms-1"></i>
</a>
<div class="text-end">
{{-- <p class="mb-0 text-success">Registered Lost Items</p> --}}
<span class="badge bg-success-subtle text-success small">Registered Lost Items</span>
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
<i class="ri-star-smile-line fs-4 text-primary"></i>
</div>
</div>
<div class="d-flex flex-column">
<h2 class="lh-1">{{ $LostData->where('status', 1)->count() }}</h2>
<p class="m-0">Retrivals</p>
</div>
</div>
<div class="d-flex align-items-end justify-content-between mt-1">
<a class="text-primary" href="#">
{{-- <span>View All</span> --}}
<i class="ri-arrow-right-line ms-1"></i>
</a>
<div class="text-end">
{{-- <p class="mb-0 text-primary">Lost Items Retrieved</p> --}}
<span class="badge bg-primary-subtle text-primary small">Lost Items Retrieved</span>
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
<i class="ri-star-smile-line fs-4 text-danger"></i>
</div>
</div>
<div class="d-flex flex-column">
<h2 class="lh-1">{{ $LostData->where('status', 0)->count(); }}</h2>
<p class="m-0">Pending Retrievals</p>
</div>
</div>
<div class="d-flex align-items-end justify-content-between mt-1">
<a class="text-danger" href="#">
{{-- <span>View All</span> --}}
<i class="ri-arrow-right-line ms-1"></i>
</a>
<div class="text-end">
{{-- <p class="mb-0 text-danger">Lost Items Retrieved</p> --}}
<span class="badge bg-danger-subtle text-danger small">Lost Items Retrieved</span>
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
data-bs-target="#lostandfoundModal">
<span>Lost Item Entry</span>
</button>
</div>
</div>
@include('pages.modals.modal_lostandfound')
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
<th>Description</th>
<th>Area</th>
<th>Location</th>
<th>Quantity</th>
<th>Found By</th>
<th>Status</th>
<th>Date</th>
<th><center>Action</center></th>
</tr>
</thead>
<tbody>
@php
$num=1;
@endphp
@foreach ($LostData->where('status', 0) as $lost_data)
<tr>
<td>{{ $num }}</td>
<td>{{ $lost_data->item_description }}</td>
<td>{{ $lost_data->lostarea }}</td>
<td>{{ $lost_data->area_room_found }}</td>
<td>{{ $lost_data->itemqty }}</td>
<td>{{ $lost_data->found_by }}</td>
<td>
<center>
@if ($lost_data->status==0)
<span class="badge bg-success">Pending Retrieval</span>
@else
<span class="badge bg-danger">Delivered to User</span>
@endif
</center>
</td>
<td>{{ $lost_data->date_time }}</td>
<td>
<center>
<button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
data-bs-target="#RetrievalModal{{$lost_data->id}}">
<i class="ri-secure-payment-line"></i>
</button>
@if ($delete_permission==1)
<button class="btn btn-danger btn-sm userDeletes"
data-id="{{ $lost_data->id }}"
data-url="{{ route('lost.and.found.destroy', $lost_data->id) }}">
<i class="ri-delete-bin-line"></i>
</button>
@endif


</center>
</td>
</tr>
@php
$num++;
@endphp
@include('pages.modals.modal_retrievals')
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
$('#hideShowOld').show();
$('#hideShowOld_compound').hide();

$('#customer_type').change(function() {
var selected = $(this).val();
if (selected === '1') {
$('#hideShowOld_compound').show();
$('#hideShowOld').hide();
} else {
$('#hideShowOld').show();
$('#hideShowOld_compound').hide();
}
});

$(document).on('click','.userDeletes',function(){
const url = $(this).data('url');
_deleteAlert(url);
});





function _deleteAlert(url){
Swal.fire({
title: `Delete this lost & found Entry ?`,
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
