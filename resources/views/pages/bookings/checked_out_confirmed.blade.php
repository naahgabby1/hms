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

@section('main_content_body')
<div class="row gx-3">
    <div class="col-xl-12 col-lg-12">
      <div class="card mb-3">
        <div class="card-header">
          <h5 class="card-title">Confirmation...!!!</h5>
        </div>
        <div class="card-body">
          <div class="alert py-2 d-flex align-items-center justify-content-between bg-success text-white">
            CHECK-OUT PROCESS COMPLETED SUCCESSFULLY.
            {{-- <a href="{{ route('receipt.show') }}" class="btn btn-danger">Click To Print</a> --}}
          </div>
          <div class="alert py-2 text-dark d-flex align-items-center justify-content-between bg-secondary">
            Click button to print / go back to booking.
            <div>

<form action="{{ route('receipt.show') }}" method="POST">
    @csrf
<input type="hidden" name="mid" value="{{ $mid }}">
<a href="{{ route('booking') }}" class="btn btn-danger">Cancel</a>
<button type="submit" class="btn btn-success">Print</button>
</form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
