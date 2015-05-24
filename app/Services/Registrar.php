<?php namespace App\Services;

use App\User;
use Validator;
use Mail;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */

	public function create(array $data)
	{	

	$content = "Hi ".$data['name'].", welcome to the most advanced mail dispatcher in human history.";

	$data2 = [

    'content' => $content,


	];

	$user = [

    'name' => $data['name'],
	'email' => $data['email'],

	];

	if(!Mail::send('emails.mail-template', $data2, function($message) use($user){

    $message->to($user['email'] , $user['name']);

    $message->subject('Welcome to Xpedit!');

    $message->from('info@emailtemplateproject.com', 'Xpedit');

	})){
		echo "wrong mail";
		return;
	}

		return User::create([

			'name' => $data['name'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),

		]);




	}

}
