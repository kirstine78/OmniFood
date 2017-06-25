<?php

/**
 * Name:		Kirstine Broerup Nielsen
 * Date:		14.05.2017
 * Project:    	OmniFood
 * Version:    	1.0
 */

namespace OmniFood\Http\Controllers;

use OmniFood\Country;
use OmniFood\Food;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CountryController extends Controller
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
	
	
	// to show all countries
	public function allCountries(Request $request){
		
		$filterOptionAllCountries = $request->filterOptionAllCountries;
		
		//echo $filterOption;
		// get user obje
// 		echo 'user: ' . \Auth::id();
		
		
// 		// get user obje
// 		echo \Auth::user()->foods()->first();
		
// 		$countries = Country::whereHas('foods', function($query){
// 			$query->where('user_id', '=', \Auth::id());
			
// 		});
		
		if ($filterOptionAllCountries == 'done') {
			
			// fetch all Countries from db, that has food entry for this user id
// 			$countriesList = Country::has('foods')->orderBy('name', 'asc')->get();

			$countriesList = Country::whereHas('foods', function($query){
				$query->where('user_id', '=', \Auth::id());				
			})->orderBy('name', 'asc')->get();
			
			$countriesList = $countriesList->all();
			
		} elseif ($filterOptionAllCountries == 'empty') {
			// fetch all Countries from db, that hasn't food entry for this user id
			// 			$countriesList = Country::doesntHave('foods')->orderBy('name', 'asc')->get();
			
			$countriesList = Country::whereDoesntHave('foods', function($query){
				$query->where('user_id', '=', \Auth::id());
			})->orderBy('name', 'asc')->get();
			
			$countriesList = $countriesList->all();
			
		} else {
			// fetch all Countries from db
			$countriesList = Country::orderBy('name', 'asc')->get();			
		}
		
// 		echo $countriesList[0]->foodsForUser()->get();
		return View('country.allCountries', ['countries' => $countriesList]);
	}
	
	
	// show all food entries for ONE country
	public function oneCountry(Country $country, Request $request) {		
		
		$filterOptionOneCountry= $request->filterOptionOneCountry;
		
		// assign id of country to $id. It is the row aka country that was clicked
		$id = $country->id;
				
		if  ($filterOptionOneCountry == 'newestToOldest') {
			// fetch all food entries for the country
			$foodList = Food::where('country_id', '=', $id)->orderBy('date', 'desc')->get();
			
		} elseif ($filterOptionOneCountry == 'oldestToNewest') {
			// fetch all food entries for the country
			$foodList = Food::where('country_id', '=', $id)->orderBy('date', 'asc')->get();		
			
		} else {
			// fetch all food entries for the country
			$foodList = Food::where('country_id', '=', $id)->orderBy('date', 'desc')->get();
		}
		
		
		return View('country.oneCountry',  ['oneCountry' => $country, 'foodList' => $foodList]);
	}
}
