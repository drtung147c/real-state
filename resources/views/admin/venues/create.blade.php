@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.venue.title_singular') }}
    </div>

    <div class="card-body">
        <form id="create-form" action="{{ route("admin.venues.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.venue.fields.user_name') }}*</label>
                <input type="hidden" id="user_id" name="user_id" class="form-control" value="{{ $user->id }}">
                <input type="text" id="user_name" class="form-control" value="{{ $user->name }}" disabled>
            </div>
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.venue.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($venue) ? $venue->name : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.venue.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                <label for="slug">{{ trans('cruds.venue.fields.slug') }}*</label>
                <input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug', isset($venue) ? $venue->slug : '') }}" required>
                @if($errors->has('slug'))
                    <em class="invalid-feedback">
                        {{ $errors->first('slug') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.venue.fields.slug_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                <label for="status">{{ trans('cruds.venue.fields.status') }}</label>
                <input name="status" type="hidden" value="0">
                <input value="1" type="checkbox" id="status" name="status" {{ old('status', 0) == 1 ? 'checked' : '' }}>
                @if($errors->has('status'))
                    <em class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.venue.fields.status_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('location_id') ? 'has-error' : '' }}">
                <label for="location">{{ trans('cruds.venue.fields.location') }}*</label>
                <select name="location_id" id="location" class="form-control select2" required>
                    @foreach($locations as $id => $location)
                        <option value="{{ $id }}" {{ (isset($venue) && $venue->location ? $venue->location->id : old('location_id')) == $id ? 'selected' : '' }}>{{ $location }}</option>
                    @endforeach
                </select>
                @if($errors->has('location_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('location_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('event_types') ? 'has-error' : '' }}">
                <label for="event_types">{{ trans('cruds.venue.fields.event_types') }}
                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                <select name="event_types[]" id="event_types" class="form-control select2" multiple="multiple">
                    @foreach($event_types as $id => $event_types)
                        <option value="{{ $id }}" {{ (in_array($id, old('event_types', [])) || isset($venue) && $venue->event_types->contains($id)) ? 'selected' : '' }}>{{ $event_types }}</option>
                    @endforeach
                </select>
                @if($errors->has('event_types'))
                    <em class="invalid-feedback">
                        {{ $errors->first('event_types') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.venue.fields.event_types_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('is_sold') ? 'has-error' : '' }}">
                <label for="is_sold">{{ trans('cruds.venue.fields.is_sold') }}</label>
                <select name="is_sold" id="is_sold" class="form-control select">
                    @foreach($isSoldOptions as $option)
                        <option value="{{ $option['value'] }}" {{ (isset($venue) && $venue->is_sold ? $venue->is_sold : old('is_sold')) == $option['value'] ? 'selected' : '' }}>{{ $option['label'] }}</option>
                    @endforeach
                </select>
                @if($errors->has('is_sold'))
                    <em class="invalid-feedback">
                        {{ $errors->first('is_sold') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.venue.fields.is_sold_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('area') ? 'has-error' : '' }}">
                <label for="area">{{ trans('cruds.venue.fields.area') }}</label>
                <input type="number" id="area" name="area" class="form-control" value="{{ old('area', isset($venue) ? $venue->area : '') }}" step="0.01">
                @if($errors->has('area'))
                    <em class="invalid-feedback">
                        {{ $errors->first('area') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.venue.fields.area_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('construction') ? 'has-error' : '' }}">
                <label for="construction">{{ trans('cruds.venue.fields.construction') }}</label>
                <input type="number" id="construction" name="construction" class="form-control" value="{{ old('area', isset($venue) ? $venue->construction : '') }}" step="0.01">
                @if($errors->has('construction'))
                    <em class="invalid-feedback">
                        {{ $errors->first('construction') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.venue.fields.construction_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('floor') ? 'has-error' : '' }}">
                <label for="floor">{{ trans('cruds.venue.fields.floor') }}</label>
                <input type="number" id="floor" name="floor" class="form-control" value="{{ old('area', isset($venue) ? $venue->floor : '') }}">
                @if($errors->has('floor'))
                    <em class="invalid-feedback">
                        {{ $errors->first('floor') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.venue.fields.floor_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('room') ? 'has-error' : '' }}">
                <label for="room">{{ trans('cruds.venue.fields.room') }}</label>
                <input type="number" id="room" name="room" class="form-control" value="{{ old('area', isset($venue) ? $venue->room : '') }}">
                @if($errors->has('room'))
                    <em class="invalid-feedback">
                        {{ $errors->first('room') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.venue.fields.room_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('bath_room') ? 'has-error' : '' }}">
                <label for="bath_room">{{ trans('cruds.venue.fields.bath_room') }}</label>
                <input type="number" id="bath_room" name="bath_room" class="form-control" value="{{ old('area', isset($venue) ? $venue->bath_room : '') }}">
                @if($errors->has('bath_room'))
                    <em class="invalid-feedback">
                        {{ $errors->first('bath_room') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.venue.fields.bath_room_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('direction') ? 'has-error' : '' }}">
                <label for="direction">{{ trans('cruds.venue.fields.direction') }}</label>
                <input type="text" id="direction" name="direction" class="form-control" value="{{ old('area', isset($venue) ? $venue->direction : '') }}">
                @if($errors->has('direction'))
                    <em class="invalid-feedback">
                        {{ $errors->first('direction') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.venue.fields.direction_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('book_status') ? 'has-error' : '' }}">
                <label for="book_status">{{ trans('cruds.venue.fields.book_status') }}</label>
                <select name="book_status" id="book_status" class="form-control select">
                    @foreach($yesNoOptions as $option)
                        <option value="{{ $option['value'] }}" {{ (isset($venue) && $venue->book_status ? $venue->book_status : old('book_status')) == $option['value'] ? 'selected' : '' }}>{{ $option['label'] }}</option>
                    @endforeach
                </select>
                @if($errors->has('book_status'))
                    <em class="invalid-feedback">
                        {{ $errors->first('book_status') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.venue.fields.book_status_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('book_ownership_status') ? 'has-error' : '' }}">
                <label for="book_ownership_status">{{ trans('cruds.venue.fields.book_ownership_status') }}</label>
                <select name="book_ownership_status" id="book_ownership_status" class="form-control select">
                    @foreach($ownershipStatusOptions as $option)
                        <option value="{{ $option['value'] }}" {{ (isset($venue) && $venue->book_ownership_status ? $venue->book_ownership_status : old('book_ownership_status')) == $option['value'] ? 'selected' : '' }}>{{ $option['label'] }}</option>
                    @endforeach
                </select>
                @if($errors->has('book_ownership_status'))
                    <em class="invalid-feedback">
                        {{ $errors->first('book_ownership_status') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.venue.fields.book_ownership_status_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('house_status') ? 'has-error' : '' }}">
                <label for="house_status">{{ trans('cruds.venue.fields.house_status') }}</label>
                <select name="house_status" id="house_status" class="form-control select">
                    @foreach($houseStatusOptions as $option)
                        <option value="{{ $option['value'] }}" {{ (isset($venue) && $venue->house_status ? $venue->house_status : old('house_status')) == $option['value'] ? 'selected' : '' }}>{{ $option['label'] }}</option>
                    @endforeach
                </select>
                @if($errors->has('house_status'))
                    <em class="invalid-feedback">
                        {{ $errors->first('house_status') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.venue.fields.house_status_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('school_facility') ? 'has-error' : '' }}">
                <label for="school_facility">{{ trans('cruds.venue.fields.school_facility') }}</label>
                <select name="school_facility" id="school_facility" class="form-control select">
                    @foreach($yesNoOptions as $option)
                        <option value="{{ $option['value'] }}" {{ (isset($venue) && $venue->school_facility ? $venue->school_facility : old('school_facility')) == $option['value'] ? 'selected' : '' }}>{{ $option['label'] }}</option>
                    @endforeach
                </select>
                @if($errors->has('school_facility'))
                    <em class="invalid-feedback">
                        {{ $errors->first('school_facility') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.venue.fields.school_facility_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('hospital_facility') ? 'has-error' : '' }}">
                <label for="hospital_facility">{{ trans('cruds.venue.fields.hospital_facility') }}</label>
                <select name="hospital_facility" id="hospital_facility" class="form-control select">
                    @foreach($yesNoOptions as $option)
                        <option value="{{ $option['value'] }}" {{ (isset($venue) && $venue->hospital_facility ? $venue->hospital_facility : old('hospital_facility')) == $option['value'] ? 'selected' : '' }}>{{ $option['label'] }}</option>
                    @endforeach
                </select>
                @if($errors->has('hospital_facility'))
                    <em class="invalid-feedback">
                        {{ $errors->first('hospital_facility') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.venue.fields.hospital_facility_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('market_facility') ? 'has-error' : '' }}">
                <label for="market_facility">{{ trans('cruds.venue.fields.market_facility') }}</label>
                <select name="market_facility" id="market_facility" class="form-control select">
                    @foreach($yesNoOptions as $option)
                        <option value="{{ $option['value'] }}" {{ (isset($venue) && $venue->market_facility ? $venue->market_facility : old('market_facility')) == $option['value'] ? 'selected' : '' }}>{{ $option['label'] }}</option>
                    @endforeach
                </select>
                @if($errors->has('market_facility'))
                    <em class="invalid-feedback">
                        {{ $errors->first('market_facility') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.venue.fields.market_facility_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('park_facility') ? 'has-error' : '' }}">
                <label for="park_facility">{{ trans('cruds.venue.fields.park_facility') }}</label>
                <select name="park_facility" id="park_facility" class="form-control select">
                    @foreach($yesNoOptions as $option)
                        <option value="{{ $option['value'] }}" {{ (isset($venue) && $venue->park_facility ? $venue->park_facility : old('park_facility')) == $option['value'] ? 'selected' : '' }}>{{ $option['label'] }}</option>
                    @endforeach
                </select>
                @if($errors->has('park_facility'))
                    <em class="invalid-feedback">
                        {{ $errors->first('park_facility') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.venue.fields.park_facility_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('is_rent') ? 'has-error' : '' }}">
                <label for="is_rent">{{ trans('cruds.venue.fields.is_rent') }}</label>
                <select name="is_rent" id="is_rent" class="form-control select">
                    @foreach($yesNoOptions as $option)
                        <option value="{{ $option['value'] }}" {{ (isset($venue) && $venue->is_rent ? $venue->is_rent : old('is_rent')) == $option['value'] ? 'selected' : '' }}>{{ $option['label'] }}</option>
                    @endforeach
                </select>
                @if($errors->has('is_rent'))
                    <em class="invalid-feedback">
                        {{ $errors->first('is_rent') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.venue.fields.is_rent_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                <label for="address">{{ trans('cruds.venue.fields.address') }}*</label>
                <input type="text" id="address" name="address" class="form-control" value="{{ old('address', isset($venue) ? $venue->address : '') }}" required>
                @if($errors->has('address'))
                    <em class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.venue.fields.address_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('latitude') ? 'has-error' : '' }}">
                <label for="latitude">{{ trans('cruds.venue.fields.latitude') }}</label>
                <input type="number" id="latitude" name="latitude" class="form-control" value="{{ old('latitude', isset($venue) ? $venue->latitude : '') }}" step="0.00000001">
                @if($errors->has('latitude'))
                    <em class="invalid-feedback">
                        {{ $errors->first('latitude') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.venue.fields.latitude_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('longitude') ? 'has-error' : '' }}">
                <label for="longitude">{{ trans('cruds.venue.fields.longitude') }}</label>
                <input type="number" id="longitude" name="longitude" class="form-control" value="{{ old('longitude', isset($venue) ? $venue->longitude : '') }}" step="0.00000001">
                @if($errors->has('longitude'))
                    <em class="invalid-feedback">
                        {{ $errors->first('longitude') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.venue.fields.longitude_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">{{ trans('cruds.venue.fields.description') }}</label>
                <textarea id="description" name="description" class="form-control tinymce">{{ old('description', isset($venue) ? $venue->description : '') }}</textarea>
                @if($errors->has('description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.venue.fields.description_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('features') ? 'has-error' : '' }}">
                <label for="features">{{ trans('cruds.venue.fields.features') }}</label>
                <textarea id="features" name="features" class="form-control ">{{ old('features', isset($venue) ? $venue->features : '') }}</textarea>
                @if($errors->has('features'))
                    <em class="invalid-feedback">
                        {{ $errors->first('features') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.venue.fields.features_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                <label for="price">{{ trans('cruds.venue.fields.price') }}</label>
                <input type="number" id="price" name="price" class="form-control" value="{{ old('price', isset($venue) ? $venue->price : '') }}" step="0.01">
                @if($errors->has('price'))
                    <em class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.venue.fields.price_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('main_photo') ? 'has-error' : '' }}">
                <label for="main_photo">{{ trans('cruds.venue.fields.main_photo') }}</label>
                <div class="needsclick dropzone" id="main_photo-dropzone">

                </div>
                @if($errors->has('main_photo'))
                    <em class="invalid-feedback">
                        {{ $errors->first('main_photo') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.venue.fields.main_photo_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('gallery') ? 'has-error' : '' }}">
                <label for="gallery">{{ trans('cruds.venue.fields.gallery') }}</label>
                <div class="needsclick dropzone" id="gallery-dropzone">

                </div>
                @if($errors->has('gallery'))
                    <em class="invalid-feedback">
                        {{ $errors->first('gallery') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.venue.fields.gallery_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('priority') ? 'has-error' : '' }}">
                <label for="priority">{{ trans('cruds.venue.fields.priority') }}</label>
                <select name="priority" id="priority" class="form-control select">
                    @foreach($priorityOptions as $option)
                        <option value="{{ $option['value'] }}" {{ (isset($venue) && $venue->priority ? $venue->priority : old('priority')) == $option['value'] ? 'selected' : '' }}>{{ $option['label'] }}</option>
                    @endforeach
                </select>
                @if($errors->has('priority'))
                    <em class="invalid-feedback">
                        {{ $errors->first('priority') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.venue.fields.priority_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('is_featured') ? 'has-error' : '' }}">
                <label for="is_featured">{{ trans('cruds.venue.fields.is_featured') }}</label>
                <input name="is_featured" type="hidden" value="0">
                <input value="1" type="checkbox" id="is_featured" name="is_featured" {{ old('is_featured', 0) == 1 ? 'checked' : '' }}>
                @if($errors->has('is_featured'))
                    <em class="invalid-feedback">
                        {{ $errors->first('is_featured') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.venue.fields.is_featured_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection

@section('scripts')
<script>
    Dropzone.options.mainPhotoDropzone = {
    url: '{{ route('admin.venues.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form#create-form').find('input[name="main_photo"]').remove()
      $('form#create-form').append('<input type="hidden" name="main_photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form#create-form').find('input[name="main_photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($venue) && $venue->main_photo)
      var file = {!! json_encode($venue->main_photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, '{{ $venue->main_photo->getUrl('thumb') }}')
      file.previewElement.classList.add('dz-complete')
      $('form#create-form').append('<input type="hidden" name="main_photo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
<script>
    var uploadedGalleryMap = {}
Dropzone.options.galleryDropzone = {
    url: '{{ route('admin.venues.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form#create-form').append('<input type="hidden" name="gallery[]" value="' + response.name + '">')
      uploadedGalleryMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedGalleryMap[file.name]
      }
      $('form#create-form').find('input[name="gallery[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($venue) && $venue->gallery)
      var files =
        {!! json_encode($venue->gallery) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.url)
          file.previewElement.classList.add('dz-complete')
          $('form#create-form').append('<input type="hidden" name="gallery[]" value="' + file.file_name + '">')
        }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@stop
