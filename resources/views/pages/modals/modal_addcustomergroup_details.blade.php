<section>
<div class="modal fade" id="detailCustomerClicked{{$book->id}}" tabindex="-1" aria-labelledby="cusModalLabel"
aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
<div class="modal-dialog modal-lg">
<div class="modal-content shadow-lg border-0">
<div class="modal-header bg-primary text-white">
<h5 class="modal-title" id="cusModalLabel">Multiple Booking Additions</h5>
<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body bg-light">
<div class="row gx-3">
<div class="col-12">
<div class="mb-3">
<label class="form-label fw-bold text-primary">Main Customer / Visitor</label>
<div class="d-flex justify-content-between border rounded p-2 bg-white shadow-sm">
<span class="text-dark fw-semibold">{{ strtoupper($book->name) }}</span>
<span class="badge bg-info text-dark">{{ strtoupper('DURATION : '.$actual_duration.' DAYS') }}</span>
</div>
</div>
</div>
</div>
<div class="row gx-3">
<div class="col-12">
<div class="col-12">
<label class="form-label text-primary">Added Customers</label>
<ul class="list-group mb-3 customerList">
@foreach ($book->multiple_customers_fromview as $xcustom)
<li class="list-group-item d-flex justify-content-between align-items-center">
<span><span class="badge bg-success">✔</span> {{ $xcustom->first_name }} {{ $xcustom->last_names }} ( {{ $xcustom->phone_number }} )</span>
<span>
{{ $actual_duration == 1 ? $actual_duration . ' (day)' : $actual_duration . ' (days)' }}
@
{{ $xcustom->occupancy == 1 ? $xcustom->fee : $xcustom->fee_double }}
</span>
<span class="badge bg-success">{{ $xcustom->room_description }}</span>
{{-- <span class="badge bg-success">✔</span> --}}
</li>
@endforeach
</ul>
</div>
</div>
</div>
</div>
<div class="modal-footer bg-light">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
</div>
</div>
</div>
</div>
</section>
