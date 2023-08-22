<?php

namespace App\Http\Controllers;

use App\Venue;
use App\Http\Resources\YesNoResource;
use App\Http\Resources\OwnershipStatusResource;
use App\Http\Resources\HouseStatusResource;
use App\Http\Resources\IsSoldResource;

class VenueController extends Controller
{

    public function show($slug, $id)
    {
        $venue = Venue::with('event_types', 'location')
                      ->where('slug', $slug)
                      ->where('id', $id)
                      ->where('status', YesNoResource::YES)
                      ->firstOrFail();
        if (!$venue->id) {
            return abort(404);
        }

        $relatedVenues = Venue::with('event_types')
                              ->where('location_id', $venue->location_id)
                              ->where('id', '!=', $venue->id)
                              ->where('status', YesNoResource::YES)
                              ->take(3)
                              ->get();

        $yesNoResource           = new YesNoResource();
        $ownershipStatusResource = new OwnershipStatusResource();
        $houseStatusResource     = new HouseStatusResource();
        $isSoldResource          = new IsSoldResource();

        return view('venue', compact('venue', 'relatedVenues', 'yesNoResource', 'ownershipStatusResource', 'houseStatusResource', 'isSoldResource'));
    }

}
