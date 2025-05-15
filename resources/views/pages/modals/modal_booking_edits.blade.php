<section>
    <div class="modal fade" id="resModalUpdates{{$book->id}}" tabindex="-1" aria-labelledby="resModalUpdatesLabel"
    aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-xl">
    <div class="modal-content">
    <form action="{{ route('edit.booking', $book->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="modal-header">
    <h5 class="modal-title" id="resModalUpdatesLabel">
    Update Booking Data
    </h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
    <div class="row gx-3">
    <div class="col-sm-12">
    <div class="bg-light rounded-2 px-3 py-2 mb-3">
    <h6 class="m-0">Booking Details For Update</h6>
    </div>
    </div>
    <div class="col-xxl-3 col-lg-4 col-sm-6">
    <div class="mb-3">
    <label class="form-label" for="a1">First Name <span class="text-danger">*</span></label>
    <input type="text" value="{{$book->first_name}}" class="form-control" id="first_name_edit" name="first_name_edit" placeholder="Enter First Name">
    @error('first_name')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
    </div>
    <div class="col-xxl-3 col-lg-4 col-sm-6">
    <div class="mb-3">
    <label class="form-label" for="a2">Last Name <span class="text-danger">*</span></label>
    <input type="text" value="{{$book->last_name}}" class="form-control" id="last_name_edit" name="last_name_edit" placeholder="Enter Last Name">
    @error('last_name')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
    </div>
    <div class="col-xxl-3 col-lg-4 col-sm-6">
    <div class="mb-3">
    <label class="form-label" for="a3">Mobile Number<span class="text-danger">*</span></label>
    <input type="text" value="{{$book->mobile_number}}" class="form-control" id="mobile_phone_edit" name="mobile_phone_edit" placeholder="Enter Mobile Number">
    @error('mobile_phone')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
    </div>
    <div class="col-xxl-3 col-lg-4 col-sm-6">
    <div class="mb-3">
    <label class="form-label" for="selectGender1">Gender <span
    class="text-danger">*</span></label>
    <div class="m-0">
    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="gender_edit" id="gender_edit"
    value="male" {{ $book->gender === 'male' ? 'checked' : '' }}>
    <label class="form-check-label" for="gender">Male</label>
    </div>
    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="gender_edit" id="gender_edit"
    value="female" {{ $book->gender === 'female' ? 'checked' : '' }}>
    <label class="form-check-label" for="gender">Female</label>
    </div>
    </div>
    @error('gender')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
    </div>
    <div class="col-xxl-3 col-lg-4 col-sm-6">
    <div class="mb-3">
    <label class="form-label" for="date_from">Date From <span class="text-danger">*</span></label>
    <input type="date" value="{{$book->date_from}}" class="form-control" id="date_from_edit" name="date_from_edit" placeholder="Enter Date From">
    @error('date_from')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
    </div>
    <div class="col-xxl-3 col-lg-4 col-sm-6">
    <div class="mb-3">
    <label class="form-label" for="date_to">Date To <span class="text-danger">*</span></label>
    <input type="date" value="{{$book->date_to}}" class="form-control" id="date_to_edit" name="date_to_edit" placeholder="Enter Date To">
    @error('date_to')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
    </div>
    <div class="col-xxl-3 col-lg-4 col-sm-6">
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
    <div class="col-xxl-3 col-lg-4 col-sm-6">
    <div class="mb-3">
    <label class="form-label" for="city">City <span class="text-danger">*</span></label>
    <input type="text" value="{{$book->city}}" class="form-control" id="city_edit" name="city_edit" placeholder="Enter City">
    @error('city')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
    </div>
    <div class="col-xxl-3 col-lg-4 col-sm-6">
    <div class="mb-3">
    <label class="form-label" for="room_type">Room Type <span class="text-danger">*</span></label>
    <select class="form-select room_type_edits" name="room_type_edit">
    <option value="{{$book->room_type_id}}">{{$book->description}} ( {{$book->alias}} )</option>
    @foreach($RoomType as $roomtype)
    <option value="{{ $roomtype->id }}">{{ $roomtype->description.' ('.strtoupper($roomtype->alias).')' }}</option>
    @endforeach
    </select>
    @error('room_type')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
    </div>
    <div class="col-xxl-3 col-lg-4 col-sm-6">
    <div class="mb-3">
    <label class="form-label" for="room">Room <span class="text-danger">*</span></label>
    <select class="form-select room_edit" name="room_edit">
    <option value="{{$book->room_id}}">{{$book->room}}</option>
    </select>
    @error('room')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
    </div>
    <div class="col-xxl-6 col-lg-4 col-sm-6">
    <div class="mb-3">
    <label class="form-label" for="address_edit">Address <span class="text-danger">*</span></label>
    <input type="text" value="{{$book->address}}" class="form-control" id="address_edit" name="address_edit" placeholder="Enter Customer Address">
    @error('address')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
    </div>
    </div>
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
    Cancel Update
    </button>
    <button type="submit" class="btn btn-primary">
    Update Booking
    </button>
    </div>
    </form>
    </div>
    </div>
    </div>
    </section>
