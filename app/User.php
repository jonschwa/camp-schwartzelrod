<?php

namespace App;

use Hash;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'first_name', 'last_name', 'email', 'phone', 'contact_preference', 'password', 'active'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Relationships
     */
    public function guests()
    {
        return $this->hasMany('App\Guest');
    }

    public function invitation()
    {
        return $this->hasOne('App\Invitation');
    }

    public function rsvp()
    {
        return $this->hasOne('App\Rsvp');
    }

    /**
     * Mutators
     */
    public function setPasswordAttribute($pass)
    {
        $this->attributes['password'] = Hash::make($pass);

    }
}
