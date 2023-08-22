@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.contact.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Contact">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.contact.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.contact.fields.contact_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.contact.fields.contact_phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.contact.fields.contact_address') }}
                        </th>
                        <th>
                            {{ trans('cruds.contact.fields.contact_description') }}
                        </th>
                        <th>
                            {{ trans('cruds.contact.fields.venue_id') }}
                        </th>
                        <th>
                            {{ trans('cruds.contact.fields.created_at') }}
                        </th>
                        <th>
                            {{ trans('cruds.contact.fields.updated_at') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contact as $key => $value)
                        <tr data-entry-id="{{ $value->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $value->id ?? '' }}
                            </td>
                            <td>
                                {{ $value->contact_name ?? '' }}
                            </td>
                            <td>
                                {{ $value->contact_phone ?? '' }}
                            </td>
                            <td>
                                {{ $value->contact_address ?? '' }}
                            </td>
                            <td>
                                {{ $value->contact_description ?? '' }}
                            </td>
                            <td>
                                {{ $value->venues->name ?? '' }}
                            </td>
                            <td>
                                {{ $value->created_at ?? '' }}
                            </td>
                            <td>
                                {{ $value->updated_at ?? '' }}
                            </td>
                            <td>
                                @can(\App\Http\Resources\PermissionResource::VENUE_SHOW)
                                    <a class="btn btn-xs btn-primary"
                                       href="{{ route('admin.contact.show', $value->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can(\App\Http\Resources\PermissionResource::VENUE_DELETE)
                                    <form action="{{ route('admin.contact.destroy', $value->id) }}" method="POST"
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
                @can(\App\Http\Resources\PermissionResource::VENUE_DELETE)
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.contact.massDestroy') }}",
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
            $('.datatable-Contact:not(.ajaxTable)').DataTable({buttons: dtButtons})
            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })

    </script>
@endsection
