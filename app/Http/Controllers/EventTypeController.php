<?php

namespace App\Http\Controllers;

use App\EventType;
use App\Venue;
use App\Http\Resources\StatusResource;

class EventTypeController extends Controller
{

    public function index($slug)
    {
        $eventType = EventType::where('slug', $slug)->firstOrFail();

        $venues = Venue::with('event_types')
            ->orderBy('priority', 'DESC')
            ->where('status', StatusResource::ENABLED)
            ->whereHas('event_types', function($q) use ($slug) {
                $q->where('event_types.slug', $slug);
            })
            ->latest()
            ->paginate(9);

        return view('event_type', compact('venues', 'eventType'));
    }

    public function all()
    {
        $eventTypes = EventType::latest()->paginate(9);

        return view('projects', compact('eventTypes'));
    }

}
