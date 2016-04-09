<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{

    protected $table = 'user_profiles';

    protected $fillable = ['name_first', 'name_last', 'hobbies', 'interests'];

    /**
     *
     * Relations
     *
     */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {

        return $this->belongsTo('App\Models\User');

    }

}
