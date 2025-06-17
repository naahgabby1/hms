<section>
<div class="modal fade" id="roomsEditedModal{{ $rooms->id }}" tabindex="-1" aria-labelledby="personalModalLabel"
aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<form action="{{ route('update.room.entry', $rooms->id) }}" method="post">
@csrf
@method('PUT')
<div class="modal-header">
<h5 class="modal-title" id="resModalLabel">
Room Registration Update
</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<div class="row gx-3">
<div class="col-sm-12">
<div class="bg-light rounded-2 px-3 py-2 mb-3">
<h6 class="m-0">Enter Room Details To Update</h6>
</div>
</div>
<div class="col-xxl-4 col-lg-4 col-sm-12 mb-3">
<label class="form-label" for="a1">Room Type<span class="text-danger">*</span></label>
<select class="form-select" id="room_type_edit" name="room_type_edit">
<option value="{{ $rooms->type_id }}">{{ $rooms->rooms_type_name->description.' ('.$rooms->rooms_type_name->alias.')' }}</option>
@foreach($RoomType as $roomtype)
<option value="{{ $roomtype->id }}">{{ $roomtype->description.' ('.strtoupper($roomtype->alias).')' }}</option>
@endforeach
</select>
@error('room_type_edit')<small class="text-danger">{{ $message }}</small>@enderror
</div>
<div class="col-xxl-4 col-lg-4 col-sm-12 mb-3">
<label class="form-label" for="a1">Register Room<span class="text-danger">*</span></label>
<input type="text" class="form-control" id="room_name_edit" name="room_name_edit" value="{{ $rooms->description }}">
@error('room_name_edit')<small class="text-danger">{{ $message }}</small>@enderror
</div>
<div class="col-xxl-2 col-lg-2 col-sm-12 mb-3">
<label class="form-label" for="a1">Rate Single<span class="text-danger">*</span></label>
<input type="text" class="form-control" id="room_rate_edit" name="room_rate_edit" value="{{ $rooms->fee }}">
@error('room_rate_edit')<small class="text-danger">{{ $message }}</small>@enderror
</div>
<div class="col-xxl-2 col-lg-2 col-sm-12 mb-3">
<label class="form-label" for="a1">Rate Double<span class="text-danger">*</span></label>
<input type="text" class="form-control" id="room_rate_double_edit" name="room_rate_double_edit" value="{{ $rooms->fee_double }}">
@error('room_rate_double_edit')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
Cancel
</button>
<button type="submit" class="btn btn-primary">
Update Room
</button>
</div>
</form>
</div>
</div>
</div>
</section>
