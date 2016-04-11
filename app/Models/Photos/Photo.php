<?php

namespace App\Models\Photos;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    protected $table = 'photos';

    protected $fillable = ['path'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function imageable()
    {

        return $this->morphTo();

    }

}
