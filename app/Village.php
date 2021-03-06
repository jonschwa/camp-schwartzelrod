<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    /**
     * Relationships
     */
    public function cabins()
    {
        return $this->hasMany('App\Cabin');
    }
}
