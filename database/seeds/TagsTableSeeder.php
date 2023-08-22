<?php

use Illuminate\Database\Seeder;
use App\Tags;
use Illuminate\Support\Str;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'Bóng đá',
            'Thể thao',
            'Bóng rổ',
            'Bóng chuyền',
        ];

        foreach ($tags as $tag) {
            $slug = Str::slug($tag);
            Tags::create(
                [
                    'name' => $tag,
                    'slug' => $slug
                ]
            );
        }
    }
}
