<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $guarded = [];
    /**
     * Relationships
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function activities() {
        return $this->belongsToMany('App\Activity');
    }
}
