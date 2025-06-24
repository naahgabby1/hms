<section>
<div class="modal fade" id="usersEditModal{{$users->id}}" tabindex="-1" aria-labelledby="personalModalLabel"
aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<form action="{{ route('update.users', $users->id) }}" method="post">
@csrf
@method('PUT')
<div class="modal-header">
<h5 class="modal-title" id="resModalLabel">
Update User Account
</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<div class="row gx-3">
<div class="col-sm-12">
<div class="bg-light rounded-2 px-3 py-2 mb-3">
<h6 class="m-0">Enter Details For Updates</h6>
</div>
</div>
<div class="col-xxl-4 col-lg-4 col-sm-12 mb-3">
<label class="form-label" for="a1">User Role<span class="text-danger">*</span></label>
<select class="form-select" id="role_type_edits" name="role_type_edits">
<option value="{{ $users->user_role }}">{{ $users->role_description }}</option>
@foreach($RoleType as $roletype)
<option value="{{ $roletype->id }}">{{ $roletype->role_description }}</option>
@endforeach
</select>
@error('role_type_edits')<small class="text-danger">{{ $message }}</small>@enderror
</div>
<div class="col-xxl-4 col-lg-4 col-sm-12 mb-3">
<label class="form-label" for="a1">First Name<span class="text-danger">*</span></label>
<input type="text" class="form-control" id="first_name_edits" name="first_name_edits" value="{{ $users->first_name}}">
@error('first_name_edits')<small class="text-danger">{{ $message }}</small>@enderror
</div>
<div class="col-xxl-4 col-lg-4 col-sm-12 mb-3">
<label class="form-label" for="a1">Last Names<span class="text-danger">*</span></label>
<input type="text" class="form-control" id="last_name_edits" name="last_name_edits"value="{{ $users->last_names}}">
@error('last_name_edits')<small class="text-danger">{{ $message }}</small>@enderror
</div>
<div class="col-xxl-12 col-lg-12 col-sm-12 mb-3">
<label class="form-label" for="a1">Enter Email<span class="text-danger">*</span></label>
<input type="text" class="form-control" id="user_email_edits" name="user_email_edits" value="{{ $users->email}}">
@error('user_email_edits')<small class="text-danger">{{ $message }}</small>@enderror
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
Cancel
</button>
<button type="submit" class="btn btn-primary">
Update User
</button>
</div>
</form>
</div>
</div>
</div>
</section>
