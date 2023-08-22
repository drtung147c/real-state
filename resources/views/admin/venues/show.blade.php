@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.venue.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.venue.fields.user_name') }}
                        </th>
                        <td>
                            {{ $venue->users->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.venue.fields.id') }}
                        </th>
                        <td>
                            {{ $venue->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.venue.fields.name') }}
                        </th>
                        <td>
                            {{ $venue->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.venue.fields.slug') }}
                        </th>
                        <td>
                            {{ $venue->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.venue.fields.status') }}
                        </th>
                        <td>
                            <span class="badge {{ $venue->status ? 'badge-success' : 'badge-danger'}}">
                                {{ $statusResource->getLabel($venue->status) }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.venue.fields.location') }}
                        </th>
                        <td>
                            {{ $venue->location->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.venue.fields.event_types') }}
                        </th>
                        <td>
                            @foreach($venue->event_types as $id => $event_types)
                                <span class="label label-info label-many">{{ $event_types->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.venue.fields.is_sold') }}
                        </th>
                        <td>
                            {{ !is_null($venue->is_sold) ? $isSoldResource->getLabel($venue->is_sold) : '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.venue.fields.area') }}
                        </th>
                        <td>
                            {{ $venue->area }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.venue.fields.construction') }}
                        </th>
                        <td>
                            {{ $venue->construction }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.venue.fields.floor') }}
                        </th>
                        <td>
                            {{ $venue->floor }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.venue.fields.room') }}
                        </th>
                        <td>
                            {{ $venue->room }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.venue.fields.bath_room') }}
                        </th>
                        <td>
                            {{ $venue->bath_room }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.venue.fields.direction') }}
                        </th>
                        <td>
                            {{ $venue->direction }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.venue.fields.book_status') }}
                        </th>
                        <td>
                            {{ !is_null($venue->book_status) ? $yesNoResource->getLabel($venue->book_status) : '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.venue.fields.book_ownership_status') }}
                        </th>
                        <td>
                            {{ !is_null($venue->book_ownership_status) ? $ownershipStatusResource->getLabel($venue->book_ownership_status) : '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.venue.fields.house_status') }}
                        </th>
                        <td>
                            {{ !is_null($venue->house_status) ? $houseStatusResource->getLabel($venue->house_status) : '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.venue.fields.school_facility') }}
                        </th>
                        <td>
                            {{ !is_null($venue->school_facility) ? $yesNoResource->getLabel($venue->school_facility) : '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.venue.fields.hospital_facility') }}
                        </th>
                        <td>
                            {{ !is_null($venue->hospital_facility) ? $yesNoResource->getLabel($venue->hospital_facility) : '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.venue.fields.market_facility') }}
                        </th>
                        <td>
                            {{ !is_null($venue->market_facility) ? $yesNoResource->getLabel($venue->market_facility) : '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.venue.fields.park_facility') }}
                        </th>
                        <td>
                            {{ !is_null($venue->park_facility) ? $yesNoResource->getLabel($venue->park_facility) : '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.venue.fields.is_rent') }}
                        </th>
                        <td>
                            {{ !is_null($venue->is_rent) ? $yesNoResource->getLabel($venue->is_rent) : '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.venue.fields.address') }}
                        </th>
                        <td>
                            {{ $venue->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.venue.fields.latitude') }}
                        </th>
                        <td>
                            {{ $venue->latitude }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.venue.fields.longitude') }}
                        </th>
                        <td>
                            {{ $venue->longitude }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.venue.fields.description') }}
                        </th>
                        <td>
                            <textarea id="description" class="form-control tinymce">{{ old('description', isset($venue) ? $venue->description : '') }}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.venue.fields.features') }}
                        </th>
                        <td>
                            {!! $venue->features !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.venue.fields.price') }}
                        </th>
                        <td>
                            {{ $venue->price }} {{ trans('global.price_format') }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.venue.fields.main_photo') }}
                        </th>
                        <td>
                            @if($venue->main_photo)
                                <a href="{{ $venue->main_photo->getUrl() }}" target="_blank">
                                    <img src="{{ $venue->main_photo->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.venue.fields.gallery') }}
                        </th>
                        <td>
                            @foreach($venue->gallery as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    <img src="{{ $media->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.venue.fields.is_featured') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled {{ $venue->is_featured ? "checked" : "" }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.venue.fields.priority') }}
                        </th>
                        <td>
                            {{ $priorityLabel }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
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
