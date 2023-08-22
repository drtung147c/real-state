<?php

use Illuminate\Database\Seeder;
use App\Authors;
use Illuminate\Support\Str;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authors = [
            'Hưng',
            'Được',
            'Phong',
            'Kiên',
        ];

        foreach ($authors as $author) {
            $slug = Str::slug($author);
            Authors::create(
                [
                    'name' => $author,
                    'slug' => $slug
                ]
            );
        }
    }
}
