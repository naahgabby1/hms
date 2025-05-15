<section>
<div class="modal fade" id="cusEditModal{{$customer->id}}" tabindex="-1" aria-labelledby="cusModalLabel"
aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<form action="{{ route('update.customer', $customer->id) }}" method="post">
@csrf
@method('PUT')
<div class="modal-header">
<h5 class="modal-title" id="cusModalLabel">
Customer Update
</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<div class="row gx-3">
<div class="col-xxl-4 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="a1">First Name <span class="text-danger">*</span></label>
<input type="text" value="{{ $customer->first_name }}" class="form-control" id="first_name_edits" name="first_name_edits" placeholder="Enter First Name">
@error('first_name')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-4 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="a2">Last Name <span class="text-danger">*</span></label>
<input type="text" value="{{ $customer->last_names }}" class="form-control" id="last_names_edits" name="last_names_edits" placeholder="Enter Last Name">
@error('last_name')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-4 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="a3">Mobile Number<span class="text-danger">*</span></label>
<input type="text" value="{{ $customer->phone_number }}" class="form-control" id="phone_number_edits" name="phone_number_edits" placeholder="Enter Mobile Number">
@error('mobile_phone')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-4 col-lg-4 col-sm-6">
  <div class="mb-3">
    <label class="form-label" for="selectGender1">Gender <span
    class="text-danger">*</span></label>
    <div class="m-0">
    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="gender_edits" id="gender_edits"
    value="male" {{ $customer->gender === 'male' ? 'checked' : '' }}>
    <label class="form-check-label" for="gender">Male</label>
    </div>
    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="gender_edits" id="gender_edits"
    value="female" {{ $customer->gender === 'female' ? 'checked' : '' }}>
    <label class="form-check-label" for="gender">Female</label>
    </div>
    </div>
    @error('gender')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
</div>
<div class="col-xxl-4 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="country">Country <span class="text-danger">*</span></label>
<select class="form-select" id="country_edits" name="country_edits">
<option value="{{ $customer->country }}">{{ $customer->country }}</option>
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
<input type="text" value="{{ $customer->address }}" class="form-control" id="address_edits" name="address_edits" placeholder="Enter Customer Address">
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
Update
</button>
</div>
</form>
</div>
</div>
</div>
</section>
