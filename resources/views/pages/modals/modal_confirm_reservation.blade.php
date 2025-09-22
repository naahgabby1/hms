<section>
<div class="modal fade" id="confirmationModal{{ $reservation->id }}" tabindex="-1" aria-labelledby="personalModalLabel"
aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
<div class="modal-dialog modal-xl">
<div class="modal-content">
<form action="{{ route('confirmation.reservation', $reservation->id) }}" method="post">
@csrf
@method('PUT')
<div class="modal-header">
<h5 class="modal-title" id="cusresModalUpdatesLabel">
Reservation Confirmation Page
</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<!-- Row starts -->
<div class="row gx-3">
<div class="col-sm-12">
<div class="card mb-3">
<div class="card-body">

<div class="d-flex ">
<!-- Stats starts -->
<div class="d-flex align-items-center flex-wrap gap-4">
<div class="d-flex align-items-center">
<div class="icon-box lg bg-primary rounded-5 me-2">
<i class="ri-account-circle-line fs-3"></i>
</div>
<div>
<h4 class="mb-1">{{ $reservation->name }}</h4>
<p class="m-0">Visitor / Customer</p>
</div>
</div>

<div class="d-flex align-items-center">
<div class="icon-box lg bg-primary rounded-5 me-2">
<i class="ri-contrast-drop-2-line fs-3"></i>
</div>
<div>
<h4 class="mb-1">{{ $reservation->mobile_number }}</h4>
<p class="m-0">Phone Number</p>
</div>
</div>
<div class="d-flex align-items-center">
<div class="icon-box lg bg-secondary rounded-5 me-2">
<i class="ri-stethoscope-line fs-3 text-body"></i>
</div>
<div>
<h4 class="mb-1">{{ $reservation->date_entered }}</h4>
<p class="m-0">Date of Reservation</p>
</div>
</div>
</div>
<!-- Stats ends -->

<img src="{{asset('app_assets/assets/logo/logo.jpg')}}" class="img-7x ms-auto" alt="Logo">
</div>
</div>
</div>
</div>
</div>
<div class="row gx-3">
<div class="col-xxl-12 col-sm-12 col-12">
<div class="card mb-3">
<div class="card-body">
<div class="row">
<div class="col-xxl-4 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="a3">Country<span class="text-danger"></span></label>
<input type="text" value="{{ $reservation->country !='' ? $reservation->country : '-'}}" class="form-control text-uppercase" id="email_address" name="email_address" readonly>
@error('email_address')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-4 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="a3">Payment<span class="text-danger"></span></label>
<input type="text" value="{{ $reservation->res_payment !='' ? $reservation->res_payment : '0.00'}}" class="form-control" id="payments" name="payments">
@error('payments')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-4 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="address">Occupancy <span class="text-danger">*</span></label>
<select class="form-select" id="occupancy" name="occupancy">
<option value="1">Single</option>
<option value="2">Double</option>
</select>
@error('occupancy')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
Cancel
</button>
<button type="submit" class="btn btn-primary">
Save Changes
</button>
</div>
</form>
</div>
</div>
</div>
</section>
