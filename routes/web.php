<?php

/**
 * Name:    	Kirstine Broerup Nielsen
 * Date:        14.05.2017
 * Project:     OmniFood
 * Version:     1.0
 */

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// ***************************************
// ********** CountryController **********
// ***************************************

Route::get('/countries', 'CountryController@allCountries');
Route::post('/countries', 'CountryController@allCountries');

Route::get('/country/{country}', 'CountryController@oneCountry');
Route::post('/country/{country}', 'CountryController@oneCountry');




// ****************************************
// ************ FoodController ************
// ****************************************

// To add a Food we display a form then the form submits the data
// First we display a view with a Form on it
Route::get('/food', 'FoodController@displayAddFoodForm');

// then the form calls the ROUTE to save the data
Route::post('/food', 'FoodController@addFood');

// To show one food entry
Route::get('/food/{food}', 'FoodController@oneFood');

// To go to edit view for specific food entry 
Route::get('/food/edit/{food}', 'FoodController@editFood');

// To submit the food edit
Route::put('/food/edit', 'FoodController@submitEditFood');