<?php

namespace App\Models\Posts;

use App\Traits\PhotoableTrait;
use App\Traits\CommentableTrait;
use App\Traits\TrackableTrait;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    use PhotoableTrait;
    use CommentableTrait;
    use TrackableTrait;

    protected $table = 'posts';

    protected $fillable = ['post_title', 'post_content', 'pet_status'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pet()
    {

        return $this->belongsTo('App\Models\Animals\Pet');

    }

}
