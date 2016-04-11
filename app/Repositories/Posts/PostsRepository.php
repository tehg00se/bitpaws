<?php namespace App\Repositories\Posts;

use App\Repositories\BaseRepository;

class PostsRepository extends BaseRepository {

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Models\Post';
    }

}