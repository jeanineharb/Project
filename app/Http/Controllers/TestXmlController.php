<?php namespace App\Http\Controllers;

class TestXmlController extends Controller {

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

$xml=simplexml_load_file("books.xml") or die("Error: Cannot create object");

	foreach($xml->children() as $books) { 

    echo $books->title . ", "; 
    echo $books->author . ", "; 
    echo $books->year . ", ";
    echo $books->price . "<br>"; 
} 

	}

}
