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
<div class="col-xl-3 col-sm-6 col-12"></div>
<div class="col-xl-3 col-sm-6 col-12"></div>
<div class="col-xl-3 col-sm-6 col-12">
<div class="card mb-3">
<div class="card-body">
<div class="d-flex align-items-center">
<div class="p-2 border border-success rounded-circle me-3">
<div class="icon-box md bg-danger-subtle rounded-5">
<i class="ri-user-star-line fs-4 text-info"></i>
</div>
</div>
<div class="d-flex flex-column">
<h2 class="lh-1">{{ $Allusers->count() }}</h2>
<p class="m-0">Registered Users</p>
</div>
</div>
<div class="d-flex align-items-end justify-content-between mt-1">
<a class="text-danger" href="javascript:void(0);">
<i class="ri-arrow-right-line ms-1"></i>
</a>
<div class="text-end">
<p class="mb-0 text-danger">Registered Users</p>
<span class="badge bg-danger-subtle text-danger small">As at now</span>
</div>
</div>
</div>
</div>
</div>
<div class="col-xl-3 col-sm-6 col-12">
<div class="card mb-3">
<div class="card-body">
<div class="d-flex align-items-center">
<div class="p-2 border border-success rounded-circle me-3">
<div class="icon-box md bg-warning-subtle rounded-5">
<i class="ri-group-line fs-4 text-warning"></i>
</div>
</div>
<div class="d-flex flex-column">
<h2 class="lh-1">{{ $RoleType->count() }}</h2>
<p class="m-0">Registered User Group</p>
</div>
</div>
<div class="d-flex align-items-end justify-content-between mt-1">
<a class="text-warning" href="javascript:void(0);">
<i class="ri-arrow-right-line ms-1"></i>
</a>
<div class="text-end">
<p class="mb-0 text-warning">User Group Category</p>
<span class="badge bg-warning-subtle text-warning small">As at now</span>
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
data-bs-target="#usersModal">
New User
</button>
</div>
</div>
@include('pages.modals.modal_users')
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
<th>Role</th>
<th>Date Resgistered</th>
<th><center>Status</center></th>
<th><center>Action</center></th>
</tr>
</thead>
<tbody>
@php
$num=1;
@endphp
@foreach ($Allusers as $users)
<tr>
<td>{{ $num }}</td>
<td>{{ $users->user_name }}</td>
<td>{{ $users->role_description }}</td>
<td>{{ $users->created_at }}</td>
<td>
<center>
@if ($users->status==0)
<span class="badge bg-success">Active user</span>
@else
<span class="badge bg-danger">Blocked user</span>
@endif
</center>
</td>
<td>
<center>
<button type="button" class="btn btn-info" data-bs-toggle="modal"
data-bs-target="#usersEditModal{{$users->id}}">
<i class="ri-edit-line"></i>
</button>
@if ($delete_permission==1)
<button class="btn btn-danger userDeletes"
data-id="{{ $users->id }}"
data-url="{{ route('delete.users', $users->id) }}"
data-name="{{ $users->first_name }}">
<i class="ri-delete-bin-line"></i>
</button>
@endif


</center>
</td>
</tr>
@php
$num++;
@endphp
@include('pages.modals.modal_users_edits')
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

$(document).on('click','.userDeletes',function(){
const url = $(this).data('url');
const name = $(this).data('name');
_deleteAlert(name,url);
});




function _deleteAlert(name,url){
Swal.fire({
title: `Delete ${name}?`,
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
