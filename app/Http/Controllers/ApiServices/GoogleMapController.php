<?php

namespace App\Http\Controllers\ApiServices;

use App\Models\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GoogleMaps;

class GoogleMapController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | GoogleMapController
    |--------------------------------------------------------------------------
    |
    | This controller handles the queries to the Google API for retrieving
    | geocoded data, coordinates, and logic for determining the possible
    | locations of a lost or found dog/cat
    |
    */

    /**
     * @var GoogleMaps
     */
    protected $service;

    /**
     * GoogleMapController constructor.
     * @param GoogleMaps $googleMaps
     */
    public function __construct()
    {

        $this->service = new \GoogleMaps;

    }

    /**
     * retrieveMapLocation
     * @param $coords
     */
    public function retrieveMapLocation(Request $request)
    {

        $latlng = $request['latlng'];
        //dd($request['latitude'] . " IS THE LATITUDE " .  $request['longitude'] . " IS THE LONG");

        $response = \GoogleMaps::load('geocoding')
                    ->setParamByKey('latlng', $latlng)
                    ->setParamByKey('components',
                            ['country' => 'US ',
                             ''])
                    ->get('results');

        return response()
                    ->json(['location' => $response, 'latlng' => $latlng]);

    }

}
