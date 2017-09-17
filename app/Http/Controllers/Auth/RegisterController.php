<?php

namespace OmniFood\Http\Controllers\Auth;

use OmniFood\User;
use OmniFood\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
     protected $redirectTo = '/home';
//    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
    	$confirmation_code = str_random(30);  // http://bensmith.io/email-verification-with-laravel
    	
    	$aUser = User::create([
    			'name' => $data['name'],
    			'email' => $data['email'],
    			'password' => bcrypt($data['password']),
    			'confirmed' => 0,
    			'confirmation_code' => $confirmation_code,  // http://bensmith.io/email-verification-with-laravel
    	]);
    	
    	Mail::send('email.verify', ['confirmation_code' => $confirmation_code], function($message) use (&$aUser){
    		$message->to($aUser->email, $aUser->name)
    		->subject('Verify your email address');
    	});
    	
    	return $aUser;
    }
    
    
    // http://bensmith.io/email-verification-with-laravel
    public function confirm($confirmation_code)
    {
    	//echo "in confirm method";
    	if( ! $confirmation_code)
    	{
    		throw new InvalidConfirmationCodeException;
    	}
    	
    	$user = User::whereConfirmationCode($confirmation_code)->first();
    	
    	if ( ! $user)
    	{
    		throw new InvalidConfirmationCodeException;
    	}
    	
    	$user->confirmed = 1;
    	$user->confirmation_code = null;
    	$user->save();
    	
    	//Flash::message('You have successfully verified your account.');
    	
    	return View('confirmationRegistration');
    }
}
