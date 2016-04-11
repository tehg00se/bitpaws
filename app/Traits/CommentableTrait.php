<?php namespace App\Traits;

/**
 * Class CommentableTrait
 * @package App
 */
trait CommentableTrait {


    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function comments()
    {

        return $this->morphMany('App\Models\Posts\Comment', 'commentable');

    }

}