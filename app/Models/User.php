<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

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
     *
     * Relations
     *
     */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {

        return $this->hasOne('App\Models\UserProfile');

    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pets()
    {

        return $this->hasMany('App\Models\Animals\Pet');

    }

}
