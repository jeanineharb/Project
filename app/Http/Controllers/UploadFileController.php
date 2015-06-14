<?php 

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Template;
use App\EmailCategory;

use Auth;
use Input;
use Mail;

use SimpleXMLElement;
use DOMDocument;
use DOMText;


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
	
	public function sendMails($clientsData) {
		
		foreach ($clientsData as $client) {
			if(Mail::Send('usertemplatesblades.'.$id , $client, function($message) use ($client , $user , $subject){
			
				$recipient = $client['email'];
				$recipient = str_replace(' ', '', $recipient);
				$message->to($recipient, $client['name']);
				$message->subject($subject);
				$message->from($user['email'], $user['name']);
			})){
				echo "Mail to ".$client['email']." sent";
			}

			else {
				echo "Mail to ".$client['email']." failed";
			}
		}
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
			return view('uploads.upload')->with('id', $id)->with('error',"File is empty.");
		}

		if(!$xml=simplexml_load_file($filename, 'SimpleXMLElement',LIBXML_NOERROR)){
			return view('uploads.upload')->with('id', $id)->with('error',"File is not well-formed.");
		}
		
		$clientsData = array();
		
		$i = 0;

		$temp = Template::where('templateId', '=', $id)->get()->first();
		$stringtemp = $temp->html.$temp->css;

		$html = new DOMDocument('1.0', 'UTF-8'); 
		$html->loadHTML($temp->html);
		$html->createDocumentFragment();
		$head = $html->createElement('head');

		$after = new DOMText(utf8_decode('<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>'));
		
		$addednodes = array();

		foreach($xml->children() as $client) {
			foreach($client->children() as $field) {
				$this->recursiveCheckForChildren($field , $clientsData[$i] , $html , $addednodes);
			}
			$i++;
		}

		$html->removeChild($html->doctype);

		// file_put_contents("../resources/views/usertemplatesblades/".$id."t.blade.php", html_entity_decode("@extends('app')"
		// ."@section('content')".$html->saveHtml().$temp->css."@endsection"));
		// $head->appendChild($after);
		// $html->insertBefore($head,$html);

		file_put_contents("../resources/views/usertemplatesblades/".$id.".blade.php", html_entity_decode($html->saveHtml().$temp->css));
		echo view('uploads.testbeforesending')->with('data',$clientsData[array_rand($clientsData)])->with('id',$id);
		
		$user = Auth::user();
		$subject = $xml['subject'];
		
		$stringToMatch = $temp->html;
		preg_match_all('/{{\$([^}]*)}}/', $stringToMatch, $matches);
		
		$xmlString = "<?xml version='1.0' encoding='utf-8'?>";
		$xmlString=$xmlString."<name>";
		$xmlString=$xmlString."<mail></mail></name>";
		
		//return view('usertemplatesblades.'.$id,$clientsData[0]);//->with('data', $XMLdata);
	}


	public function recursiveCheckForChildren($array , &$array2 , &$html , &$addednodes){
		
		if ($array->count() == 0) {
			$array2[$array->getName()]=$array;
		}
		else{
			$i=0;
			$tbody=$html->getElementById($array->getName())->firstChild;
			
			if (!array_key_exists($array->getName(),$array2)) {
				$array2[$array->getName()]=array();
			}
			
			if (!array_key_exists($array->getName(),$addednodes)) {
				$addednodes[$array->getName()]=1;
	 			$rowstext='@foreach ($'.$array->getName().' as $row)';
	 			
	 			$after = new DOMText(utf8_decode($rowstext));
				$tbody->insertBefore($after,$tbody->lastChild);
	 			
	 			$i=0;
	 			
	 			$trnode=$tbody->childNodes->item(1);
	 			$tbody->removeChild($trnode);
	 			$tdnode=$trnode->firstChild;

 			 	foreach ($array as $element) {
 					$tdnode=$trnode->getElementsByTagName('td')->item($i);
					
					while($tdnode->hasChildNodes()){
						$tdnode=$tdnode->firstChild;
					}

					$tdnode->nodeValue='{{ $row[\''.$element->getName().'\'] }}';
					$i=$i+1;
				}

				$tbody->insertBefore($trnode,$tbody->lastChild);
				$rowstext='@endforeach';
				$after = new DOMText(utf8_decode($rowstext));
				$tbody->insertBefore($after,$tbody->lastChild);
			}
			
			$arraytoadd = array();
			
			foreach ($array as $element)
				$arraytoadd[$element->getName()]=$element;
			
			array_push($array2[$array->getName()],$arraytoadd);
		}
	}
}