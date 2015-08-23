<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    /**
     * Relationships
     */
    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function rsvp()
    {
        return $this->hasOne('App\Rsvp');
    }
}
