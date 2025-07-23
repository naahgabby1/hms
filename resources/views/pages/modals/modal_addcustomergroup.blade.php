<section>
<div class="modal fade" id="addCustomerClicked{{$book->id}}" tabindex="-1" aria-labelledby="cusModalLabel"
aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
<div class="modal-dialog modal-lg">
<div class="modal-content shadow-lg border-0">

<form action="{{ route('save.extra.customer') }}" method="post">
@csrf
@method('POST')

<!-- Modal Header -->
<div class="modal-header bg-primary text-white">
<h5 class="modal-title" id="cusModalLabel">Multiple Booking Additions</h5>
<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<!-- Modal Body -->
<div class="modal-body bg-light">
<!-- Main Customer Name and Duration -->
<div class="row gx-3">
<div class="col-12">
<div class="mb-3">
<label class="form-label fw-bold text-primary">Main Customer / Visitor</label>
<div class="d-flex justify-content-between border rounded p-2 bg-white shadow-sm">
<span class="text-dark fw-semibold">{{ strtoupper($book->name) }}</span>
<span class="badge bg-info text-dark">{{ strtoupper('DURATION : '.$actual_duration.' DAYS') }}</span>
</div>
</div>
</div>
</div>

<!-- Form Fields -->
<div class="row gx-3">
<!-- First Name -->
<div class="col-xxl-4 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label text-primary">First Name <span class="text-danger">*</span></label>
<input type="text" class="form-control first_name_multiple" placeholder="Enter First Name">
</div>
</div>

<!-- Last Name -->
<div class="col-xxl-4 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label text-primary">Last Name <span class="text-danger">*</span></label>
<input type="text" class="form-control last_names_multiple" placeholder="Enter Last Name">
</div>
</div>

<!-- Gender -->
<div class="col-xxl-4 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label text-primary">Gender <span class="text-danger">*</span></label><br>
<div class="form-check form-check-inline">
<input class="form-check-input gender_multiple" type="radio" name="gender_multiple{{$book->id}}" value="male">
<label class="form-check-label">Male</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input gender_multiple" type="radio" name="gender_multiple{{$book->id}}" value="female">
<label class="form-check-label">Female</label>
</div>
</div>
</div>

<!-- Phone Number -->
<div class="col-xxl-4 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label text-primary">Mobile Number <span class="text-danger">*</span></label>
<input type="text" class="form-control phone_number_multiple" placeholder="Enter Mobile Number">
<input type="hidden" class="form-control booking_id" name="booking_id" id="booking_id" value="{{ $book->id }}">
</div>
</div>

<!-- Room Type -->
<div class="col-xxl-4 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label text-primary">Room Type <span class="text-danger">*</span></label>
<select class="form-select room_type_multiple" id="room_type_multiple" name="room_type_multiple">
<option value="">Select</option>
@foreach($RoomType as $roomtype)
<option value="{{ $roomtype->id }}">{{ $roomtype->description.' ('.strtoupper($roomtype->alias).')' }}</option>
@endforeach
</select>
@error('room_type_multiple')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>

<!-- Room -->
<div class="col-xxl-4 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label text-primary">Select Room <span class="text-danger">*</span></label>
<select class="form-select room_multiple" id="room_multiple" name="room_multiple">
<option value="">Select Available Room</option>
</select>
@error('room_multiple')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>

<!-- Add Button -->
<div class="col-xxl-8 col-lg-8 col-sm-6">
<div class="mb-3">
<label class="form-label text-primary">Occupancy</label>
<select class="form-select" id="occupancy" name="occupancy">
<option value="1">Single</option>
<option value="2">Double</option>
</select>
@error('occupancy')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>

<div class="col-xxl-4 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label text-primary"><center>Click to Add</center></label>
<button type="button" class="btn btn-success col-12 btnAddMultiple" data-book-id="{{ $book->id }}">
<i class="ri-user-add-line me-1"></i> ADD
</button>
</div>
</div>

<!-- Preview List -->
<div class="col-12">
<label class="form-label text-primary">Added Customers</label>
<ul class="list-group mb-3 customerList" id="customerList{{$book->id}}">
<!-- JS will append new customer list items here -->
</ul>
</div>

<!-- Hidden input to hold JSON data -->
<input type="hidden" name="multiple_customers" class="multiple_customers" id="multiple_customers{{$book->id}}" value="[]">
</div>
</div>

<!-- Modal Footer -->
<div class="modal-footer bg-light">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
<button type="submit" class="btn btn-primary">
<i class="ri-save-2-line me-1"></i> Save
</button>
</div>

</form>
</div>
</div>
</div>
</section>
