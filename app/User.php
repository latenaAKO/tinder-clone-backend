<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function settings()
    {
        return $this->hasOne(UserSettings::class);
    } 

    public function location()
    {
        return $this->hasOne(Location::class)->latest();
    }

    public function matches()
    {
        return $this->hasMany(Matches::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
