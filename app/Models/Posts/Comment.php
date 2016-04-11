<?php

namespace App\Models\Posts;

use App\Traits\CommentableTrait;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    //use CommentableTrait;

    protected $table = 'comments';

    protected $fillable = ['content'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {

        return $this->belongsTo('App\Models\User');

    }

}
