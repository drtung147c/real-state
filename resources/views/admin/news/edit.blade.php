@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.news.title_singular') }}
        </div>
        <div class="card-body">
            <form action="{{ route("admin.news.update", [$news->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                    <label for="title">{{ trans('cruds.news.fields.title') }}*</label>
                    <input type="text" id="name" name="name" class="form-control"
                           value="{{ old('title', isset($news) ? $news->title : '') }}" required>
                    @if($errors->has('title'))
                        <em class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.news.fields.title_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                    <label for="slug">{{ trans('cruds.news.fields.slug') }}*</label>
                    <input type="text" id="slug" name="slug" class="form-control"
                           value="{{ old('slug', isset($news) ? $news->slug : '') }}" required>
                    @if($errors->has('slug'))
                        <em class="invalid-feedback">
                            {{ $errors->first('slug') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.news.fields.slug_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('publish_date') ? 'has-error' : '' }}">
                    <label for="publish_date">{{ trans('cruds.news.fields.publish_date') }}*</label>
                    <input type="text" id="publish_date" name="publish_date" class="form-control datetime" value="{{ old('publish_date', isset($news) ? $news->publish_date : '') }}" required>
                    @if($errors->has('publish_date'))
                        <em class="invalid-feedback">
                            {{ $errors->first('publish_date') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.news.fields.publish_date_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('tags') ? 'has-error' : '' }}">
                    <label for="tags">{{ trans('cruds.news.fields.tags') }}
                        <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                    <select name="tags[]" id="tags" class="form-control select2" multiple="multiple">
                        @foreach($tags as $id => $tag)
                            <option value="{{ $id }}" {{ (in_array($id, old('tags', [])) || isset($news) && $news->tags->contains($id)) ? 'selected' : '' }}>{{ $tag }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('tags'))
                        <em class="invalid-feedback">
                            {{ $errors->first('tags') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.news.fields.tags_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('authors') ? 'has-error' : '' }}">
                    <label for="authors">{{ trans('cruds.news.fields.authors') }}
                        <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                    <select name="authors[]" id="tags" class="form-control select2" multiple="multiple">
                        @foreach($authors as $id => $author)
                            <option value="{{ $id }}" {{ (in_array($id, old('authors', [])) || isset($news) && $news->authors->contains($id)) ? 'selected' : '' }}>{{ $author }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('authors'))
                        <em class="invalid-feedback">
                            {{ $errors->first('authors') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.news.fields.authors_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
                    <label for="photo">{{ trans('cruds.news.fields.photo') }}</label>
                    <div class="needsclick dropzone" id="photo-dropzone">

                    </div>
                    @if($errors->has('photo'))
                        <em class="invalid-feedback">
                            {{ $errors->first('photo') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.news.fields.photo_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('short_description') ? 'has-error' : '' }}">
                    <label for="short_description">{{ trans('cruds.news.fields.short_description') }}</label>
                    <textarea id="short_description" name="short_description" class="form-control">{{ old('short_description', isset($news) ? $news->short_description : '') }}</textarea>
                    @if($errors->has('short_description'))
                        <em class="invalid-feedback">
                            {{ $errors->first('short_description') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.news.fields.short_description_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                    <label for="description">{{ trans('cruds.news.fields.description') }}</label>
                    <textarea id="description" name="description" class="form-control tinymce">{{ old('description', isset($news) ? $news->description : '') }}</textarea>
                    @if($errors->has('description'))
                        <em class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.news.fields.description_helper') }}
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
        Dropzone.options.photoDropzone = {
            url: '{{ route('admin.news.storeMedia') }}',
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
                $('form').find('input[name="photo"]').remove()
                $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="photo"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                    @if(isset($news) && $news->photo)
                var file = {!! json_encode($news->photo) !!}
                        this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, '{{ $news->photo->getUrl('thumb') }}')
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
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
@stop
