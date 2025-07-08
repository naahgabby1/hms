<section>
<div class="modal fade" id="hallEditsModal{{ $lost_data->id }}" tabindex="-1" aria-labelledby="cusModalLabel"
aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
<div class="modal-dialog modal-xl">
<div class="modal-content">
<form action="{{ route('update.customer.hall', $lost_data->id) }}" method="post">
@csrf
@method('PUT')
<div class="modal-header">
<h5 class="modal-title" id="cusModalLabel">
Hall Booking Updates
</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<div class="row gx-3">
<div class="col-xxl-3 col-lg-3 col-sm-6">
<div class="mb-3">
<label class="form-label" for="a1">Name Of Client <span class="text-danger">*</span></label>
<input type="text" value="{{ $lost_data->client }}" class="form-control" id="client_name_edits" name="client_name_edits" placeholder="Enter Name Of Client">
@error('client_name_edits')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-3 col-sm-6">
<div class="mb-3">
<label class="form-label" for="organization">Organization <span class="text-danger">*</span></label>
<input type="hidden" value="{{ $lost_data->organization_id }}" class="form-control" id="organization_edits" name="organization_edits">
<input type="hidden" value="{{ $lost_data->organization_name }}" class="form-control" id="organization2_edits" name="organization2_edits">
<input type="text" value="{{ $lost_data->organization_name }}" class="form-control" readonly>
@error('organization_edits')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-3 col-sm-6">
<div class="mb-3">
<label class="form-label" for="a3">Mobile Number<span class="text-danger">*</span></label>
<input type="text" value="{{ $lost_data->phone_number }}" class="form-control" id="phone_number_edits" name="phone_number_edits" placeholder="Enter Mobile Number">
@error('phone_number_edits')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-3 col-sm-6" id="">
<div class="mb-3">
<label class="form-label" for="a3">Organization Name<span class="text-danger">*</span></label>
<input type="text" value="{{ $lost_data->organization_name }}" class="form-control" id="organization_name_edits" name="organization_name_edits" placeholder="Enter Organization Name">
@error('organization_name_edits')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-3 col-sm-6">
<div class="mb-3">
<label class="form-label" for="event_type">Event Type <span class="text-danger">*</span></label>
<select class="form-select" id="event_type_edits" name="event_type_edits">
<option value="{{ $lost_data->event_type }}">{{ $lost_data->event_description }}</option>
@foreach($Events as $datac)
<option value="{{ $datac->id }}">{{ $datac->description }}</option>
@endforeach
</select>
@error('event_type_edits')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-3 col-sm-6">
<div class="mb-3">
<label class="form-label" for="date_to">Participants <span class="text-danger">*</span></label>
<input type="number" min="1" value="{{ $lost_data->participants }}" class="form-control" id="participants_edits" name="participants_edits">
@error('participants_edits')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-3 col-sm-6">
<div class="mb-3">
<label class="form-label" for="date_to_edits">Date of Event <span class="text-danger">*</span></label>
<input type="date" value="{{ $lost_data->date_of_event }}" class="form-control" id="edate_edits" name="edate_edits">
@error('edate_edits')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-3 col-lg-3 col-sm-6">
<div class="mb-3">
<label class="form-label" for="date_to">Catering Option <span class="text-danger">*</span></label>
<select class="form-select" id="catering_type_edits" name="catering_type_edits">
<option value="{{ $lost_data->catering_option }}">{{ $lost_data->catering_description }}</option>
@foreach($Catering as $datacx)
<option value="{{ $datacx->id }}">{{ $datacx->description }}</option>
@endforeach
</select>
@error('catering_type_edits')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>

<div class="col-xxl-3 col-lg-3 col-sm-6">
<div class="mb-3">
<label class="form-label" for="date_to">Start Date <span class="text-danger">*</span></label>
<input type="date" value="{{ $lost_data->start_date }}" class="form-control" id="startdate_edits" name="startdate_edits">
@error('startdate_edits')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>

<div class="col-xxl-3 col-lg-3 col-sm-6">
<div class="mb-3">
<label class="form-label" for="date_to">End Date <span class="text-danger">*</span></label>
<input type="date" value="{{ $lost_data->end_date }}" class="form-control" id="enddate_edits" name="enddate_edits">
@error('enddate_edits')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>


</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
Cancel
</button>
<button type="submit" class="btn btn-primary">
Update Hall Booking
</button>
</div>
</form>
</div>
</div>
</div>
</section>
