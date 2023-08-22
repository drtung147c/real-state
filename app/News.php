<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class News extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'news';

    protected $appends = [
        'photo',
    ];

    protected $dates
        = [
            'created_at',
            'updated_at',
            'deleted_at',
            'publish_date',
        ];

    protected $fillable
        = [
            'title',
            'author',
            'short_description',
            'description',
            'publish_date',
            'slug',
        ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }


    public function getPhotoAttribute()
    {
        $file = $this->getMedia('photo')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
        }

        return $file;
    }

    public function tags()
    {
        return $this->belongsToMany(Tags::class, 'tag_new', 'new_id', 'tag_id');
    }

    public function authors()
    {
        return $this->belongsToMany(Authors::class, 'author_new', 'new_id', 'author_id');
    }
}
