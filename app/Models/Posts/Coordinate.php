<?php

namespace App\Models\Posts;

use DB;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Coordinate
 * @package App\Models\Posts
 */
class Coordinate extends Model
{

    /**
     * @var string
     */
    protected $table = 'coordinates';

    /**
     * @var array
     */
    protected $fillable = ['latitude', 'longitude'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function trackable()
    {

        return $this->morphTo();

    }

}
