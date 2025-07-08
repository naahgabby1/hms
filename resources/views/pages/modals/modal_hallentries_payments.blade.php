<section>
<div class="modal fade" id="hallPaymentsModal{{$lost_data->id}}" tabindex="-1" aria-labelledby="cusModalLabel"
aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
<div class="modal-dialog modal-lg">
<div class="modal-content shadow-lg border-0">
<form action="{{ route('save.hall.payments', $lost_data->id) }}" method="post">
@csrf
@method('POST')
<div class="modal-header bg-primary text-white">
<h5 class="modal-title" id="cusModalLabel">Booked Hall Payments</h5>
<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body bg-light">
<div class="row gx-3">
<div class="col-12">
<div class="mb-3">
<label class="form-label fw-bold text-primary">Organization (Client Name)</label>
<div class="d-flex justify-content-between border rounded p-2 bg-white shadow-sm">
<span class="text-dark fw-semibold">{{ strtoupper($lost_data->organization_name.' ('.$lost_data->client.')') }}</span>
<span class="badge bg-info text-dark">{{ strtoupper('DURATION : '.$duration.' DAYS') }}</span>
</div>
<div class="row mt-2 gx-3">
<div class="col-xxl-8 col-xl-8 col-md-8 col-sm-12 col-xs-12">
<label class="form-label" for="a3">Event Category/Type<span class="text-danger">*</span></label>
<input type="text" value="{{ strtoupper($lost_data->event_description) }}" class="form-control" readonly>
</div>
<div class="col-xxl-4 col-xl-4 col-md-4 col-sm-12 col-xs-12">
<label class="form-label" for="a3">Payment Amount Entry<span class="text-danger">*</span></label>
<input type="number" class="form-control" id="paid_amounts" name="paid_amounts" placeholder="Enter Payment Amount">
@error('paid_amounts')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
</div>
</div>
</div>
</div>
<div class="modal-footer bg-light">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
<button type="submit" class="btn btn-primary">
Submit Payments
</button>
</div>
</form>
</div>
</div>
</div>
</section>
