@extends('layouts.admin')
@section('content')
@can(\App\Http\Resources\PermissionResource::VENUE_CREATE)
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.venues.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.venue.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.venue.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Venue">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.venue.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.venue.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.venue.fields.slug') }}
                        </th>
                        <th>
                            {{ trans('cruds.venue.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.venue.fields.location') }}
                        </th>
                        <th>
                            {{ trans('cruds.venue.fields.event_types') }}
                        </th>
                        <th>
                            {{ trans('cruds.venue.fields.address') }}
                        </th>
                        <th>
                            {{ trans('cruds.venue.fields.latitude') }}
                        </th>
                        <th>
                            {{ trans('cruds.venue.fields.longitude') }}
                        </th>
                        <th>
                            {{ trans('cruds.venue.fields.price') }}
                        </th>
                        <th>
                            {{ trans('cruds.venue.fields.main_photo') }}
                        </th>
                        <th>
                            {{ trans('cruds.venue.fields.is_featured') }}
                        </th>
                        <th>
                            {{ trans('cruds.venue.fields.priority') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($venues as $key => $venue)
                        <tr data-entry-id="{{ $venue->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $venue->id ?? '' }}
                            </td>
                            <td>
                                {{ $venue->name ?? '' }}
                            </td>
                            <td>
                                {{ $venue->slug ?? '' }}
                            </td>
                            <td>
                                <span class="badge {{ $venue->status ? 'badge-success' : 'badge-danger'}}">
                                    {{ $statusResource->getLabel($venue->status) }}
                                </span>
                            </td>
                            <td>
                                {{ $venue->location->name ?? '' }}
                            </td>
                            <td>
                                @foreach($venue->event_types as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $venue->address ?? '' }}
                            </td>
                            <td>
                                {{ $venue->latitude ?? '' }}
                            </td>
                            <td>
                                {{ $venue->longitude ?? '' }}
                            </td>
                            <td>
                                {{ $venue->price ?? '' }}
                            </td>
                            <td>
                                @if($venue->main_photo)
                                    <a href="{{ $venue->main_photo->getUrl() }}" target="_blank">
                                        <img src="{{ $venue->main_photo->getUrl('thumb') }}" width="50px" height="50px">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $venue->is_featured ? trans('global.yes') : trans('global.no') }}
                            </td>
                            <td>
                                {{ $priorityResource->getLabel($venue->priority) }}
                            </td>
                            <td>
                                @can(\App\Http\Resources\PermissionResource::VENUE_SHOW)
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.venues.show', $venue->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can(\App\Http\Resources\PermissionResource::VENUE_EDIT)
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.venues.edit', $venue->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can(\App\Http\Resources\PermissionResource::VENUE_DELETE)
                                    <form action="{{ route('admin.venues.destroy', $venue->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
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
    url: "{{ route('admin.venues.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
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
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Venue:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
