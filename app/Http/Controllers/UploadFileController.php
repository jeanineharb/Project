<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Template;
use App\EmailCategory;
use Auth;

use Input;
use Mail;

class UploadFileController extends Controller {
/**
* Display a listing of the resource.
*
* @return Response
*/
	public function upload($id)
	{

		return view('uploads.upload')->with('id', $id)->with('error','');
	}
	
	public function postupload($id) {


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

			return view('uploads.upload')->with('id', $id)->with('error',"Please choose a valid file format.");

		}

		if ($_FILES['userfile']['size'] == 0) {

			return view('uploads.upload')->with('id', $id)->with('error',"File is emptpy");

	    }

		if(!$xml=simplexml_load_file($filename, 'SimpleXMLElement',LIBXML_NOERROR)){

			return view('uploads.upload')->with('id', $id)->with('error',"File is not well formed");

		}
		
		$clientsData = array();
		
		$i = 0;

		foreach($xml->children() as $client) {


			foreach($client->children() as $field) { 
				$this->recursiveCheckForChildren($field , $clientsData[$i]);
			}

			$i++;

		}

			  $temp = Template::where('templateId', '=', $id)->get()->first();
			  $stringtemp = $temp->html.$temp->css;
			  file_put_contents("../resources/views/usertemplatesblades/".$id.".blade.php", $stringtemp);

		$user = Auth::user();
		echo $user;

	    foreach ($clientsData as $client) {

		if(Mail::Send('usertemplatesblades.'.$id , $client, function($message) use ($client , $user){
	    
	     $recipient = $client['mail'];
		 $recipient = str_replace(' ', '', $recipient);

   		 $message->to($recipient, $client['name']);
   		 $message->subject('Welcome to the Laravel 4 Auth App!');
   		 $message->from('info@emailtemplateproject.com', $user['name']);

		})){
			echo "Mail to ".$client['mail']." sent";
		}
		else {

			echo "Mail to ".$client['mail']." failed";
		}

	    }

		//return view('usertemplatesblades.'.$id,$XMLdata);//->with('data', $XMLdata);
	}

	public function recursiveCheckForChildren($array , &$array2){
		if ($array->count() == 0) {
			// echo $array->getName() . " : " . $array . "<br>";
			//$arrayToAdd = array($array->getName() , $array);

			$array2[$array->getName()]=$array;
			//array_push($array2, $arrayToAdd);
		}
		else{
			foreach ($array as $element) {
				$this->recursiveCheckForChildren($element,$array2);
			}
		}
	}
}