<section>
<div class="modal fade" id="corporateModal" tabindex="-1" aria-labelledby="corporateModalLabel"
aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
<div class="modal-dialog modal-xl">
<div class="modal-content">
<form action="{{ route('save.booking.corporate') }}" method="post">
@csrf
@method('POST')
<div class="modal-header">
<h4 class="modal-title" id="corporateModalLabel">
Corporate Booking & Check-ins
</h4>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<div class="row gx-3">
<div class="col-sm-12">
<div class="bg-light rounded-2 px-3 py-2 mb-3">
<h6 class="m-0">Complete The Form For Corporate Booking</h6>
</div>
</div>
<div class="col-xxl-3 col-lg-3 col-sm-12 mb-3">
<label class="form-label" for="corporate_group_type">Corporate Visit Category<span class="text-danger">*</span></label>
<select class="form-select" id="corporate_group_type" name="corporate_group_type">
<option value="1">New Corporate Organization</option>
<option value="2">Existing Corporate Organization</option>
</select>
</div>
<div class="col-xxl-3 col-lg-3 col-sm-12 mb-3" id="hideShowOldCorporate">
<label class="form-label" for="corporate_type_existing">Customer<span class="text-danger">*</span></label>
<select class="form-select" id="corporate_type_existing" name="corporate_type_existing">
<option value="1">Select</option>
@foreach ($corporates as $corporate)
<option value="{{ $corporate->id }}">{{ $corporate->first_name.' '.$corporate->last_names }}</option>
@endforeach
</select>
</div>
</div>

<div class="row gx-3" id="hideShowCorporate">
<div class="col-xxl-6 col-lg-8 col-sm-12">
<div class="mb-3">
<label class="form-label" for="a1">Corporate/Company Name <span class="text-danger">*</span></label>
<input type="text" class="form-control" id="corporate_main_name" name="corporate_main_name" placeholder="Enter Corporate Or Company's Name">
@error('corporate_main_name')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-6 col-lg-4 col-sm-12">
<div class="mb-3">
<label class="form-label" for="a3">Phone Number<span class="text-danger">*</span></label>
<input type="text" class="form-control" id="corporate_mobile_phone" name="corporate_mobile_phone" placeholder="Enter Mobile Number">
@error('corporate_mobile_phone')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
</div>

<div class="row gx-3">
<div class="col-xxl-3 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="date_from">Date From <span class="text-danger">*</span></label>
<input type="date" class="form-control" id="corporate_date_from" name="corporate_date_from" placeholder="Enter Date From">
@error('corporate_date_from')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="date_to">Date To <span class="text-danger">*</span></label>
<input type="date" class="form-control" id="corporate_date_to" name="corporate_date_to" placeholder="Enter Date To">
@error('corporate_date_to')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="country">Country <span class="text-danger"></span></label>
<select class="form-select" id="corporate_country" name="corporate_country">
<option value="">Select</option>
@foreach($Countries as $country)
<option value="{{ $country->name }}">{{ $country->name }}</option>
@endforeach
</select>
@error('corporate_country')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="city">City <span class="text-danger"></span></label>
<input type="text" class="form-control" id="corporate_city" name="corporate_city" placeholder="Enter City">
@error('corporate_city')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="room_type">Room Type <span class="text-danger">*</span></label>
<select class="form-select" id="corporate_room_type" name="corporate_room_type">
<option value="">Select</option>
@foreach($RoomType as $roomtype)
<option value="{{ $roomtype->id }}">{{ $roomtype->description.' ('.strtoupper($roomtype->alias).')' }}</option>
@endforeach
</select>
@error('corporate_room_type')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="room">Room <span class="text-danger">*</span></label>
<select class="form-select" id="corporate_room" name="corporate_room">
<option value="">Select Available Room</option>
</select>
@error('corporate_room')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-6 col-lg-4 col-sm-12">
<div class="mb-3">
<label class="form-label" for="address">Address <span class="text-danger">*</span></label>
<input type="text" class="form-control" id="corporate_address" name="corporate_address" placeholder="Enter Coporation Or Company's Address">
@error('corporate_address')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<center><hr class="col-11"></center>
<div class="col-xxl-6 col-lg-6 col-sm-12">
<div class="mb-3">
<label class="form-label" for="selectGender1">Do you want to check visitor(s) in ? <span
class="text-danger">*</span></label>
<div class="m-0">
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="room_confirmation" id="room_confirmation"
value="0" checked>
<label class="form-check-label" for="room_confirmation">No, Later</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="room_confirmation" id="room_confirmation"
value="1">
<label class="form-check-label" for="room_confirmation">Yes, Check in company</label>
</div>
</div>
@error('room_confirmation')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
Cancel Booking
</button>
<button type="submit" class="btn btn-primary">
Save Booking Data
</button>
</div>
</form>
</div>
</div>
</div>
</section>
