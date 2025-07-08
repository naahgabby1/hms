<section>
<div class="modal fade" id="hallModal" tabindex="-1" aria-labelledby="cusModalLabel"
aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
<div class="modal-dialog modal-xl">
<div class="modal-content">
<form action="{{ route('save.customer.hall') }}" method="post">
@csrf
@method('POST')
<div class="modal-header">
<h5 class="modal-title" id="cusModalLabel">
Hall Booking
</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<div class="row gx-3">
<div class="col-xxl-3 col-lg-3 col-sm-6">
<div class="mb-3">
<label class="form-label" for="a1">Name Of Client <span class="text-danger">*</span></label>
<input type="text" class="form-control" id="client_name" name="client_name" placeholder="Enter Name Of Client">
@error('client_name')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-3 col-sm-6">
<div class="mb-3">
<label class="form-label" for="organization">Country <span class="text-danger">*</span></label>
<select class="form-select" id="organization" name="organization">
<option value="">Select Organization</option>
@foreach($HallCustomers as $dataz)
<option value="{{ $dataz->id }}">{{ $dataz->name }}</option>
@endforeach
</select>
@error('organization')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-3 col-sm-6">
<div class="mb-3">
<label class="form-label" for="a3">Mobile Number<span class="text-danger">*</span></label>
<input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Enter Mobile Number">
@error('phone_number')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-3 col-sm-6" id="hideShowOrganization2"></div>
<div class="col-xxl-3 col-lg-3 col-sm-6" id="hideShowOrganization">
<div class="mb-3">
<label class="form-label" for="a3">Organization Name<span class="text-danger">*</span></label>
<input type="text" class="form-control" id="organization_name" name="organization_name" placeholder="Enter Organization Name">
@error('organization_name')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-3 col-sm-6">
<div class="mb-3">
<label class="form-label" for="event_type">Event Type <span class="text-danger">*</span></label>
<select class="form-select" id="event_type" name="event_type">
<option value="">Select Event Type</option>
@foreach($Events as $datac)
<option value="{{ $datac->id }}">{{ $datac->description }}</option>
@endforeach
</select>
@error('event_type')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-3 col-sm-6">
<div class="mb-3">
<label class="form-label" for="date_to">Participants <span class="text-danger">*</span></label>
<input type="number" min="1" class="form-control" id="participants" name="participants" placeholder="Enter Customer Address">
@error('participants')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-3 col-sm-6">
<div class="mb-3">
<label class="form-label" for="date_to">Date of Event <span class="text-danger">*</span></label>
<input type="date" class="form-control" id="edate" name="edate">
@error('edate')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-3 col-sm-6">
<div class="mb-3">
<label class="form-label" for="date_to">Catering Option <span class="text-danger">*</span></label>
<select class="form-select" id="catering_type" name="catering_type">
<option value="">Select Catering Type</option>
@foreach($Catering as $datacx)
<option value="{{ $datacx->id }}">{{ $datacx->description }}</option>
@endforeach
</select>
@error('catering_type')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>

<div class="col-xxl-3 col-lg-3 col-sm-6">
<div class="mb-3">
<label class="form-label" for="date_to">Start Date <span class="text-danger">*</span></label>
<input type="date" class="form-control" id="startdate" name="startdate">
@error('startdate')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>

<div class="col-xxl-3 col-lg-3 col-sm-6">
<div class="mb-3">
<label class="form-label" for="date_to">End Date <span class="text-danger">*</span></label>
<input type="date" class="form-control" id="enddate" name="enddate" placeholder="Enter Customer Address">
@error('enddate')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>


</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
Cancel
</button>
<button type="submit" class="btn btn-primary">
Save Hall Booking
</button>
</div>
</form>
</div>
</div>
</div>
</section>
