<?php

namespace App\Http\Controllers;

use App\User;
use App\Mail\Welcome;
use App\Mail\WelcomeAgain;
use App\Http\Requests\RegistrationRequest;

class RegistrationController extends Controller
{
    public function create (){
    	return view('registration.create');
    }
    public function store (RegistrationRequest $request){
    	// validate the form
	    	// I moved the validation to RegistrationRequest (https://laracasts.com/series/laravel-from-scratch-2017/episodes/28)
    	//create and save
    	//$user = User::create(request(['name', 'email', 'password']));
    	$user = User::create([ 
			'name' => request('name'),
			'email' => request('email'),
			'password' => bcrypt(request('password'))
		]);
    		// sign the user in
    		auth()->login($user);
    		// welcome email (to try: php artisan tinker and then Mail::to($user= App\User::first())->send(new App\Mail\WelcomeAgain($user));)
    		\Mail::to($user)->send(new Welcome($user));
    	// set message
    	session()->flash('message', 'Thank you for signing up!');
    	// redirect
    	return redirect()->home();
    }
}
