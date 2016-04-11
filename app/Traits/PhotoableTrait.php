<?php namespace App\Traits;

/**
 * Class PhotoableTrait
 * @package App
 */
trait PhotoableTrait {


    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function photos()
    {

        return $this->morphMany('App\Models\Photos\Photo', 'imageable');

    }

}