<section>
<div class="modal fade" id="resModalMasterUpdate{{$reservation->id}}" tabindex="-1" aria-labelledby="resModalLabel"
aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
<div class="modal-dialog modal-xl">
<div class="modal-content">
<form action="{{ route('edit.reservation',  $reservation->id) }}" method="post">
@csrf
@method('PUT')
<div class="modal-header">
<h5 class="modal-title" id="resModalLabel">
Update Reservations
</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<div class="row gx-3">
<div class="col-sm-12">
<div class="bg-light rounded-2 px-3 py-2 mb-3">
<h6 class="m-0">Reservation Details</h6>
</div>
</div>
<div class="col-xxl-3 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="a1">First Name <span class="text-danger">*</span></label>
<input type="text" value="{{ $reservation->first_name }}" class="form-control" id="first_name_edits" name="first_name_edits" placeholder="Enter First Name">
@error('first_name')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="a2">Last Name <span class="text-danger">*</span></label>
<input type="text" value="{{ $reservation->last_name }}" class="form-control" id="last_name_edits" name="last_name_edits" placeholder="Enter Last Name">
@error('last_name')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="a3">Mobile Number<span class="text-danger">*</span></label>
<input type="text" value="{{ $reservation->mobile_number }}" class="form-control" id="mobile_phone_edits" name="mobile_phone_edits" placeholder="Enter Mobile Number">
@error('mobile_phone')<small class="text-danger">{{ $message }}</small>@enderror
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
@error('gender')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="date_from">Date From <span class="text-danger">*</span></label>
<input type="date" value="{{ $reservation->date_from }}" class="form-control" id="date_from_edits" name="date_from_edits" placeholder="Enter Date From">
@error('date_from')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="date_to">Date To <span class="text-danger">*</span></label>
<input type="date" value="{{ $reservation->date_to }}" class="form-control" id="date_to_edits" name="date_to_edits" placeholder="Enter Date To">
@error('date_to')<small class="text-danger">{{ $message }}</small>@enderror
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
@error('country')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="city">City <span class="text-danger">*</span></label>
<input type="text" value="{{ $reservation->city }}" class="form-control" id="city_edits" name="city_edits" placeholder="Enter City">
@error('city')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="room_type">Room Type <span class="text-danger">*</span></label>
<select class="form-select room_type_edits" name="room_type_edits">
<option value="{{ $reservation->room_type_id }}">{{ $reservation->description}}</option>
@foreach($RoomType as $roomtype)
<option value="{{ $roomtype->id }}">{{ $roomtype->description.' ('.strtoupper($roomtype->alias).')' }}</option>
@endforeach
</select>
@error('room_type')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="room">Room <span class="text-danger">*</span></label>
<select class="form-select room_edits" name="room_edits">
<option value="{{ $reservation->room_id }}">{{ $reservation->room }}</option>
</select>
@error('room')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-6 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="address">Address <span class="text-danger">*</span></label>
<input type="text" value="{{ $reservation->address }}" class="form-control" id="address_edits" name="address_edits" placeholder="Enter Customer Address">
@error('address')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
Cancel Update
</button>
<button type="submit" class="btn btn-primary">
Update Reservation Data
</button>
</div>
</form>
</div>
</div>
</div>
</section>
