<?php namespace App\Http\Controllers;
use Input;
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

	public function recursiveCheckForChildren($array , $array2){


				if ($array->count() == 0) {

					echo $array->getName() . " : " . $array . "<br>";

					$arrayToAdd = array($array->getName() , $array);
					array_push($array2, $arrayToAdd);

				}

				else{

					foreach ($array as $element) {

							$this->recursiveCheckForChildren($element,$array2);

					}

				}

	}

	public function index()
	{

			$arrayToPassToJeanine = array();

			$xml=simplexml_load_file("books.xml") or die("Error: Cannot create object");

			foreach($xml->children() as $client) { 

				echo "-------------------- Client ------------------------<br>";

		    	foreach($client->children() as $field) { 
				$this->recursiveCheckForChildren($field,$arrayToPassToJeanine);

		    	 }

		    	echo "<br><br>";
			} 

	}

}
