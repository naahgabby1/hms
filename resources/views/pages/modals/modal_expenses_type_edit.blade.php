<section>
<div class="modal fade" id="expensesEditModal{{ $type->id }}" tabindex="-1" aria-labelledby="cusModalLabel"
aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<form action="{{ route('update.expensescategory', $type->id ) }}" method="post">
@csrf
@method('PUT')
<div class="modal-header">
<h5 class="modal-title" id="cusModalLabel">
Expenses Categories Update
</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<div class="row gx-3">
<div class="col-xxl-6 col-lg-6 col-sm-12">
<div class="mb-3">
<label class="form-label" for="a1">Expenses Type / Category <span class="text-danger">*</span></label>
<input type="text" value="{{ $type->expenses_type }}" class="form-control" id="expenses_type_edits" name="expenses_type_edits" placeholder="Enter First Name">
@error('expenses_type_edits')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-6 col-lg-6 col-sm-12">
<div class="mb-3">
<label class="form-label" for="a2">Expenses Description <span class="text-danger">*</span></label>
<input type="text" value="{{ $type->description }}" class="form-control" id="description_edits" name="description_edits" placeholder="Enter Last Name">
@error('description_edits')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
Cancel
</button>
<button type="submit" class="btn btn-primary">
Update
</button>
</div>
</form>
</div>
</div>
</div>
</section>
