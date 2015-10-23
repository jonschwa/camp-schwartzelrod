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
        return $this->belongsTo('App\User');
    }

    public function rsvp()
    {
        return $this->hasOne('App\Rsvp');
    }

    /**
     * Query Scopes
     */
    public function scopeByCode($query, $code)
    {
        return $query->where('code', $code);
    }
}
