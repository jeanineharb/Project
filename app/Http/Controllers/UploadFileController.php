<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Template;
use App\EmailCategory;

use Input;

class UploadFileController extends Controller {
/**
* Display a listing of the resource.
*
* @return Response
*/
	public function upload()
	{
		return view('uploads.upload');
	}
	
	public function postupload() {
		$data = array();
		$XMLdata = array();

		$error="";
		$data['error'] = $error;

		$allowed =  array('xml');
		$filename = $_FILES['userfile']['tmp_name'];
		$originalfilename = $_FILES['userfile']['name'];

		$ext = pathinfo($originalfilename, PATHINFO_EXTENSION);

		if(!in_array($ext,$allowed) ) {
			$data['error'] = "wrong file extension";
			return view('test')->with('data', $data);
		}

		$xml=simplexml_load_file($filename) or die("Error: Cannot create object");
		
		foreach($xml->children() as $client) { 
			foreach($client->children() as $field) { 
				$this->recursiveCheckForChildren($field , $XMLdata);
			}
		}

		$data['xml'] = $XMLdata;

		// handle data here//
		return view('test')->with('data', $data);
	}

	public function recursiveCheckForChildren($array , &$array2){
		if ($array->count() == 0) {
			// echo $array->getName() . " : " . $array . "<br>";
			$arrayToAdd = array($array->getName() , $array);
			array_push($array2, $arrayToAdd);
		}
		else{
			foreach ($array as $element) {
				$this->recursiveCheckForChildren($element,$array2);
			}
		}
	}
}