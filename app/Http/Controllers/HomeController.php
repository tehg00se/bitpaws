<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiServices\GoogleMapController;

class HomeController extends Controller
{
    /**
     * @var
     */
    protected $location;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->location = new GoogleMapController();

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
}
