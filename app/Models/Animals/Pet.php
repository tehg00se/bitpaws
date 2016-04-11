<?php

namespace App\Models\Animals;

use App\Traits\PhotoableTrait;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{

    use PhotoableTrait;

    protected $table = 'pets';

    protected $fillable = ['name', 'description', 'age', 'dob', 'story'];

    /**
     *
     * Relationships
     *
     */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {

       return $this->belongsTo('App\Models\User');

    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function species()
    {

        return $this->belongsTo('App\Models\Animals\Species');

    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function breeds()
    {

        return $this->belongsToMany('App\Models\Animals\Breed')->withTimestamps();

    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function post()
    {

        return $this->hasOne('App\Models\Posts\Post');

    }

    /**
     *
     */
    public function scopeNoPost($query)
    {

        return $query->whereDoesntHave('post');

    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function suggestions()
    {

        return $this->hasMany('App\Models\Posts\Suggestion');

    }

}
