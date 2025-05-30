<section>
<div class="modal fade" id="corResUpdates{{ $reservation->id }}" tabindex="-1" aria-labelledby="corporateModalLabel"
aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
<div class="modal-dialog modal-xl">
<div class="modal-content">
<form action="{{ route('edit.corporate.reservation', $reservation->id) }}" method="post">
@csrf
@method('PUT')
<div class="modal-header">
<h4 class="modal-title" id="corporateModalLabel">
Corporate Reservation
</h4>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<div class="row gx-3">
<div class="col-sm-12">
<div class="bg-light rounded-2 px-3 py-2 mb-3">
<h6 class="m-0">Complete The Form For Corporate Reservation</h6>
</div>
</div>
</div>

<div class="row gx-3" id="hideShowCorporate">
<div class="col-xxl-6 col-lg-6 col-sm-12">
<div class="mb-3">
<label class="form-label" for="a1">Name of Organization <span class="text-danger">*</span></label>
<input type="text" class="form-control" value="{{ $reservation->name }}"
id="corporate_main_name_edit"
name="corporate_main_name_edit" placeholder="Name of Organizationm">
@error('corporate_main_name_edit')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-3 col-sm-12">
<div class="mb-3">
<label class="form-label" for="a3">Phone Number<span class="text-danger">*</span></label>
<input type="text" class="form-control" value="{{ $reservation->mobile_number }}"
id="corporate_mobile_phone_edit" name="corporate_mobile_phone_edit"
placeholder="Mobile Number of Organization">
@error('corporate_mobile_phone_edit')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-3 col-sm-12">
@php
$null = 1;
@endphp
<input type="hidden" name="corporate_gender_edit" value="{{ $null }}">
<div class="mb-3">
<label class="form-label" for="selectGender1">Category <span
class="text-danger"></span></label>
<div class="m-0">
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" checked>
<label class="form-check-label" for="gender">Corporate Organization</label>
</div>
</div>
</div>
</div>
</div>

<div class="row gx-3">
<div class="col-xxl-3 col-lg-4 col-sm-6">
<div class="mb-3">
<input type="hidden" name="corporate_date_from_edit" value="{{ $reservation->date_from }}">
<label class="form-label" for="date_from">Date From <span class="text-danger">*</span></label>
<input type="date" class="form-control" value="{{ $reservation->date_from }}" disabled>
@error('corporate_date_from_edit')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="date_to">Date To <span class="text-danger">*</span></label>
<input type="date" class="form-control" value="{{ $reservation->date_to }}"
id="corporate_date_to_edit"
name="corporate_date_to_edit">
@error('corporate_date_to_edit')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="country">Country <span class="text-danger"></span></label>
<select class="form-select"
id="corporate_country_edit" name="corporate_country_edit">
<option value="{{ $reservation->country }}">{{ $reservation->country }}</option>
@foreach($Countries as $country)
<option value="{{ $country->name }}">{{ $country->name }}</option>
@endforeach
</select>
@error('corporate_country_edit')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="city">Location (Town or City) <span class="text-danger"></span></label>
<input type="text" class="form-control" value="{{ $reservation->city }}"
id="corporate_city_edit"
name="corporate_city_edit" placeholder="Enter Town or City">
@error('corporate_city_edit')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-4 col-sm-6">
<div class="mb-3">
<input type="hidden" name="corporate_room_type_edit" value="{{ $reservation->room_type_id }}">
<label class="form-label" for="room_type">Room Type <span class="text-danger">*</span></label>
<select class="form-select" disabled>
<option value="{{ $reservation->room_type_id }}">{{ $reservation->description.' ( '.$reservation->alias.' )' }}</option>
@foreach($RoomType as $roomtype)
<option value="{{ $roomtype->id }}">{{ $roomtype->description.' ('.strtoupper($roomtype->alias).')' }}</option>
@endforeach
</select>
@error('corporate_room_type_edit')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-4 col-sm-6">
<div class="mb-3">
<input type="hidden" name="corporate_room_edit" value="{{ $reservation->room_type_id }}">
<label class="form-label" for="room">Room <span class="text-danger">*</span></label>
<select class="form-select" disabled>
<option value="{{ $reservation->room_id }}">{{ $reservation->room }}</option>
</select>
@error('corporate_room_edit')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-3 col-sm-12">
<div class="mb-3">
<label class="form-label" for="address">Address of Organization (if any)</label>
<input type="text" class="form-control" value="{{ $reservation->address }}"
id="corporate_address_edit"
name="corporate_address_edit" placeholder="Corporate Address">
@error('corporate_address_edit')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>

<div class="col-xxl-3 col-lg-3 col-sm-12">
<div class="mb-3">
<label class="form-label" for="address">Reservation Payment <span class="text-danger"></span></label>
<input type="number" class="form-control" value="{{ $reservation->advanced_payment }}"
id="corporate_part_payments" name="corporate_part_payments" placeholder="Enter Amount" style="text-align: end">
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
