<section>
<div class="modal fade" id="enterExpenseModal" tabindex="-1" aria-labelledby="cusModalLabel"
aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<form action="{{ route('save.expenses') }}" method="post">
@csrf
@method('POST')
<div class="modal-header">
<h5 class="modal-title" id="cusModalLabel">
Capture Expense
</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<div class="row gx-3">
<div class="col-xxl-6 col-lg-6 col-sm-6">
<div class="mb-3">
<label class="form-label" for="expense_cat">Expenses Type <span class="text-danger">*</span></label>
<select class="form-select" id="exp_category" name="exp_category">
<option value="">Select</option>
@foreach($expenses_type as $expenses)
<option value="{{ $expenses->id }}">{{ $expenses->expenses_type }}</option>
@endforeach
</select>
@error('exp_category')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-6 col-lg-6 col-sm-6">
<div class="mb-3">
<label class="form-label" for="a2">Amount <span class="text-danger">*</span></label>
<input type="text" class="form-control" id="amount" name="amount" placeholder="Enter Last Name">
@error('amount')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-12 col-lg-12 col-sm-12">
<div class="mb-3">
<label class="form-label" for="a3">Comments<span class="text-danger">*</span></label>
<input type="text" class="form-control" id="comment" name="comment" placeholder="Enter Mobile Number">
@error('comment')<small class="text-danger">{{ $message }}</small>@enderror
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
