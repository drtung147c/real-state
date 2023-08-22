@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.news.title') }}
        </div>

        <div class="card-body">
            <div class="mb-2">
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.news.fields.id') }}
                        </th>
                        <td>
                            {{ $news->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.news.fields.publish_date') }}
                        </th>
                        <td>
                            {{ $news->publish_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.news.fields.title') }}
                        </th>
                        <td>
                            {{ $news->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.news.fields.slug') }}
                        </th>
                        <td>
                            {{ $news->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.news.fields.tags') }}
                        </th>
                        <td>
                            @foreach($news->tags as $id => $tag)
                                <span class="badge badge-info">{{ $tag->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.news.fields.authors') }}
                        </th>
                        <td>
                            @foreach($news->authors as $id => $author)
                                <span class="badge badge-info">{{ $author->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.news.fields.photo') }}
                        </th>
                        <td>
                            @if($news->photo)
                                <a href="{{ $news->photo->getUrl() }}" target="_blank">
                                    <img src="{{ $news->photo->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.news.fields.short_description') }}
                        </th>
                        <td>
                            <textarea id="short_description" class="form-control" disabled>{{ old('short_description', isset($news) ? $news->short_description : '') }}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.news.fields.description') }}
                        </th>
                        <td>
                            <textarea id="description" class="form-control tinymce">{{ old('description', isset($news) ? $news->description : '') }}</textarea>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>

            <nav class="mb-3">
                <div class="nav nav-tabs">

                </div>
            </nav>
            <div class="tab-content">

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        $(function () {
            tinymce.activeEditor.setMode('readonly');
        })
    </script>
@endsection
