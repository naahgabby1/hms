<section>
<div class="modal fade" id="GymTransModal" tabindex="-1" aria-labelledby="cusModalLabel"
aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<form action="{{ route('save.gym.activities') }}" method="post">
@csrf
@method('POST')
<div class="modal-header">
<h5 class="modal-title" id="cusModalLabel">
Gym Transaction Entries
</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<div class="row gx-3">
<div class="col-xxl-4 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="membership_preselected">Client Category <span class="text-danger">*</span></label>
<select class="form-select" id="membership_preselected" name="membership_preselected">
<option value="1">Registered Customer</option>
<option value="2">Onetime / Walkedin Client</option>
</select>
</div>
</div>
<div class="col-xxl-4 col-lg-4 col-sm-6" id="currentCustomer">
<div class="mb-3">
<label class="form-label" for="membership_registered">Select Gym Client<span class="text-danger">*</span></label>
<select class="form-select" id="membership_registered" name="membership_registered">
<option value="">Select Client</option>
@foreach($GymCustomers as $gclients)
<option value="{{ $gclients->id }}">{{ $gclients->name }}</option>
@endforeach
</select>
@error('membership_registered')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-4 col-lg-4 col-sm-6" id="currentCustomer2">
<div class="mb-3">
<label class="form-label" for="a3">Client Phone Number<span class="text-danger">*</span></label>
<input type="text" class="form-control" id="membership_registered_phone" name="membership_registered_phone">
<input type="hidden" class="form-control" id="membership_registered_phone_hidden" name="membership_registered_phone_hidden">
<input type="hidden" class="form-control" id="membership_registered_id_hidden" name="membership_registered_id_hidden">
@error('membership_registered_phone')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-4 col-lg-4 col-sm-6" id="newCustomer">
<div class="mb-3">
<label class="form-label" for="a3">Enter Client Name<span class="text-danger">*</span></label>
<input type="text" class="form-control" id="onetime_customer" name="onetime_customer" placeholder="Enter Onetime Client's name">
@error('onetime_customer')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-4 col-lg-4 col-sm-6" id="newCustomer2">
<div class="mb-3">
<label class="form-label" for="a3">Enter Client Phone<span class="text-danger">*</span></label>
<input type="text" class="form-control" id="onetime_customer_phone" name="onetime_customer_phone" placeholder="Enter Onetime Client's name">
@error('onetime_customer_phone')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
Cancel
</button>
<button type="submit" class="btn btn-primary">
Save Gym Transaction
</button>
</div>
</form>
</div>
</div>
</div>
</section>
