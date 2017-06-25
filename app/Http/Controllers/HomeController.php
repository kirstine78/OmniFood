<?php

/**
 * Name:		Kirstine Broerup Nielsen
 * Date:		14.05.2017
 * Project:    	OmniFood
 * Version:    	1.0
 */

namespace OmniFood\Http\Controllers;

use Illuminate\Http\Request;
use OmniFood\Food;
use OmniFood\Country;

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
    	// get all Food entries ordered by date desc
    	$foodList = Food::orderBy('date', 'desc')->get();
    	
    	// get amount of Countries
    	$amountOfCountries = Country::count();
    	
    	// get amount of Countries that are done
    	$countryList = Country::has('foods')->get();
//     	echo "amount of countries with food entry: " . count($countryList);
    	
    	return view('home',  ['foodList' => $foodList, 'amountOfCountries' => $amountOfCountries, 'amountOfCountriesWithFoodEntry' => count($countryList)]);
    }
}
