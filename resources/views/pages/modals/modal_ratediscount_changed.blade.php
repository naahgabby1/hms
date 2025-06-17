<section>
<div class="modal fade" id="ratesModal" tabindex="-1" aria-labelledby="personalModalLabel"
aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<form action="{{ route('save.vat.discount') }}" method="post">
@csrf
@method('POST')
<div class="modal-header">
<h5 class="modal-title" id="resModalLabel">
VAT & Discount Registration
</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<div class="row gx-3">
<div class="col-sm-12">
<div class="bg-light rounded-2 px-3 py-2 mb-3">
<h6 class="m-0">Enter Details for VAT & Dicounts in %</h6>
</div>
</div>
<div class="col-xxl-6 col-lg-6 col-sm-6 mb-3">
<label class="form-label" for="a1">Enter VAT Rate %<span class="text-danger">*</span></label>
<input type="text" class="form-control" id="vat_rate" name="vat_rate" placeholder="Enter VAT Rate">
@error('vat_rate')<small class="text-danger">{{ $message }}</small>@enderror
</div>
<div class="col-xxl-6 col-lg-6 col-sm-6 mb-3" id="hideShowOld">
<label class="form-label" for="a1">Enter Discount %<span class="text-danger">*</span></label>
<input type="text" class="form-control" id="discount" name="discount" placeholder="Enter Discount Rate">
@error('discount')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
Cancel
</button>
<button type="submit" class="btn btn-primary">
Save Rates
</button>
</div>
</form>
</div>
</div>
</div>
</section>
