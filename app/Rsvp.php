<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rsvp extends Model
{
    /**
     * Relationships
     */
    public function invitation() {
        return $this->belongsTo('App\Invitation');
    }
}
