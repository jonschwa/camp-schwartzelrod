<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cabin extends Model
{
    /**
     * Relationships
     */
    public function village()
    {
        return $this->belongsTo('App\Village');
    }
}
