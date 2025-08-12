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
{{-- <button class="btn btn-sm">7d</button>
<button class="btn btn-sm">2w</button>
<button class="btn btn-sm">1m</button>
<button class="btn btn-sm">3m</button>
<button class="btn btn-sm">6m</button>
<button class="btn btn-sm">1y</button> --}}
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
<div class="p-2 border border-primary rounded-circle me-3">
<div class="icon-box md bg-danger-subtle rounded-5">
<i class="ri-home-line fs-4 text-primary"></i>
</div>
</div>
<div class="d-flex flex-column">
<h2 class="lh-1">{{ $Selected_room->count(); }}</h2>
<p class="m-0">Rooms</p>
</div>
</div>
<div class="d-flex align-items-end justify-content-between mt-1">
<a class="text-danger" href="javascript:void(0);">
<i class="ri-arrow-right-line ms-1"></i>
</a>
<div class="text-end">
{{-- <p class="mb-0 text-success">Registered Rooms </p> --}}
<span class="badge bg-danger-subtle text-danger small">Registered Rooms</span>
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
<div class="icon-box md bg-warning-subtle rounded-5">
<i class="ri-home-line fs-4 text-primary"></i>
</div>
</div>
<div class="d-flex flex-column">
<h2 class="lh-1">{{ $RoomType->count(); }}</h2>
<p class="m-0">Room Types</p>
</div>
</div>
<div class="d-flex align-items-end justify-content-between mt-1">
<a class="text-warning" href="javascript:void(0);">
<i class="ri-arrow-right-line ms-1"></i>
</a>
<div class="text-end">
{{-- <p class="mb-0 text-success">Registered Room Types</p> --}}
<span class="badge bg-warning-subtle text-warning small">Registered Room Types</span>
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
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#roomsModal">
New Room Entry
</button>
</div>
</div>
@include('pages.modals.modal_rooms')
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
<th>Room Description</th>
<th>Room Type</th>
<th>Rate - Single</th>
<th>Rate - Double</th>
<th><center>Status</center></th>
<th><center>Action</center></th>
</tr>
</thead>
<tbody>
@php
$num=1;
@endphp
@foreach ($Selected_room as $rooms)
<tr>
<td>{{ $num }}</td>
<td>{{ $rooms->description }}</td>
<td>{{ $rooms->rooms_type_name->description }}</td>
<td>{{ $rooms->fee }}</td>
<td>{{ $rooms->fee_double }}</td>
<td>
@if ($rooms->availability==1)
<center><span class="badge bg-danger">Room occupied</span></center>
@else
<center><span class="badge bg-success">Room available</span></center>
@endif
</td>
<td>
<center>
<button type="button" class="btn btn-info btn-block btn-sm" data-bs-toggle="modal"
data-bs-target="#roomsEditedModal{{$rooms->id}}">
<i class="ri-edit-line"></i>
</button>
</center>
</td>
</tr>
@php
$num++;
@endphp
@include('pages.modals.modal_rooms_edited')
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

</script>
@endpush
