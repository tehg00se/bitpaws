<?php

namespace App\Http\Controllers\BitpawsApi;

use App\Models\Posts\Coordinate;
use App\Repositories\Tracks\TrackablesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Repositories\Posts\PostsRepository;
use App\Http\Requests\Api\GeocodeRequest;
use App\Http\Controllers\Controller;
use App\Models\Posts\Post;

use App\Http\Requests;

/**
 * Class PostsController
 * @package App\Http\Controllers\BitpawsApi
 */
class PostsController extends Controller
{

    /**
     * @var PostsRepository
     */
    private $repo;

    /**
     * @var GuzzleClientService
     */
    private $http;

    /**
     * PostsController constructor.
     */
    public function __construct()
    {

        $this->repo = new TrackablesRepository(new Coordinate());
 //      $this->http = new GuzzleClientService();

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return response()->json(['posts' => $this->repo->getPosts(38.822591, -79.804688, 100000, 50)]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return response()->json(['post' => $this->repo->find(['pet.user.profile', 'pet.breeds.species', 'coordinates', 'comments.user.profile'], $id)]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Return a geocde response for an array of latng objects
     * @param array $latngs
     */
    public function geocode(GeocodeRequest $request)
    {

        $post = $this->repo->find(['coordinates'], $request['post_id']);

        $latitude = $post->coordinates->first()->latitude;
        $longitude = $post->coordinates->first()->longitude;

        $geocoded =
            Request::
                create('http://bitpaws.local/services/geocode', 'POST',
                    [
                        'latlng'   =>  $latitude . ', ' . $longitude
                    ]);

        return response()->json(['response' => json_decode(Route::dispatch($geocoded)->getContent()), 'lookup' => $latitude . ',' . $longitude]);

    }
}
