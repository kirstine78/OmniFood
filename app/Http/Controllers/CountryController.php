<?php

namespace App\Http\Controllers;

use App\Country;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CountryController extends Controller
{
	//
	public function allCountries(){
		// fetch all Countries from db
		
		$countriesList = Country::orderBy('fldName', 'asc')->get();
		return View('country.allCountries', ['countries' => $countriesList]);
	}
}
