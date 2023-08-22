<?php

namespace App\Http\Controllers;

use App\EventType;
use App\Http\Resources\YesNoResource;
use App\Location;
use App\Venue;

class LocationController extends Controller
{

    public function index($slug)
    {
        $location = Location::where('slug', $slug)->firstOrFail();

        $venues = Venue::with('event_types')
            ->orderBy('priority', 'DESC')
            ->where('location_id', $location->id)
            ->where('status', YesNoResource::YES)
            ->latest()
            ->paginate(9);

        return view('location', compact('venues', 'location'));
    }

    public function all()
    {
        $locations = Location::latest()->paginate(9);

        return view('locations', compact('locations'));
    }

}
