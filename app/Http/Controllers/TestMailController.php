<?php namespace App\Http\Controllers;

use Mail;

class TestMailController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

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
	 * Show the application welcome screen to the user.
	 *s
	 * @return Response
	 */
	public function index()
	{
		echo "asdasdas";


	$data  = array('firstname' =>  'Jeanine',);

	Mail::send('emails.emailcontent', $data, function($message) {

    $message->to('jeanine.harb@gmail.com', 'Jon Doe')->subject('Welcome to the Laravel 4 Auth App!');
});

	}

}
