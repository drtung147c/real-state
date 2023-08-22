<?php

namespace App\Http\Controllers\Admin;

use App\EventType;
use App\User;
use App\Http\Resources\PermissionResource;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyEventTypeRequest;
use App\Http\Requests\StoreEventTypeRequest;
use App\Http\Requests\UpdateEventTypeRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EventTypesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies(PermissionResource::EVENT_TYPE_ACCESS), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = \Auth::user();
        if ($user->is_super_admin) {
            $eventTypes = EventType::all();
        } else {
            $eventTypes = EventType::where('user_id', $user->id)->get();
        }

        return view('admin.eventTypes.index', compact('eventTypes', 'user'));
    }

    public function create()
    {
        abort_if(Gate::denies(PermissionResource::EVENT_TYPE_CREATE), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = \Auth::user();

        return view('admin.eventTypes.create', compact('user'));
    }

    public function store(StoreEventTypeRequest $request)
    {
        $user = \Auth::user();
        $request->merge(['user_id' => $user->id]);
        $eventType = EventType::create($request->all());

        if ($request->input('photo', false)) {
            $eventType->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return redirect()->route('admin.event-types.index');
    }

    public function edit(EventType $eventType)
    {
        abort_if(Gate::denies(PermissionResource::EVENT_TYPE_EDIT), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $user = \Auth::user();
        if (!$user->is_super_admin) {
            abort_if(($user->id != $eventType->user_id), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        return view('admin.eventTypes.edit', compact('eventType', 'user'));
    }

    public function update(UpdateEventTypeRequest $request, EventType $eventType)
    {
        $user = \Auth::user();
        $request->merge(['user_id' => $eventType->users->id]);
        if (!$user->is_super_admin) {
            abort_if(($user->id != $eventType->user_id), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
        $eventType->update($request->all());

        if ($request->input('photo', false)) {
            if (!$eventType->photo || $request->input('photo') !== $eventType->photo->file_name) {
                $eventType->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($eventType->photo) {
            $eventType->photo->delete();
        }

        return redirect()->route('admin.event-types.index');
    }

    public function show(EventType $eventType)
    {
        abort_if(Gate::denies(PermissionResource::EVENT_TYPE_SHOW), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $user = \Auth::user();
        if (!$user->is_super_admin) {
            abort_if(($user->id != $eventType->user_id), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        return view('admin.eventTypes.show', compact('eventType', 'user'));
    }

    public function destroy(EventType $eventType)
    {
        abort_if(Gate::denies(PermissionResource::EVENT_TYPE_DELETE), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $user = \Auth::user();
        if (!$user->is_super_admin) {
            abort_if(($user->id != $eventType->user_id), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $eventType->delete();

        return back();
    }

    public function massDestroy(MassDestroyEventTypeRequest $request)
    {
        EventType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
