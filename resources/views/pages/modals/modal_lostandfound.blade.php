<section>
<div class="modal fade" id="lostandfoundModal" tabindex="-1" aria-labelledby="personalModalLabel"
aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
<div class="modal-dialog modal-xl">
<div class="modal-content">
<form action="{{ route('lost.and.found.save') }}" method="post">
@csrf
@method('POST')
<div class="modal-header">
<h5 class="modal-title" id="personalModalLabel">
Lost & Found Entry
</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<div class="row gx-3">
<div class="col-sm-12">
<div class="bg-light rounded-2 px-3 py-2 mb-3">
<h6 class="m-0">Enter Details For Losts & Founds</h6>
</div>
</div>
<div class="col-xxl-3 col-lg-3 col-sm-3 mb-3">
<label class="form-label" for="a1">Found Area<span class="text-danger">*</span></label>
<select class="form-select" id="customer_type" name="customer_type">
<option value="2">Rooms</option>
<option value="1">Compound</option>
</select>
</div>
</div>

<div class="row gx-3" id="hideShowOld">
<div class="col-xxl-6 col-lg-6 col-sm-12">
<div class="mb-3">
<label class="form-label" for="a1">Item Found By<span class="text-danger">*</span></label>
<input type="text" class="form-control" id="founded_name_room" name="founded_name_room"
placeholder="Enter Name Of Person Who Found Item">
@error('founded_name_room')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="room">Room Found<span class="text-danger">*</span></label>
<select class="form-select" id="room_room" name="room_room">
<option value="">Select Room</option>
@foreach($RoomData as $roomdataz)
<option value="{{ $roomdataz->description }}">{{ $roomdataz->description }}</option>
@endforeach
</select>
@error('room_room')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="a3">Last Occupant<span class="text-danger">*</span></label>
<input type="text" class="form-control" id="last_occupant" name="last_occupant"
placeholder="Enter Last Occupant's Name">
@error('last_occupant')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
</div>


<div class="row gx-3" id="hideShowOld_compound">
<div class="col-xxl-6 col-lg-6 col-sm-12">
<div class="mb-3">
<label class="form-label" for="a1">Item Found By<span class="text-danger">*</span></label>
<input type="text" class="form-control" id="founded_name_compound" name="founded_name_compound"
placeholder="Enter Name Of Person Who Found Item">
@error('founded_name_compound')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-6 col-lg-6 col-sm-12">
<div class="mb-3">
<label class="form-label" for="a3">Location Of Item<span class="text-danger">*</span></label>
<input type="text" class="form-control" id="item_location" name="item_location" placeholder="Enter Mobile Number">
@error('item_location')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
</div>



<div class="row gx-3">
<div class="col-xxl-6 col-lg-6 col-sm-12">
<div class="mb-3">
<label class="form-label" for="date_from">Item Description <span class="text-danger">*</span></label>
<input type="text" class="form-control" id="item_description" name="item_description"
 placeholder="Description Of Item">
@error('item_description')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-6 col-sm-12">
<div class="mb-3">
<label class="form-label" for="country">Date Found <span class="text-danger">*</span></label>
<input type="date" class="form-control" name="date_found" id="date_found">
@error('date_found')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-4 col-sm-6">
<div class="mb-3">
<label class="form-label" for="city">Quantity <span class="text-danger">*</span></label>
<input type="text" class="form-control" id="item_qty" name="item_qty" placeholder="Enter Quantity">
@error('item_qty')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
</div>

<div class="row gx-3">
<div class="col-xxl-12 col-lg-12 col-sm-12">
<div class="mb-3">
<label class="form-label" for="date_from">Enter Comments <span class="text-danger"></span></label>
<textarea name="any_comments" id="any_comments" cols="20" rows="2" class="form-control">
</textarea>
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
