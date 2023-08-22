<?php

use Illuminate\Database\Seeder;
use App\Venue;
use App\Location;
use App\EventType;
use App\Http\Resources\PriorityResource;

class VenuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = Location::all();
        $eventTypes = EventType::all();

        for ($i=1; $i <= 4; $i++) {
            $venue = factory(Venue::class)->create([
                'latitude' => rand(-20, 20),
                'longitude' => rand(-20, 20),
                'price' => rand(1, 5),
                'is_featured' => rand(0, 1),
                'location_id' => $locations->first()->id,
                'user_id' => 1,
                'priority' => PriorityResource::NORMAL,
                'status' => rand(0, 1)
            ]);

            $venue->event_types()->attach($eventTypes->first()->id);

            $venue->addMediaFromUrl(public_path('images/hero_bg_' . $venue->id . '.jpg'))->toMediaCollection('main_photo');
        }
    }
}
