<?php

namespace OmniFood\Http\Controllers;

use Illuminate\Http\Request;
use OmniFood\Food;

class RatingController extends Controller
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
	
	
	public function allRatings(Request $request){
		
		$filterOptionRatings= $request->filterOptionRatings;
		$rating= $request->rating;
		
		$title = 'All Ratings';
		
		// default country Afghanistan 'AF'
		$defaultCountryCode = 'AF';
		
		// check if rating is present
		if ($rating == null) {
			
			if  ($filterOptionRatings == 'bestToWorst') {
				// fetch all food entries for the user
				$foodList = Food::where([['user_id', '=', \Auth::id()],])->orderBy('rating', 'desc')->orderBy('date', 'desc')->get();
				
			} elseif ($filterOptionRatings == 'worstToBest') {
				// fetch all food entries for the user
				$foodList = Food::where([['user_id', '=', \Auth::id()],])->orderBy('rating', 'asc')->orderBy('date', 'desc')->get();
				
			} else {
				// fetch all food entries for the user
				$foodList = Food::where([['user_id', '=', \Auth::id()],])->orderBy('rating', 'desc')->orderBy('date', 'desc')->get();
			}
			
		} else {
			// rating is present
			// fetch all food entries for the user
			$foodList = Food::where([['user_id', '=', \Auth::id()],])->where('rating', '=', $rating)->orderBy('date', 'desc')->get();
			
			if ($rating > 0) {
				// update the title
				$title = "All " . $rating . " star";	
				
				if ($rating > 1) {		
					$title = $title . "s";
				}
			} else {
				// update the title
				$title = "All bad food";				
			}
		}	
		
		return View('rating.allRatings',  ['foodList' => $foodList, 'countryCode' => $defaultCountryCode, 'filterOptionRatings' => $filterOptionRatings, 'title' => $title]);
	}
}
