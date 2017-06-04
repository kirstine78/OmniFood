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

//Route::get('customers', 'CustomerController@allCustomers');

// To add a Food we display a form then the form submits the data
// First we display a view with a Form on it
Route::get('/food', 'FoodController@displayAddFoodForm');

// then the form calls the ROUTE to save the data
Route::put('/food', 'FoodController@addFood');


Route::get('/food/{food}', 'FoodController@oneFood');