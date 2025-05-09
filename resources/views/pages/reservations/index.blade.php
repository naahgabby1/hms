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
<h2 class="lh-1">8</h2>
<p class="m-0">Check-ins Today</p>
</div>
</div>
<div class="d-flex align-items-end justify-content-between mt-1">
<a class="text-success" href="{{route('dashboard')}}">
<span>View All</span>
<i class="ri-arrow-right-line text-success ms-1"></i>
</a>
<div class="text-end">
<p class="mb-0 text-success">+40%</p>
<span class="badge bg-success-subtle text-success small">this month</span>
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
<h2 class="lh-1">360</h2>
<p class="m-0">Check-outs Today</p>
</div>
</div>
<div class="d-flex align-items-end justify-content-between mt-1">
<a class="text-primary" href="javascript:void(0);">
<span>View All</span>
<i class="ri-arrow-right-line ms-1"></i>
</a>
<div class="text-end">
<p class="mb-0 text-primary">+30%</p>
<span class="badge bg-primary-subtle text-primary small">this month</span>
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
<h2 class="lh-1">980</h2>
<p class="m-0">Today's Revenue</p>
</div>
</div>
<div class="d-flex align-items-end justify-content-between mt-1">
<a class="text-danger" href="javascript:void(0);">
<span>View All</span>
<i class="ri-arrow-right-line ms-1"></i>
</a>
<div class="text-end">
<p class="mb-0 text-danger">+60%</p>
<span class="badge bg-danger-subtle text-danger small">this month</span>
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
<i class="ri-money-dollar-circle-line fs-4 text-warning"></i>
</div>
</div>
<div class="d-flex flex-column">
<h2 class="lh-1">$98000</h2>
<p class="m-0">Pending Payments</p>
</div>
</div>
<div class="d-flex align-items-end justify-content-between mt-1">
<a class="text-warning" href="javascript:void(0);">
<span>View All</span>
<i class="ri-arrow-right-line ms-1"></i>
</a>
<div class="text-end">
<p class="mb-0 text-warning">+20%</p>
<span class="badge bg-warning-subtle text-warning small">this month</span>
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
Add New Reservation
</button>
</div>
</div>

@include('pages.modals.modal_reservation')

<div class="row gx-3">
<div class="col-sm-12">
<!-- Card start -->
<div class="card">
<div class="card-header">
{{-- <h5 class="card-title">Summary</h5> --}}
</div>
<div class="card-body">

<!-- Table start -->
<div class="table-responsive">
<table id="customButtons" class="table m-0 align-middle">
<thead>
<tr>
<th>#</th>
<th>Product</th>
<th>Dealer</th>
<th>Department</th>
<th>Purchase Date</th>
<th>Payment</th>
<th>Amount</th>
<th>Status</th>
</tr>
</thead>
<tbody>
<tr>
<td>1</td>
<td>PicoPlus</td>
<td>Jamaal Calhoun</td>
<td>Anatomy</td>
<td>08/05/2024</td>
<td>PayPal</td>
<td>$9980.00</td>
<td><span class="badge bg-success">Approved</span></td>
</tr>
<tr>
<td>2</td>
<td>Excel V</td>
<td>Holly Brock</td>
<td>Neurology</td>
<td>12/05/2024</td>
<td>Credit Card</td>
<td>$4678.00</td>
<td><span class="badge bg-warning">Pending</span></td>
</tr>
<tr>
<td>3</td>
<td>Plasmage</td>
<td>Leona Francis</td>
<td>Orthopedics</td>
<td>17/05/2024</td>
<td>Cheque</td>
<td>$5690.00</td>
<td><span class="badge bg-danger">Rejected</span></td>
</tr>
<tr>
<td>4</td>
<td>Spectra</td>
<td>Noah Terrell</td>
<td>Cardiology</td>
<td>23/05/2024</td>
<td>PayPal</td>
<td>$7690.00</td>
<td><span class="badge bg-dark">New</span></td>
</tr>
<tr>
<td>5</td>
<td>Ultherapy</td>
<td>Tisha Lin</td>
<td>Neurology</td>
<td>19/05/2024</td>
<td>Cheque</td>
<td>$3470.00</td>
<td><span class="badge bg-success">Approved</span></td>
</tr>
<tr>
<td>6</td>
<td>Ballancer</td>
<td>Vance Schultz</td>
<td>Anatomy</td>
<td>30/05/2024</td>
<td>Debit Card</td>
<td>$8789.00</td>
<td><span class="badge bg-warning">Pending</span></td>
</tr>
<tr>
<td>7</td>
<td>Plasmage</td>
<td>Millard Perkins</td>
<td>Gastroenterology</td>
<td>29/05/2024</td>
<td>Credit Card</td>
<td>$3490.00</td>
<td><span class="badge bg-success">Approved</span></td>
</tr>
</tbody>
</table>
</div>
<!-- Table end -->

</div>
</div>
<!-- Card end -->

</div>
</div>
@endsection
