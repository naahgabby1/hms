<section>
<div class="modal fade" id="cusresModalUpdates{{ $reservation->id }}" tabindex="-1" aria-labelledby="personalModalLabel"
aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
<div class="modal-dialog modal-xl">
<div class="modal-content">
<form action="{{ route('update.personal.reservation', $reservation->id) }}" method="post">
@csrf
@method('PUT')
<div class="modal-header">
<h5 class="modal-title" id="cusresModalUpdatesLabel">
Customer Reservations Updates
</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<div class="row gx-3">
<div class="col-sm-12">
<div class="bg-light rounded-2 px-3 py-2 mb-3">
<h6 class="m-0">Reservation Details For Update</h6>
</div>
</div>
</div>

<div class="row gx-3" id="hideShow">
<div class="col-xxl-3 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="a1">First Name <span class="text-danger">*</span></label>
<input type="text" class="form-control" value="{{ $reservation->first_name }}"
id="first_name_edits" name="first_name_edits"
placeholder="Enter First Name">
@error('first_name_edits')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="a2">Last Name <span class="text-danger">*</span></label>
<input type="text" class="form-control"  value="{{ $reservation->last_name }}"
id="last_name_edits" name="last_name_edits"
placeholder="Enter Last Name">
@error('last_name_edits')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="a3">Mobile Number<span class="text-danger">*</span></label>
<input type="text" class="form-control" value="{{ $reservation->mobile_number }}"
 id="mobile_phone_edits" name="mobile_phone_edits" placeholder="Enter Mobile Number">
@error('mobile_phone_edits')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="selectGender1">Gender <span
class="text-danger">*</span></label>
<div class="m-0">
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="gender_edits" id="gender_edits"
value="male" {{ $reservation->gender === 'male' ? 'checked' : '' }}>
<label class="form-check-label" for="gender">Male</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="gender_edits" id="gender_edits"
value="female" {{ $reservation->gender === 'female' ? 'checked' : '' }}>
<label class="form-check-label" for="gender">Female</label>
</div>
</div>
@error('gender_edits')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>



</div>

<div class="row gx-3">
<div class="col-xxl-3 col-lg-4 col-sm-6">
<div class="mb-3">
<input type="hidden" value="{{ $reservation->date_from }}" name="date_from_edits">
<label class="form-label" for="date_from">Date From <span class="text-danger">*</span></label>
<input type="date" class="form-control" value="{{ $reservation->date_from }}"
disabled>
@error('date_from_edits')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="date_to">Date To <span class="text-danger">*</span></label>
<input type="date" class="form-control" value="{{ $reservation->date_to }}"
id="date_to_edits" name="date_to_edits" placeholder="Enter Date To">
@error('date_to_edits')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="country">Country <span class="text-danger">*</span></label>
<select class="form-select" id="country_edits" name="country_edits">
<option value="{{ $reservation->country }}">{{ $reservation->country }}</option>
@foreach($Countries as $country)
<option value="{{ $country->name }}">{{ $country->name }}</option>
@endforeach
</select>
@error('country_edits')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="city">City <span class="text-danger"></span></label>
<input type="text" class="form-control" value="{{ $reservation->city }}"
id="city_edits" name="city_edits" placeholder="Enter City">
@error('city_edits')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-4 col-sm-6">
<div class="mb-3">
<input type="hidden" name="room_type_edits" value="{{ $reservation->room_type_id }}">
<label class="form-label" for="room_type">Room Type <span class="text-danger">*</span></label>
<select class="form-select" disabled>
<option value="{{ $reservation->room_type_id }}">{{ $reservation->description}}</option>
@foreach($RoomType as $roomtype)
<option value="{{ $roomtype->id }}">{{ $roomtype->description.' ('.strtoupper($roomtype->alias).')' }}</option>
@endforeach
</select>
@error('room_type_edits')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-4 col-sm-6">
<div class="mb-3">
<input type="hidden" name="room_edits" value="{{ $reservation->room_id }}">
<label class="form-label" for="room">Room <span class="text-danger">*</span></label>
<select class="form-select" disabled>
<option value="{{ $reservation->room_id}}">{{ $reservation->room }}</option>
</select>
@error('room_edits')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-3 col-sm-12">
<div class="mb-3">
<label class="form-label" for="address">Address <span class="text-danger"></span></label>
<input type="text" class="form-control" value="{{ $reservation->address }}"
id="address_edits" name="address_edits" placeholder="Enter Customer Address">
@error('address_edits')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>

<div class="col-xxl-3 col-lg-3 col-sm-12">
<div class="mb-3">
<label class="form-label" for="address">Reservation Payment <span class="text-danger"></span></label>
<input type="number" class="form-control" value="{{ $reservation->advanced_payment }}"
id="personal_part_payments" name="personal_part_payments" placeholder="Enter Amount" style="text-align: end">
</div>
</div>
</div>
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
