<section>
<div class="modal fade" id="staffModal" tabindex="-1" aria-labelledby="staffModalLabel"
aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<form action="{{ route('save.staff') }}" method="post" enctype="multipart/form-data">
@csrf
@method('POST')
<div class="modal-header">
<h5 class="modal-title" id="staffModalLabel">
Staff Entry
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
<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name">
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
<label class="form-label" for="date_to">Contact Person <span class="text-danger">*</span></label>
<input type="text" class="form-control" id="contact_person" name="contact_person" placeholder="Enter Contact Person">
@error('contact_person')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-4 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="date_to">Emergency Contact Number <span class="text-danger">*</span></label>
<input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="Enter Emergency Contact">
@error('contact_number')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-4 col-lg-4 col-sm-12">
<div class="mb-3">
<label class="form-label" for="date_to">Ghana Card Number <span class="text-danger">*</span></label>
<input type="text" class="form-control" id="ghana_card" name="ghana_card" placeholder="Enter Ghanacard Number">
@error('ghana_card')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-8 col-lg-8 col-sm-12">
<div class="mb-3">
<label class="form-label" for="date_to">Upload picture <span class="text-danger"></span></label>
<div class="input-group">
<label class="input-group-text" for="inputGroupFile01">Upload</label>
<input type="file" name="file" class="form-control" id="inputGroupFile01">
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
Save
</button>
</div>
</form>
</div>
</div>
</div>
</section>
