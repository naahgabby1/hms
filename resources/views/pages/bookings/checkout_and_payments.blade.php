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

@endpush
@php
$sub2=0;
$sub1=0;
use Carbon\Carbon;
$duration=0;
$binary_sum = array();
$duration = Carbon::parse($checkoutdata->date_from)->diffInDays(Carbon::parse($checkoutdata->date_to));
$dateToCheck = Carbon::parse($checkoutdata->date_to);
$today = Carbon::today();
if ($dateToCheck->isSameDay($today)) {
if (Carbon::now()->gt(Carbon::today()->addHours(12))) {
$duration = $duration+1;
}
}
@endphp
@section('main_content_body')
<div class="row">
<div class="col-xl-12">
<div class="card">
<div class="card-body">
<div class="row">
<div class="col-xxl-3 col-sm-3 col-12">
<img src="{{asset('app_assets/assets/images/logo-dark.svg')}}" alt="Bootstrap Admin Dashboard" class="img-fluid">
</div>
<div class="col-sm-9 col-12">
<div class="text-end">
<p class="mb-2">
Invoice - <span class="text-danger">{{ $CodeChex }}</span>
</p>
<p class="mb-2">{{Carbon::parse(now())->format('d-M-Y')}}</p>
<span class="badge bg-success">Receipt</span>
</div>
</div>
<div class="col-12 mb-5"></div>
</div>
<div class="row justify-content-between">
<div class="col-lg-6 col-12">
<h6 class="fw-semibold">Billed To :</h6>
<p class="m-0">
{{$checkoutdata->name}},<br>
{{$checkoutdata->address}},<br>
{{$checkoutdata->country}}
</p>
</div>
<div class="col-lg-6 col-12">
<div class="text-end">
<h6 class="fw-semibold">Quabenya Hills Resort :</h6>
<p class="text-end m-0">
Kwabennya Hills, Accra. <br>
Ghana West-Africa
</p>
</div>
</div>
<div class="col-12 mb-3"></div>
</div>
<!-- Row end -->

<!-- Row start -->
<div class="row">
<div class="col-12">
<div class="table-responsive">
<table class="table table-bordered">
<thead>
<tr>
<th>Description</th>
<th>Rate</th>
<th>Duration (Days)</th>
<th>Amount</th>
</tr>
</thead>
<tbody>
<tr>
<td>
<h6>Hotel-Guest House Occupancy Charges</h6>
<p>
Charges for nights spent in our Hotel/Guest house for a period of days
</p>
</td>
<td>
<h6>
{{ $checkoutdata->occupancy == 1 ? number_format($checkoutdata->fees,2) : number_format($checkoutdata->fees_double,2) }}<br>
@foreach ($checkoutdata->multiple_customers_fromview as $customer)
{{ $customer->occupancy == 1 ? number_format($customer->fee,2) : number_format($customer->fee_double,2) }}<br>
@endforeach
</h6>
</td>
<td>
<h6>{{ $duration }}<br>
@foreach ($checkoutdata->multiple_customers_fromview as $customer)
{{ $duration }}<br>
@endforeach
</h6>
</td>
<td>
<h6>{{ number_format($duration*$checkoutdata->fees,2) }}<br>
@foreach ($checkoutdata->multiple_customers_fromview as $customer)
@php
$binary_sum[] = $duration*($customer->occupancy == 1 ? $customer->fee : $customer->fee_double);
@endphp
{{ number_format($duration*($customer->occupancy == 1 ? $customer->fee : $customer->fee_double),2) }}<br>
@endforeach
</h6>
</td>
</tr>
<tr>
<td colspan="2">&nbsp;</td>
<td>
<p>Subtotal</p>
<p>Discount</p>
<p>VAT</p>
<h5 class="mt-4 text-primary">Total GHS</h5>
</td>
<td>
@php $sub2 = $duration * $checkoutdata->multiple_customers_fromview->sum('fee');
$msum = array_sum($binary_sum);
$sub1 = $checkoutdata->occupancy == 1 ? ($duration * $checkoutdata->fees) : ($duration * $checkoutdata->fees_double);
$subtotal = $sub1 + $msum;
$discount = $vat_discounted->discount_amount * $subtotal;
$vat = $vat_discounted->vat_amount * $subtotal;
$final_amount = $subtotal - ($discount + $vat);
@endphp
<p>{{ number_format($subtotal,2) }}</p>
<p>{{ number_format($discount,2) }}</p>
<p>{{ number_format($vat,2) }}</p>
<h5 class="mt-4 text-primary">{{ number_format($final_amount,2) }}</h5>
</td>
</tr>
<tr>
<td colspan="4">
<h6 class="text-danger">NOTICE</h6>
<span class="small m-0 justify-content-start">
We really appreciate your business with Quabenya Hills Resort. Hope to see you again.
</span>
<span class="d-flex justify-content-end">
<form action="{{ route('partpayment.save') }}" method="POST">
@csrf
@method('POST')
<div class="input-group">
<input type="hidden" value="{{ $checkoutdata->id }}" name="hiddenmastercode">
<input type="text" class="form-control" id="abc16" placeholder="Enter Payments" name="part_payments">
<button type="submit" class="btn btn-success btn-sm" type="button">
Enter Part Payment
</button>
</div>
</form>
</span>
</td>
</tr>
<tr>
<td colspan="6"></td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12 col-12">
<div class="d-flex justify-content-start gap-2">

</div>



<div class="d-flex justify-content-end gap-2">


<a href="{{ route('booking') }}" class="btn btn-danger btn-sm">Cancel Payments & Checkout</a>
@php
if ($chex==1) {
$dex = 'Hotel/Gueshouse payments';
$cat = 1;
}

@endphp
<form action="{{ route('checkout.save') }}" method="POST">
@csrf
<input type="hidden" name="code" value="{{ $CodeChex }}">
<input type="hidden" name="payment_cat" value="{{ $cat }}">
<input type="hidden" name="mdays" value="{{ $duration }}">
<input type="hidden" name="vat" value="{{ $vat }}">
<input type="hidden" name="discount" value="{{ $discount }}">
<input type="hidden" name="description" value="{{ $dex }}">
<input type="hidden" name="amount" value="{{ $final_amount }}">
<input type="hidden" name="transaction_code" value="{{ $checkoutdata->id }}">
<button type="submit" class="btn btn-primary btn-sm">
Confirm Payment & Checkout
</button>
</form>
</div>
</div>
</div>
<!-- Row end -->
</div>
</div>
</div>
</div>
@endsection
