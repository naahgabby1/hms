<section>
<div class="modal fade" id="expensesEditModal{{ $expenses->id }}" tabindex="-1" aria-labelledby="cusModalLabel"
aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<form action="{{ route('update.expenses', $expenses->id) }}" method="post">
@csrf
@method('PUT')
<div class="modal-header">
<h5 class="modal-title" id="cusModalLabel">
Update Captured Expenses
</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<div class="row gx-3">
<div class="col-xxl-6 col-lg-6 col-sm-6">
<div class="mb-3">
<label class="form-label" for="expense_cat">Expenses Type <span class="text-danger">*</span></label>
<select class="form-select" id="exp_category_edit" name="exp_category_edit">
<option value="{{ $expenses->exp_type }}">{{ $expenses->expenses_type }}</option>
@foreach($expenses_type as $expensesx)
<option value="{{ $expensesx->id }}">{{ $expensesx->expenses_type }}</option>
@endforeach
</select>
@error('exp_category_edit')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-6 col-lg-6 col-sm-6">
<div class="mb-3">
<label class="form-label" for="a2">Amount <span class="text-danger">*</span></label>
<input type="text" value="{{ $expenses->amount }}" class="form-control" id="amount_edit" name="amount_edit" placeholder="Enter Amount">
@error('amount_edit')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
<div class="col-xxl-12 col-lg-12 col-sm-12">
<div class="mb-3">
<label class="form-label" for="a3">Comments<span class="text-danger">*</span></label>
<input type="text" value="{{ $expenses->comments }}" class="form-control" id="comment_edit" name="comment_edit" placeholder="Enter Comments">
@error('comment_edit')<small class="text-danger">{{ $message }}</small>@enderror
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
