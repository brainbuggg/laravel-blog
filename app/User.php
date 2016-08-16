<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class User extends Authenticatable
{
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

    /**
    * A user has many articles
    */
    public function articles() {
        return $this->hasMany('App\Article');
    }

    /**
    * Check if a logged in user is a manager or junior member
    */
    public function isATeamManager()
    {
        return true;
    }
}
