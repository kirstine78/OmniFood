<?php

namespace App\Http\Controllers;

use App\Country;
use App\Food;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CountryController extends Controller
{
	//
	public function allCountries(){
		// fetch all Countries from db		
		$countriesList = Country::orderBy('name', 'asc')->get();
		
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
