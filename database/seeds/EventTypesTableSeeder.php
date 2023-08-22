<?php

use Illuminate\Database\Seeder;
use App\EventType;
use Illuminate\Support\Str;

class EventTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $eventTypes = [
            'Saigon Pennisula',
            'KVG Mozzadiso Nha Trang',
            'Ehome Southgate',
            'Phú Tài 2 Central Life',
            'Bcons City',
            'The Horizon Phú Mỹ Hưng'
        ];

        foreach ($eventTypes as $eventType) {
            EventType::create([
                'name' => $eventType,
                'slug' => Str::slug($eventType),
                'user_id' => 1
            ]);
        }
    }
}
