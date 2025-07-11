<section>
<div class="modal fade" id="GymCustomerModal" tabindex="-1" aria-labelledby="cusModalLabel"
aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
<div class="modal-dialog modal-xl">
<div class="modal-content">
<form action="{{ route('save.gym.customers') }}" method="post">
@csrf
@method('POST')
<div class="modal-header">
<h5 class="modal-title" id="cusModalLabel">
Gym Members Registration
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
<label class="form-label" for="membership">Membership Type <span class="text-danger">*</span></label>
<select class="form-select" id="membership" name="membership">
<option value="">Select Membership</option>
@foreach($MemType as $dataz)
<option value="{{ $dataz->id }}">{{ $dataz->mem_description }}</option>
@endforeach
</select>
@error('membership')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-3 col-sm-6">
<div class="mb-3">
<label class="form-label" for="a3">Mobile Number<span class="text-danger">*</span></label>
<input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Enter Mobile Number">
@error('phone_number')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-3 col-sm-6" id="hideShowOrganization">
<div class="mb-3">
<label class="form-label" for="a3">Email Address<span class="text-danger"></span></label>
<input type="email" class="form-control" id="email" name="email" placeholder="Enter Organization Name">
@error('email')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-3 col-sm-6">
<div class="mb-3">
<label class="form-label" for="selectGender1">Gender <span
class="text-danger">*</span></label>
<div class="m-0">
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="gender" id="gender"
value="male">
<label class="form-check-label" for="gender">Male</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="gender" id="gender"
value="female">
<label class="form-check-label" for="gender">Female</label>
</div>
</div>
@error('gender')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-3 col-sm-6">
<div class="mb-3">
<label class="form-label" for="date_to">Address <span class="text-danger">*</span></label>
<input type="text" min="1" class="form-control" id="address" name="address" placeholder="Enter Customer Address">
@error('address')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-3 col-sm-6">
<div class="mb-3">
<label class="form-label" for="date_to">Start Date <span class="text-danger">*</span></label>
<input type="date" class="form-control" id="start_date" name="start_date">
@error('start_date')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-3 col-sm-6">
<div class="mb-3">
<label class="form-label" for="date_to">Emergency Contact Number <span class="text-danger">*</span></label>
<input type="text" class="form-control" id="emergency_contact" name="emergency_contact">
@error('emergency_contact')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>

<div class="col-xxl-3 col-lg-3 col-sm-6">
<div class="mb-3">
<label class="form-label" for="date_to">Gym Trainer <span class="text-danger">*</span></label>
<select class="form-select" id="gym_trainer" name="gym_trainer">
<option value="">Select</option>
@foreach($GymTrainers as $train)
<option value="{{ $train->id }}">{{ $train->name }}</option>
@endforeach
</select>
@error('gym_trainer')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>

<div class="col-xxl-3 col-lg-3 col-sm-6">
<div class="mb-3">
<label class="form-label" for="date_to">Discount % <span class="text-danger">*</span></label>
<input type="number" class="form-control" id="discounts" name="discounts" placeholder="Enter Customer Address">
@error('discounts')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>


</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
Cancel
</button>
<button type="submit" class="btn btn-primary">
Save Gym Registration
</button>
</div>
</form>
</div>
</div>
</div>
</section>
