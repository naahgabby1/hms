<section>
<div class="modal fade" id="roomsModal" tabindex="-1" aria-labelledby="personalModalLabel"
aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<form action="{{ route('save.new.user') }}" method="post">
@csrf
@method('POST')
<div class="modal-header">
<h5 class="modal-title" id="resModalLabel">
Register New User
</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<div class="row gx-3">
<div class="col-sm-12">
<div class="bg-light rounded-2 px-3 py-2 mb-3">
<h6 class="m-0">Enter User Creation Details</h6>
</div>
</div>
<div class="col-xxl-4 col-lg-4 col-sm-12 mb-3">
<label class="form-label" for="a1">User Role<span class="text-danger">*</span></label>
<select class="form-select" id="role_type" name="role_type">
<option value="">Select</option>
@foreach($RoleType as $roletype)
<option value="{{ $roletype->id }}">{{ $roletype->description }}</option>
@endforeach
</select>
@error('role_type')<small class="text-danger">{{ $message }}</small>@enderror
</div>
<div class="col-xxl-4 col-lg-4 col-sm-12 mb-3">
<label class="form-label" for="a1">First Name<span class="text-danger">*</span></label>
<input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter Room Description">
@error('first_name')<small class="text-danger">{{ $message }}</small>@enderror
</div>
<div class="col-xxl-4 col-lg-4 col-sm-12 mb-3">
<label class="form-label" for="a1">Last Names<span class="text-danger">*</span></label>
<input type="text" class="form-control" id="last_name" name="last_name" placeholder="0.00">
@error('last_name')<small class="text-danger">{{ $message }}</small>@enderror
</div>
<div class="col-xxl-12 col-lg-12 col-sm-12 mb-3">
<label class="form-label" for="a1">Enter Email<span class="text-danger">*</span></label>
<input type="text" class="form-control" id="user_email" name="user_email" placeholder="0.00">
@error('user_email')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
Cancel
</button>
<button type="submit" class="btn btn-primary">
Save Rates
</button>
</div>
</form>
</div>
</div>
</div>
</section>
