<?php

namespace App\Http\Controllers;

use App\EventType;
use App\Http\Resources\YesNoResource;
use App\Location;
use App\Venue;
use App\News;

class HomeController extends Controller
{
    public function index()
    {
        $featuredVenues = Venue::orderBy('priority', 'DESC')
                               ->where('is_featured', YesNoResource::YES)
                               ->where('status', YesNoResource::YES)
                               ->get();

        $eventTypes = EventType::all();
        $locations = Location::all();

        $newestVenues = Venue::with('event_types')
                             ->where('status', YesNoResource::YES)
                             ->orderBy('priority', 'DESC')
                             ->latest()
                             ->take(3)
                             ->get();

        $newestNews = News::latest()->take(3)->get();

        $yesNoResource = new YesNoResource();
        $yesNoOptions  = $yesNoResource->toOptionArray();

        return view('home', compact('featuredVenues', 'eventTypes', 'locations', 'newestVenues', 'yesNoOptions', 'newestNews'));
    }

}
