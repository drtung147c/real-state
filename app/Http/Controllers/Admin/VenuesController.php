<?php

namespace App\Http\Controllers\Admin;

use App\EventType;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyVenueRequest;
use App\Http\Requests\StoreVenueRequest;
use App\Http\Requests\UpdateVenueRequest;
use App\Location;
use App\Venue;
use App\Http\Resources\PriorityResource;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\YesNoResource;
use App\Http\Resources\HouseStatusResource;
use App\Http\Resources\OwnershipStatusResource;
use App\Http\Resources\PermissionResource;
use App\Http\Resources\IsSoldResource;
use App\Http\Resources\StatusResource;

class VenuesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies(PermissionResource::VENUE_ACCESS), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = \Auth::user();
        if ($user->is_super_admin) {
            $venues = Venue::all();
        } else {
            $venues = Venue::where('user_id', $user->id)->get();
        }
        $priorityResource = new PriorityResource();
        $statusResource = new StatusResource();

        return view('admin.venues.index', compact('venues', 'user', 'priorityResource', 'statusResource'));
    }

    public function create()
    {
        abort_if(Gate::denies(PermissionResource::VENUE_CREATE), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $locations = Location::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $event_types = EventType::all()->pluck('name', 'id');

        $yesNoResource = new YesNoResource();
        $yesNoOptions  = $yesNoResource->toOptionArray();

        $houseStatusResource = new HouseStatusResource();
        $houseStatusOptions  = $houseStatusResource->toOptionArray();

        $ownershipStatusResource = new OwnershipStatusResource();
        $ownershipStatusOptions  = $ownershipStatusResource->toOptionArray();

        $priorityResource = new PriorityResource();
        $priorityOptions  = $priorityResource->toOptionArray();

        $isSoldResource = new IsSoldResource();
        $isSoldOptions  = $isSoldResource->toOptionArray();

        $user = \Auth::user();

        return view('admin.venues.create', compact('locations', 'event_types', 'yesNoOptions', 'houseStatusOptions', 'ownershipStatusOptions', 'priorityOptions', 'user', 'isSoldOptions'));
    }

    public function store(StoreVenueRequest $request)
    {
        $user = \Auth::user();
        $request->merge(['user_id' => $user->id]);
        $venue = Venue::create($request->all());
        $venue->event_types()->sync($request->input('event_types', []));

        if ($request->input('main_photo', false)) {
            $venue->addMedia(storage_path('tmp/uploads/' . $request->input('main_photo')))->toMediaCollection('main_photo');
        }

        foreach ($request->input('gallery', []) as $file) {
            $venue->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('gallery');
        }

        return redirect()->route('admin.venues.index');
    }

    public function edit(Venue $venue)
    {
        abort_if(Gate::denies(PermissionResource::VENUE_EDIT), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $user = \Auth::user();
        if (!$user->is_super_admin) {
            abort_if(($user->id != $venue->user_id), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $locations = Location::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $event_types = EventType::all()->pluck('name', 'id');

        $venue->load('location', 'event_types');

        $yesNoResource = new YesNoResource();
        $yesNoOptions  = $yesNoResource->toOptionArray();

        $houseStatusResource = new HouseStatusResource();
        $houseStatusOptions  = $houseStatusResource->toOptionArray();

        $ownershipStatusResource = new OwnershipStatusResource();
        $ownershipStatusOptions  = $ownershipStatusResource->toOptionArray();

        $priorityResource = new PriorityResource();
        $priorityOptions  = $priorityResource->toOptionArray();

        $isSoldResource = new IsSoldResource();
        $isSoldOptions  = $isSoldResource->toOptionArray();

        return view('admin.venues.edit', compact('locations', 'event_types', 'venue', 'yesNoOptions', 'houseStatusOptions', 'ownershipStatusOptions', 'priorityOptions', 'user', 'isSoldOptions'));
    }

    public function update(UpdateVenueRequest $request, Venue $venue)
    {
        $user = \Auth::user();
        if ($request->get('priority') == null) {
            $request->merge(['priority' => PriorityResource::NORMAL]);
        }
        $request->merge(['user_id' => $venue->users->id]);
        if (!$user->is_super_admin) {
            abort_if(($user->id != $venue->user_id), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
        $venue->update($request->all());
        $venue->event_types()->sync($request->input('event_types', []));

        if ($request->input('main_photo', false)) {
            if (!$venue->main_photo || $request->input('main_photo') !== $venue->main_photo->file_name) {
                $venue->addMedia(storage_path('tmp/uploads/' . $request->input('main_photo')))->toMediaCollection('main_photo');
            }
        } elseif ($venue->main_photo) {
            $venue->main_photo->delete();
        }

        if (count($venue->gallery) > 0) {
            foreach ($venue->gallery as $media) {
                if (!in_array($media->file_name, $request->input('gallery', []))) {
                    $media->delete();
                }
            }
        }

        $media = $venue->gallery->pluck('file_name')->toArray();

        foreach ($request->input('gallery', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $venue->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('gallery');
            }
        }

        return redirect()->route('admin.venues.index');
    }

    public function show(Venue $venue)
    {
        abort_if(Gate::denies(PermissionResource::VENUE_SHOW), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $user = \Auth::user();
        if (!$user->is_super_admin) {
            abort_if(($user->id != $venue->user_id), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $venue->load('location', 'event_types');
        $yesNoResource = new YesNoResource();
        $houseStatusResource = new HouseStatusResource();
        $ownershipStatusResource = new OwnershipStatusResource();
        $priorityResource = new PriorityResource();
        $isSoldResource = new IsSoldResource();
        $statusResource = new StatusResource();
        $priorityLabel = $priorityResource->getLabel($venue->priority);

        return view('admin.venues.show', compact('venue', 'priorityLabel', 'yesNoResource', 'houseStatusResource', 'ownershipStatusResource', 'isSoldResource', 'statusResource'));
    }

    public function destroy(Venue $venue)
    {
        abort_if(Gate::denies(PermissionResource::VENUE_DELETE), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $user = \Auth::user();
        if (!$user->is_super_admin) {
            abort_if(($user->id != $venue->user_id), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $venue->delete();

        return back();
    }

    public function massDestroy(MassDestroyVenueRequest $request)
    {
        Venue::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
