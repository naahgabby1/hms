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

<img src="{{asset('app_assets/assets/images/logo.jpg')}}" class="img-7x rounded-circle ms-auto"
alt="Patient Admin Template">
</div>
</div>
</div>
</div>
</div>
<!-- Row ends -->

<!-- Row starts -->
<div class="row gx-3">
<div class="col-xxl-3 col-sm-6 col-12">
<div class="card mb-3">
<div class="card-body">
<div class="text-center">
<div class="icon-box md bg-danger rounded-5 m-auto">
<i class="ri-capsule-line fs-3"></i>
</div>
<div class="mt-3">
<h5>BP Levels</h5>
<p class="m-0 opacity-50">Recent five visits</p>
</div>
</div>
<div id="bpLevels"></div>
<ul class="list-group">
<li class="list-group-item d-flex justify-content-between align-items-center">
<div>24/04/2024</div>
<div>140</div>
</li>
<li class="list-group-item d-flex justify-content-between align-items-center">
<div>16/04/2024</div>
<div>190</div>
</li>
<li class="list-group-item d-flex justify-content-between align-items-center">
<div>10/04/2024</div>
<div>230</div>
</li>
</ul>
</div>
</div>
</div>
<div class="col-xxl-3 col-sm-6 col-12">
<div class="card mb-3">
<div class="card-body">
<div class="text-center">
<div class="icon-box md bg-info rounded-5 m-auto">
<i class="ri-contrast-drop-2-line fs-3"></i>
</div>
<div class="mt-3">
<h5>Sugar Levels</h5>
<p class="m-0 opacity-50">Recent five visits</p>
</div>
</div>
<div id="sugarLevels"></div>
<ul class="list-group">
<li class="list-group-item d-flex justify-content-between align-items-center">
<div>24/04/2024</div>
<div>140</div>
</li>
<li class="list-group-item d-flex justify-content-between align-items-center">
<div>16/04/2024</div>
<div>190</div>
</li>
<li class="list-group-item d-flex justify-content-between align-items-center">
<div>10/04/2024</div>
<div>230</div>
</li>
</ul>
</div>
</div>
</div>
<div class="col-xxl-3 col-sm-6 col-12">
<div class="card mb-3">
<div class="card-body">
<div class="text-center">
<div class="icon-box md bg-success rounded-5 m-auto">
<i class="ri-heart-pulse-line fs-3"></i>
</div>
<div class="mt-3">
<h5>Heart Rate</h5>
<p class="m-0 opacity-50">Recent five visits</p>
</div>
</div>
<div id="heartRate"></div>
<ul class="list-group">
<li class="list-group-item d-flex justify-content-between align-items-center">
<div>24/04/2024</div>
<div>110</div>
</li>
<li class="list-group-item d-flex justify-content-between align-items-center">
<div>16/04/2024</div>
<div>120</div>
</li>
<li class="list-group-item d-flex justify-content-between align-items-center">
<div>10/04/2024</div>
<div>100</div>
</li>
</ul>
</div>
</div>
</div>
<div class="col-xxl-3 col-sm-6 col-12">
<div class="card mb-3">
<div class="card-body">
<div class="text-center">
<div class="icon-box md bg-warning rounded-5 m-auto">
<i class="ri-flask-line fs-3"></i>
</div>
<div class="mt-3">
<h5>Clolesterol</h5>
<p class="m-0 opacity-50">Recent five visits</p>
</div>
</div>
<div id="clolesterolLevels"></div>
<ul class="list-group">
<li class="list-group-item d-flex justify-content-between align-items-center">
<div>24/04/2024</div>
<div>180</div>
</li>
<li class="list-group-item d-flex justify-content-between align-items-center">
<div>16/04/2024</div>
<div>220</div>
</li>
<li class="list-group-item d-flex justify-content-between align-items-center">
<div>10/04/2024</div>
<div>230</div>
</li>
</ul>
</div>
</div>
</div>
</div>
<!-- Row ends -->


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
