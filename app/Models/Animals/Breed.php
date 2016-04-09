<?php

namespace App\Models\Animals;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{

    protected $table = 'breeds';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function pets()
    {

        return $this->belongsToMany('App\Models\Animals\Pet');

    }
}
