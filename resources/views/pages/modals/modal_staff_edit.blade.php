<section>
<div class="modal fade" id="staffEditModal{{$staff->id}}" tabindex="-1" aria-labelledby="staffModalLabel"
aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<form action="{{ route('update.staff', $staff->id) }}" method="post" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="modal-header">
<h5 class="modal-title" id="staffModalLabel">
Staff Data Update
</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<div class="row gx-3">
<div class="col-xxl-4 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="a1">First Name <span class="text-danger">*</span></label>
<input type="text" value="{{ $staff->first_name }}" class="form-control" id="first_name_edit" name="first_name_edit" placeholder="Enter First Name">
@error('first_name_edit')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-4 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="a2">Last Name <span class="text-danger">*</span></label>
<input type="text" value="{{ $staff->last_name }}" class="form-control" id="last_name_edit" name="last_name_edit" placeholder="Enter Last Name">
@error('last_name_edit')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-4 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="a3">Mobile Number<span class="text-danger">*</span></label>
<input type="text" value="{{ $staff->phone_number }}" class="form-control" id="phone_number_edit" name="phone_number_edit" placeholder="Enter Mobile Number">
@error('mobile_phone_edit')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-4 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="selectGender1">Gender <span
class="text-danger">*</span></label>
<div class="m-0">
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="gender_edit" id="gender_edit"
value="male" {{ $staff->gender === 'male' ? 'checked' : '' }}>
<label class="form-check-label" for="gender">Male</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="gender_edit" id="gender_edit"
value="female" {{ $staff->gender === 'female' ? 'checked' : '' }}>
<label class="form-check-label" for="gender">Female</label>
</div>
</div>
@error('gender_edit')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-4 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="date_to">Contact Person <span class="text-danger">*</span></label>
<input type="text" value="{{ $staff->emergency_contact_name }}" class="form-control" id="contact_person_edit" name="contact_person_edit" placeholder="Enter Contact Person">
@error('contact_person_edit')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-4 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="date_to">Emergency Contact Number <span class="text-danger">*</span></label>
<input type="text" value="{{ $staff->emergency_contact_number }}" class="form-control" id="contact_number_edit" name="contact_number_edit" placeholder="Enter Emergency Contact">
@error('contact_number_edit')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-4 col-lg-4 col-sm-12">
<div class="mb-3">
<label class="form-label" for="date_to">Ghana Card Number <span class="text-danger">*</span></label>
<input type="text" value="{{ $staff->ghana_card }}" class="form-control" id="ghana_card_edit" name="ghana_card_edit" placeholder="Enter Ghanacard Number">
@error('ghana_card_edit')<small class="text-danger">{{ $message }}</small>@enderror
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
<div class="col-xxl-4 col-lg-4 col-sm-12">
<div class="mb-3">
<img src="{{ asset('storage/'.$staff->pix) }}" alt="Staff Image" style="max-width: 200px;">
</div>
</div>
<div class="col-xxl-4 col-lg-4 col-sm-12">
<div class="mb-3">
<label class="form-label" for="date_to">Separation Criteria</label>
<select class="form-select" id="separation_type" name="separation_type">
<option value="">Select</option>
<option value="Resignation">Resignation</option>
<option value="Termination">Termination</option>
<option value="Death">Death</option>
</select>
</div>
</div>
<div class="col-xxl-4 col-lg-4 col-sm-12">
<div class="mb-3">
<label class="form-label" for="date_to">Date Of Separation</label>
<input type="date" class="form-control" name="archived_date">
</div>
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
Cancel
</button>
<button type="submit" class="btn btn-primary">
Update
</button>
</div>
</form>
</div>
</div>
</div>
</section>
