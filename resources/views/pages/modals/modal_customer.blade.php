<section>
<div class="modal fade" id="cusModal" tabindex="-1" aria-labelledby="cusModalLabel"
aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<form action="{{ route('save.customer') }}" method="post">
@csrf
@method('POST')
<div class="modal-header">
<h5 class="modal-title" id="cusModalLabel">
Customers
</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<div class="row gx-3">
<div class="col-xxl-4 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="a1">First Name <span class="text-danger">*</span></label>
<input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name">
@error('first_name')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-4 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="a2">Last Name <span class="text-danger">*</span></label>
<input type="text" class="form-control" id="last_names" name="last_names" placeholder="Enter Last Name">
@error('last_name')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-4 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="a3">Mobile Number<span class="text-danger">*</span></label>
<input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Enter Mobile Number">
@error('mobile_phone')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-4 col-lg-4 col-sm-6">
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
<div class="col-xxl-4 col-lg-4 col-sm-6">
<div class="mb-3">
    <label class="form-label" for="country">Country <span class="text-danger">*</span></label>
    <select class="form-select" id="country" name="country">
    <option value="">Select Country</option>
    @foreach($Countries as $country)
    <option value="{{ $country->name }}">{{ $country->name }}</option>
    @endforeach
    </select>
    @error('country')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
</div>
<div class="col-xxl-4 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="date_to">Address <span class="text-danger">*</span></label>
<input type="text" class="form-control" id="address" name="address" placeholder="Enter Customer Address">
@error('date_to')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>


</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
Cancel
</button>
<button type="submit" class="btn btn-primary">
Save Customer
</button>
</div>
</form>
</div>
</div>
</div>
</section>
