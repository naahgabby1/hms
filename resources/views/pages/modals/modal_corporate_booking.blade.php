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
<option value="1">New Organization</option>
<option value="2">Existing Organization</option>
</select>
</div>
<div class="col-xxl-3 col-lg-3 col-sm-12 mb-3" id="hideShowOldCorporate">
<label class="form-label" for="corporate_type_existing">Select Organization<span class="text-danger">*</span></label>
<select class="form-select" id="corporate_type_existing" name="corporate_type_existing">
<option value="">Select</option>
@foreach ($corporates as $corporate)
<option value="{{ $corporate->id }}">
{{ $corporate->first_name.' '.$corporate->last_names }}
</option>
@endforeach
</select>
</div>
</div>

<div class="row gx-3" id="hideShowCorporate">
<div class="col-xxl-3 col-lg-3 col-sm-12">
<div class="mb-3">
<label class="form-label" for="a1">Name of Organization <span class="text-danger">*</span></label>
<input type="text" class="form-control" id="corporate_main_name"
name="corporate_main_name" placeholder="Name of Organizationm">
@error('corporate_main_name')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-3 col-sm-12">
<div class="mb-3">
<label class="form-label" for="a3">Phone Number<span class="text-danger">*</span></label>
<input type="text" class="form-control"
id="corporate_mobile_phone" name="corporate_mobile_phone"
placeholder="Mobile Number of Organization">
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
<label class="form-label" for="city">Location (Town or City) <span class="text-danger"></span></label>
<input type="text" class="form-control" id="corporate_city" name="corporate_city" placeholder="Enter Town or City">
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
<div class="col-xxl-3 col-lg-3 col-sm-12">
<div class="mb-3">
<label class="form-label" for="address">Address of Organization (if any)</label>
<input type="text" class="form-control" id="corporate_address"
name="corporate_address" placeholder="Corporate Address">
@error('corporate_address')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>

<div class="col-xxl-3 col-lg-3 col-sm-12">
<div class="mb-3">
<label class="form-label" for="address">Occupancy <span class="text-danger">*</span></label>
<select class="form-select" id="occupancy" name="occupancy">
<option value="1">Single</option>
<option value="2">Double</option>
</select>
@error('occupancy')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>

<div class="col-xxl-3 col-lg-3 col-sm-12">
<div class="mb-3">
<div class="form-check">
<input class="form-check-input" type="checkbox" value="1" name="flexCheckChecked" id="flexCheckChecked" checked="checked" disabled>
<label class="form-check-label" for="flexCheckChecked">Organization Checked In</label>
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
Save Booking & Check-in
</button>
</div>
</form>
</div>
</div>
</div>
</section>
