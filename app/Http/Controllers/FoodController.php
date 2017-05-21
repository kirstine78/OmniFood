<?php

namespace App\Http\Controllers;

use App\Food;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FoodController extends Controller
{   
    /**
     * when you click 'new' button
     * the form is displayed
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function displayAddFoodForm(){
    	// make sure to pass in empty customer
    	$food = new Food();
    	
    	return View('food.displayAddFoodForm')->with('food', $food);
    }
}
