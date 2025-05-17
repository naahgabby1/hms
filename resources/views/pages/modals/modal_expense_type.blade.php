<section>
<div class="modal fade" id="cusModal" tabindex="-1" aria-labelledby="cusModalLabel"
aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<form action="{{ route('save.expensescategory') }}" method="post">
@csrf
@method('POST')
<div class="modal-header">
<h5 class="modal-title" id="cusModalLabel">
Expenses Categories
</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<div class="row gx-3">
<div class="col-xxl-6 col-lg-6 col-sm-12">
<div class="mb-3">
<label class="form-label" for="a1">Expenses Type / Category <span class="text-danger">*</span></label>
<input type="text" class="form-control" id="expenses_type" name="expenses_type" placeholder="Enter Expenses Type">
@error('expenses_type')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-6 col-lg-6 col-sm-12">
<div class="mb-3">
<label class="form-label" for="a2">Expenses Description <span class="text-danger">*</span></label>
<input type="text" class="form-control" id="description" name="description" placeholder="Enter Expenses Description">
@error('description')<small class="text-danger">{{ $message }}</small>@enderror
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
