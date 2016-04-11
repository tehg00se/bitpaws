<?php namespace App\Traits;

/**
 * Class TrackableTrait
 * @package App
 */
trait TrackableTrait
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function coordinates()
    {

        return $this->morphMany('App\Models\Posts\Coordinate', 'trackable');

    }

}