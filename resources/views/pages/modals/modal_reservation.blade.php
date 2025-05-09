<section>
<div class="modal fade" id="resModal" tabindex="-1" aria-labelledby="resModalLabel"
aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
<div class="modal-dialog modal-xl">
<div class="modal-content">
<form action="{{ route('save.reservation') }}" method="post">
@csrf
<div class="modal-header">
<h5 class="modal-title" id="resModalLabel">
Reservations
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
<input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name">
@error('first_name')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="a2">Last Name <span class="text-danger">*</span></label>
<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name">
@error('last_name')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="a3">Mobile Number<span class="text-danger">*</span></label>
<input type="text" class="form-control" id="mobile_phone" name="mobile_phone" placeholder="Enter Mobile Number">
@error('mobile_phone')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-4 col-sm-6">
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
<div class="col-xxl-3 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="date_from">Date From <span class="text-danger">*</span></label>
<input type="date" class="form-control" id="date_from" name="date_from" placeholder="Enter Date From">
@error('date_from')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="date_to">Date To <span class="text-danger">*</span></label>
<input type="date" class="form-control" id="date_to" name="date_to" placeholder="Enter Date To">
@error('date_to')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="country">Country <span class="text-danger">*</span></label>
<select class="form-select" id="country" name="country">
<option value="">Select</option>
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
<input type="text" class="form-control" id="city" name="city" placeholder="Enter City">
@error('city')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="room_type">Room Type <span class="text-danger">*</span></label>
<select class="form-select" id="room_type">
<option value="">Select</option>
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
<select class="form-select" id="room" name="room">
<option value="">Select</option>
@foreach($Room as $room)
<option value="{{ $room->id }}">{{ $room->description }}</option>
@endforeach
</select>
@error('room')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-6 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="address">Address <span class="text-danger">*</span></label>
<input type="text" class="form-control" id="address" name="address" placeholder="Enter Customer Address">
@error('address')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
Cancel Reservation
</button>
<button type="submit" class="btn btn-primary">
Save Reservation Data
</button>
</div>
</form>
</div>
</div>
</div>
</section>
