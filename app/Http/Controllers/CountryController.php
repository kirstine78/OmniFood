<?php

namespace App\Http\Controllers;

use App\Country;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CountryController extends Controller
{
	//
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
		
		
// 		foreach ($countriesList as $c) {
// 			echo $c->name;
			
// 			$foods =  $c->foods;
			
// 			foreach ($foods as $f) {
// 				echo $f->comment;
// 			}
// 		}
		
// 		$foodsList = Food::orderBy('comment', 'asc')->get();
		
		
// 		foreach ($foodsList as $f) {
// 			echo $f->country->name;
// 		}
		
		return View('country.allCountries', ['countries' => $countriesList]);
	}
}
