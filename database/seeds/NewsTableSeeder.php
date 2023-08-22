<?php

use Illuminate\Database\Seeder;
use App\News;
use App\Tags;
use App\Authors;
use Illuminate\Support\Str;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newsData = [
            'DKRA Group công bố chiến lược thương hiệu và mục tiêu phát triển đến năm 2030',
            'Giá đất miền Tây tăng phi mã sau thông tin dự án cảng Trần Đề',
            'Doanh nghiệp BĐS “đói” vốn, khơi thông nguồn vốn bằng cách nào?',
            'Thị trường BĐS sẽ bật tăng thời gian tới?'
        ];
        $tags = Tags::all();
        $authors = Authors::all();
        foreach ($newsData as $data) {
            $slug = Str::slug($data);
            $new = News::create(
                [
                    'title'        => $data,
                    'slug'         => $slug,
                    'publish_date' => date("Y-m-d H:i:s", rand(1262055681, 1262055681))
                ]
            );

            $new->tags()->attach($tags->first()->id);
            $new->authors()->attach($authors->first()->id);
        }
    }
}
