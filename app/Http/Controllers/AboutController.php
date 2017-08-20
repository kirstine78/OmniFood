<?php

namespace OmniFood\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
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
	
	public function index()
	{
		// default country Afghanistan 'AF'
		$defaultCountryCode = 'AF';
		
		return view('about', ['countryCode' => $defaultCountryCode]);
	}
}
