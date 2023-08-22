@extends('layouts.admin')
@section('content')
    @can(\App\Http\Resources\PermissionResource::NEWS_CREATE)
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.news.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.news.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.news.title_singular') }} {{ trans('global.list') }}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-New">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.news.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.news.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.news.fields.slug') }}
                        </th>
                        <th>
                            {{ trans('cruds.news.fields.publish_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.news.fields.photo') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($news as $new)
                        <tr data-entry-id="{{ $new->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $new->id ?? '' }}
                            </td>
                            <td>
                                {{ $new->title ?? '' }}
                            </td>
                            <td>
                                {{ $new->slug ?? '' }}
                            </td>
                            <td>
                                {{ $new->publish_date ?? '' }}
                            </td>
                            <td>
                                @if($new->photo)
                                    <a href="{{ $new->photo->getUrl() }}" target="_blank">
                                        <img src="{{ $new->photo->getUrl('thumb') }}" width="50px" height="50px">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @can(\App\Http\Resources\PermissionResource::NEWS_SHOW)
                                    <a class="btn btn-xs btn-primary"
                                       href="{{ route('admin.news.show', $new->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can(\App\Http\Resources\PermissionResource::NEWS_EDIT)
                                    <a class="btn btn-xs btn-info"
                                       href="{{ route('admin.news.edit', $new->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can(\App\Http\Resources\PermissionResource::NEWS_DELETE)
                                    <form action="{{ route('admin.news.destroy', $new->id) }}" method="POST"
                                          onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                          style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger"
                                               value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        $(function () {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
                @can(\App\Http\Resources\PermissionResource::NEWS_DELETE)
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.news.massDestroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({selected: true}).nodes(), function (entry) {
                        return $(entry).data('entry-id')
                    });

                    if (ids.length === 0) {
                        alert('{{ trans('global.datatables.zero_selected') }}')

                        return
                    }

                    if (confirm('{{ trans('global.areYouSure') }}')) {
                        $.ajax({
                            headers: {'x-csrf-token': _token},
                            method: 'POST',
                            url: config.url,
                            data: {ids: ids, _method: 'DELETE'}
                        })
                            .done(function () {
                                location.reload()
                            })
                    }
                }
            }
            dtButtons.push(deleteButton)
            @endcan
            $.extend(true, $.fn.dataTable.defaults, {
                order: [[1, 'desc']],
                pageLength: 100,
            });
            $('.datatable-New:not(.ajaxTable)').DataTable({buttons: dtButtons})
            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })
    </script>
@endsection
