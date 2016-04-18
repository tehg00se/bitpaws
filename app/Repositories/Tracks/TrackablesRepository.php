<?php namespace App\Repositories\Tracks;

use App\Repositories\BaseRepository;

class TrackablesRepository extends BaseRepository {

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {

        return 'App\Models\Post\Coordinate';

    }

    public function getPosts($lat, $lng, $range = 3600, $max_results = null)
    {

        return $this->model->closest($lat, $lng, null, $range, $max_results);

    }

}