<?php namespace App\Models\Posts;

use App\Traits\CommentableTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment
 * @package App\Models\Posts
 */
class Comment extends Model
{

    use CommentableTrait;

    /**
     * @var string
     */
    protected $table = 'comments';

    /**
     * @var array
     */
    protected $fillable = ['content'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {

        return $this->belongsTo('App\Models\User');

    }

}
