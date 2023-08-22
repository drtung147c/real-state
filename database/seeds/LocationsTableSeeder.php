<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Location;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = [
            'Hà Nội',
            'Nha Trang',
            'Hồ Chí Minh',
            'Đà Nẵng',
        ];

        foreach ($locations as $location) {
            $slug = Str::slug($location);
            Location::create([
                'name' => $location,
                'slug' => $slug
            ]);
        }
    }
}
