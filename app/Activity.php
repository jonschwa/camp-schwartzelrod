<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    /**
     * Relationships
     */
    public function guests()
    {
        return $this->belongsToMany('App\Guest');
    }
}
