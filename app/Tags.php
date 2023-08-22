<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tags extends Model
{
    use SoftDeletes;

    public $table = 'tags';

    protected $dates
        = [
            'created_at',
            'updated_at',
            'deleted_at',
        ];

    protected $fillable
        = [
            'name',
            'slug'
        ];

    public function news()
    {
        return $this->belongsToMany(News::class, 'tag_new', 'new_id', 'tag_id');
    }
}
