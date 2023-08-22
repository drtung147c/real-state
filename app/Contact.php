<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;

    public $table = 'contact';

    protected $dates
        = [
            'created_at',
            'updated_at',
            'deleted_at',
        ];

    protected $fillable
        = [
            'contact_name',
            'contact_phone',
            'contact_address',
            'contact_description',
            'venue_id',
        ];

    public function venues()
    {
        return $this->belongsTo(Venue::class, 'venue_id');
    }
}
