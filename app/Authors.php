<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Authors extends Model
{
    use SoftDeletes;

    public $table = 'authors';

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
        return $this->belongsToMany(News::class, 'author_new', 'new_id', 'author_id');
    }
}
