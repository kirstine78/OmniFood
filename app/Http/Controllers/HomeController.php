<?php

namespace OmniFood\Http\Controllers;

use Illuminate\Http\Request;
use OmniFood\Food;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	// get all food ordered by date desc
    	// fetch all food entries for the country
    	$foodList = Food::orderBy('date', 'desc')->get();
    	
    	return view('home',  ['foodList' => $foodList]);
    }
}
