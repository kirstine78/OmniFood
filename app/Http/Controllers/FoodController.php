<?php

namespace App\Http\Controllers;

use App\Food;
use App\Country;
use App\Image;
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
    	// make sure to pass in empty Food
    	$food = new Food();
    	
    	// to remove the time from dateTime we use 'format'
    	$food->date = Carbon::today()->format('Y-m-d');    	
    	
    	// set denmark as default. hard coded...
    	$food->country_id = 61;
    	$food->rating = 2;
    	
    	return View('food.displayAddFoodForm')->with('food', $food);
    }
    
    
    /**
     * when 'add food' button is clicked, add to database
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addFood(Request $request){    	  	    	  	
    	
    	// handle validation, if not validated redirect back to where you came from
    	$this->validateFood($request);    	
    	
    	// if VALIDATION went ok proceed to below
    	$food = new Food();
    	
    	// assign input values to fields for the food record
    	$food= $this->populateFoodFromRequest($food, $request);
    	
    	// set created at to current date and time
    	$food->created_at = Carbon::now();
    	
    	$food->save();
    	
    	
    	// image that user uploaded
    	$img1 = $request->file('imageUpload');
    	
    	// check that img is not null
    	if ($img1 != null) {
    		// get the image the user uploads, store it in folder 'foodImages'. The path where img is stored is returned
    		$pathToImage1 = $img1->store('foodImages', 'public');
    		
    		// create image
    		$image1 = new Image();
    		
    		// assign input value (which is path to image) to field for the image record
    		$image1->filename = $pathToImage1;
    		
    		// save food and img child record
    		$food->images()->save($image1);    		
    	}
    	
    	return redirect('countries');
    }  // end addFood
    
    
    
    /**
     * validate user input, customize error messages
     * @param Request $request
     */
    public function validateFood(Request $request) {
    	// my array of customized messages
    	$messages = [
    			'date.required' => 'The :attribute is required.',
    			'countryCode.required' => 'The :attribute is required.',
    	];
    	
    	// rename attributes to look pretty in form
    	$attributes = [
    			'date' => 'date',
    			'countryCode' => 'country',
    	];
    	
    	// validation of user input in the form
    	$this->validate($request, [
    			'date' => 'required',
    			'countryCode' => 'required',
    	], $messages, $attributes);
    }
    
    
    /**
     * from request assign values to column fields in the food record
     * @param Food $food
     * @param Request $request
     * @return Food
     */
    public function populateFoodFromRequest(Food $food, Request $request) {
    	// get someValue from the name="someValue"  key/value pair from incoming $request
    	$food->date = $request->date;
    	$food->rating = $request->rating; // get value of rating radio button
    	$food->comment = $request->comment;
    	
    	// get the country code chosen in the drop down menu
    	$countryCode = $request->countryCode;
    	
    	// get the countries with this code. returns a list, but it should only return exactly one record in the list.
    	$countryCodeList = Country::where('code', '=', $countryCode)->get();
    	
    	// assign the name of country to new food obj
    	$food->country_id = $countryCodeList[0]->id;
    	    	
    	return $food;
    }
    
    // go to view showing details for one food entry; image, date, rating comment
    public function oneFood(Food $food, Request $request) {
    	return View('food.oneFood',  ['oneFood' => $food]);
    }
    
    // go to edit view for one specific food entry
    public function editFood(Food $food, Request $request) {
    	//echo $food->id;
    	return View('food.displayEditFoodForm')->with('food', $food);
    }
    
    //
    public function submitEditFood(Request $request) {
    	
    	// handle validation, if not validated redirect back to where you came from
    	$this->validateFood($request);
    	
    	// if VALIDATION went ok proceed to below
    	// get the food object
    	$food = Food::find($request->specific_food_id);
    	    	
    	// assign input values to fields for the food record
    	$food= $this->populateFoodFromRequest($food, $request);
    	
    	// set updated at to current date and time
    	$food->updated_at = Carbon::now();
    	
    	$food->save();
    	
    	
    	// image that user uploaded
//     	$img1 = $request->file('imageUpload');
    	
//     	// check that img is not null
//     	if ($img1 != null) {
//     		// get the image the user uploads, store it in folder 'foodImages'. The path where img is stored is returned
//     		$pathToImage1 = $img1->store('foodImages', 'public');
    		
//     		// create image
//     		$image1 = new Image();
    		
//     		// assign input value (which is path to image) to field for the image record
//     		$image1->filename = $pathToImage1;
    		
//     		// save food and img child record
//     		$food->images()->save($image1);
//     	}
    	
    	return redirect('countries');
    	
    }    
    
    
    
    /**
     * Delete Food in database
     * @param Food $food
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteFood(Food $food){
    	// Because of Route Model Binding,
    	// Laravel will automatically inject the model instance that has
    	// an ID matching the corresponding value from the request URI.
    	    	
    	// delete Food and any images belonging
    	
    	echo "hello delete food";
    	
//     	$customer->fldDeleted = 1;  // we don't delete record, instead we just flag as 'deleted'
//     	$customer->updated_at = $dateTimeNow;
//     	$customer->save();
    	
    	//return redirect('/countries');
    }
    
    
}  // end class
