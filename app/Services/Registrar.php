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

//console.log("asdasdasd");

		return User::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
		]);

	$content = "Hi,welcome user!";

	$data2 = [
    'content' => $content
	];

	Mail::send('emails.mail-template', $data2, function($message) {

    $message->to('mansour.hachem@hotmail.com', 'Jon Doe');
    $message->subject('Welcome to the Laravel 4 Auth App!');
    $message->from('kjhkjh@k.com', 'lm lm');

});

	}

}
