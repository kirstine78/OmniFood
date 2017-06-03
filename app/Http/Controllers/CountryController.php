<?php

namespace App\Http\Controllers;

use App\Country;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CountryController extends Controller
{
	// to show all countries
	public function allCountries(Request $request){
		
		$filterOption = $request->filterOption;
		
		//echo $filterOption;
		
		if ($filterOption == 'done') {	
			// fetch all Countries from db, that has food entry
			$countriesList = Country::has('foods')->orderBy('name', 'asc')->get();
			
		} elseif ($filterOption == 'empty') {			
			// fetch all Countries from db, that hasn't food entry
			$countriesList = Country::doesntHave('foods')->orderBy('name', 'asc')->get();
			
		} else {			
			// fetch all Countries from db
			$countriesList = Country::orderBy('name', 'asc')->get();
		}
		
		return View('country.allCountries', ['countries' => $countriesList]);
	}
	
	// show all food entries for ONE country
	public function oneCountry() {
		return View('country.oneCountry');
	}
}
