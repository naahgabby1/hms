@extends('layout.main.index')

@push('breadcrumbs')
<ol class="breadcrumb">
<li class="breadcrumb-item">
<i class="ri-home-8-line lh-1 pe-3 me-3 border-end"></i>
<a href="{{route('house.keepings.dashboard')}}">Dashboard</a>
</li>
<li class="breadcrumb-item text-primary" aria-current="page">
{{$breadCrumbs}}
</li>
</ol>
@endpush

@push('breadcrumbs_right')
<div class="ms-auto d-lg-flex d-none flex-row">
<div class="d-flex flex-row gap-1 day-sorting">

</div>
</div>
@endpush

@push('page_head')
<div class="row gx-3">
<div class="col-xxl-12 col-sm-12">

</div>
</div>
@endpush


@push('page_head2')
<div class="row gx-3">
<div class="col-12">

</div>
</div>
<div class="row gx-3">

</div>
@endpush



@section('main_content_body')
<div class="row gx-3">
<div class="col-12 d-flex justify-content-center align-items-center" style="min-height: 500px;">
<span class="text-muted text-uppercase" style="font-family: monospace;">
Under Construction... Come Back soon
</span>
</div>
</div>
@endsection
