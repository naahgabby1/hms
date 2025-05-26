<section>
    <div class="modal fade" id="companyBookingUpdates{{$book->id}}" tabindex="-1" aria-labelledby="resModalUpdatesLabel"
    aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-xl">
    <div class="modal-content">
    <form action="{{ route('edit.booking', $book->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="modal-header">
    <h5 class="modal-title" id="resModalUpdatesLabel">
    Update Organization Booking & Checked-In Data
    </h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
    <div class="row gx-3">
    <div class="col-sm-12">
    <div class="bg-light rounded-2 px-3 py-2 mb-3">
    <h6 class="m-0">Organization Booking & Checked-in Details For Update</h6>
    </div>
    </div>
    <div class="col-xxl-6 col-lg-6 col-sm-12">
    <div class="mb-3">
    <label class="form-label" for="a1">Name of Organization <span class="text-danger">*</span></label>
    <input type="text" value="{{$book->first_name}}" class="form-control" id="first_name_edit" name="first_name_edit" placeholder="Enter First Name">
    @error('first_name')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
    </div>
    <input type="hidden" value="{{$book->last_name}}" id="last_name_edit" name="last_name_edit">
    <div class="col-xxl-3 col-lg-4 col-sm-12">
    <div class="mb-3">
    <label class="form-label" for="a3">Mobile Number<span class="text-danger">*</span></label>
    <input type="text" value="{{$book->mobile_number}}" class="form-control" id="mobile_phone_edit" name="mobile_phone_edit" placeholder="Enter Mobile Number">
    @error('mobile_phone')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
    </div>
    <div class="col-xxl-3 col-lg-4 col-sm-12">
    @php
    $null = 1;
    @endphp
    <input type="hidden" name="gender_edit" value="{{ $null }}">
    <div class="mb-3">
    <label class="form-label" for="selectGender1">Category <span
    class="text-danger"></span></label>
    <div class="m-0">
    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" checked>
    <label class="form-check-label" for="gender">Corporate Organization</label>
    </div>
    </div>
    </div>
    </div>
    <div class="col-xxl-3 col-lg-4 col-sm-12">
    <input type="hidden" id="date_from_edit" name="date_from_edit" value="{{$book->date_from}}">
    <div class="mb-3">
    <label class="form-label" for="date_from">Date From <span class="text-danger">Disabled *</span></label>
    <input type="date" value="{{$book->date_from}}"
    class="form-control" disabled>
    @error('date_from')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
    </div>
    <div class="col-xxl-3 col-lg-4 col-sm-12">
    <div class="mb-3">
    <label class="form-label" for="date_to">Date To <span class="text-danger">*</span></label>
    <input type="date" value="{{$book->date_to}}" class="form-control" id="date_to_edit" name="date_to_edit" placeholder="Enter Date To">
    @error('date_to')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
    </div>
    <div class="col-xxl-3 col-lg-4 col-sm-12">
    <div class="mb-3">
    <label class="form-label" for="country">Country <span class="text-danger">*</span></label>
    <select class="form-select" id="country_edit" name="country_edit">
    <option value="{{$book->country}}">{{$book->country}}</option>
    @foreach($Countries as $country)
    <option value="{{ $country->name }}">{{ $country->name }}</option>
    @endforeach
    </select>
    @error('country')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
    </div>
    <div class="col-xxl-3 col-lg-4 col-sm-12">
    <div class="mb-3">
    <label class="form-label" for="city">City <span class="text-danger"></span></label>
    <input type="text" value="{{$book->city}}" class="form-control" id="city_edit" name="city_edit" placeholder="Enter City">
    @error('city')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
    </div>
    <div class="col-xxl-3 col-lg-4 col-sm-12">
    <div class="mb-3">
    <label class="form-label" for="room_type">Room Type <span class="text-danger">Disabled *</span></label>
    <input type="hidden" value="{{$book->room_type_id}}" name="room_type_edit">
    <select class="form-select room_type_edits" disabled>
    <option value="{{$book->room_type_id}}">{{$book->description}} ( {{$book->alias}} )</option>
    @foreach($RoomType as $roomtype)
    <option value="{{ $roomtype->id }}">{{ $roomtype->description.' ('.strtoupper($roomtype->alias).')' }}</option>
    @endforeach
    </select>
    @error('room_type')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
    </div>
    <div class="col-xxl-3 col-lg-4 col-sm-12">
    <div class="mb-3">
    <input type="hidden" value="{{$book->room_id}}" name="room_edit">
    <label class="form-label" for="room">Room <span class="text-danger">Disabled *</span></label>
    <select class="form-select room_edit" disabled>
    <option value="{{$book->room_id}}">{{$book->room}}</option>
    </select>
    @error('room')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
    </div>
    <div class="col-xxl-6 col-lg-4 col-sm-12">
    <div class="mb-3">
    <label class="form-label" for="address_edit">Address <span class="text-danger"></span></label>
    <input type="text" value="{{$book->address}}" class="form-control" id="address_edit" name="address_edit" placeholder="Enter Customer Address">
    @error('address')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
    </div>
    </div>
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
    Cancel
    </button>
    <button type="submit" class="btn btn-primary">
    Save Changes
    </button>
    </div>
    </form>
    </div>
    </div>
    </div>
    </section>
