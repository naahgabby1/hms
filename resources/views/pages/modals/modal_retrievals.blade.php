<section>
<div class="modal fade" id="RetrievalModal{{$lost_data->id}}" tabindex="-1" aria-labelledby="personalModalLabel"
aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<form action="{{ route('save.retrieval.entry', $lost_data->id) }}" method="post">
@csrf
@method('PUT')
<div class="modal-header">
<h5 class="modal-title" id="resModalLabel">
Details For Lost Item Retrievals
</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<div class="row gx-3">
<div class="col-sm-12">
<div class="bg-light rounded-2 px-3 py-2 mb-3">
<h6 class="m-0">Detail Of Lost Item: <span style="color: green">
    {{ $lost_data->item_description }}</span></h6>
</div>
</div>
<div class="col-xxl-8 col-lg-8 col-sm-12 mb-3">
<label class="form-label" for="a1">Remarks / Comments<span class="text-danger">*</span></label>
<input type="text" name="remarks" class="form-control" id="remarks" placeholder="Enter Comments / Remarks">
@error('remarks')<small class="text-danger">{{ $message }}</small>@enderror
</div>
<div class="col-xxl-4 col-lg-4 col-sm-12 mb-3">
<label class="form-label" for="a1">Date Retrieved<span class="text-danger">*</span></label>
<input type="date" class="form-control" id="retrieval_date" name="retrieval_date">
@error('retrieval_date')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
Cancel
</button>
<button type="submit" class="btn btn-primary">
Confirm Retrieval
</button>
</div>
</form>
</div>
</div>
</div>
</section>



