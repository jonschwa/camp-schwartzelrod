<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rsvp extends Model
{
    protected $fillable = ['will_attend', 'comment', 'num_guests'];

    /**
     * Relationships
     */
    public function invitation() {
        return $this->belongsTo('App\Invitation');
    }

    public function user() {
        return $this->belongsTo('App\user');
    }
}
