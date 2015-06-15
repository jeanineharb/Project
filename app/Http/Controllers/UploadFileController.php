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
	
	public function sendMails() {

		$user = Auth::user();
		$data = Input::all();

		 $jsonClientsData = $data['d'];
		 $clientsData = json_decode($jsonClientsData, true);
		 $id = $data['id'];

		$subject = $clientsData['subject'];

		foreach ($clientsData as $key => $client){

			if (strcmp($key, "subject")==0) {
				continue;
			}

			$sent = Mail::Send('usertemplatesblades.'.$id, $client, function($message) use ($client, $user, $subject){
				$recipient = $client['emailTo'];
				$recipient = str_replace(' ', '', $recipient);
				$message->to($recipient, $client['nameTo']);
				$message->subject($subject);
				$message->from($user['email'], $user['name']);
			});

			return $sent;
		
			if($sent){
				echo "Mail to ".$client['emailTo']." sent";
			}
			else {
				echo "Mail to ".$client['emailTo']." failed";
			}
		}

		return url('/templates');
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
			return view('uploads.upload')->with('id', $id)->with('error',"File is empty");
	    }
		if(!$xml=simplexml_load_file($filename, 'SimpleXMLElement',LIBXML_NOERROR)){
			return view('uploads.upload')->with('id', $id)->with('error',"File is not well formed");
		}
		
		$clientsData = array();

		if (!$xml['subject']) {
					return view('uploads.upload')->with('id', $id)->with('error',"Please specify a subject attribute to your root element.");
		}
		$clientsData['subject']=(string)$xml['subject'];

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

		$stringToMatch = $temp->html;
		preg_match_all('/{{\$([^}]*)}}/', $stringToMatch, $matches);
		$tempcount = count($matches[0]);

		foreach($xml->children() as $client) {
			$count=0;

			foreach($client->children() as $field) {

				if ($field->children()->count()==0) {
					$count++;
				}

				if ($client['emailTo']) {
					$clientsData[$i]['emailTo']=(string)$client['emailTo'];
				}
				else{
					return view('uploads.upload')->with('id', $id)->with('error',"Please specify an emailTo attribute to ".$client->getName()." number : ".($i+1));
				}

				if ($client['nameTo']) {
					$clientsData[$i]['nameTo']=(string)$client['nameTo'];
				}
				else{
					return view('uploads.upload')->with('id', $id)->with('error',"Please specify a nameTo attribute to ".$client->getName()." number : ".($i+1));
				}


				$error = $this->recursiveCheckForChildren($field , $clientsData[$i] , $html , $addednodes , $stringtemp);

				if ($error) {
					return view('uploads.upload')->with('id', $id)->with('error',$error);
				}
			}
			// echo $count." ".$tempcount;
			if ($count != $tempcount) {
					return view('uploads.upload')->with('id', $id)->with('error',"Some of your template variables aren't defined in your xml.");
			}

			$i++;
		}


			$html->removeChild($html->doctype);           

		    file_put_contents("../resources/views/usertemplatesblades/".$id.".blade.php", html_entity_decode($html->saveHtml().$temp->css));
		   // $this->sendMails($clientsData,$id);

			echo view('uploads.testbeforesending')->with('data',json_encode($clientsData))->with('id',$id)->with('randomData',$clientsData[0]);

		}

	public function recursiveCheckForChildren($array , &$array2 , &$html , &$addednodes , $stringtemp){

		if (strcmp($array->getName(),"emailTo")==0) {
			return "You can't define a variable called emailTo, please choose another name.";
		}
		if (strcmp($array->getName(),"nameTo")==0) {
			return "You can't define a variable called nameTo, please choose another name.";
		}

		if ($array->count() == 0) {

			$name = $array->getName();

			if (strpos($stringtemp,'$'.$name)==false) {
				return "Variable ".$name." not defined in your template.";
			}

			$array2[$array->getName()]=(string)$array;
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

 			$i=0;

 			$trnode=$tbody->firstChild;

 			while ($trnode->getElementsByTagName('td')->length==0) {
 				$trnode=$trnode->nextSibling;
 			}

			$tbody->insertBefore($after,$trnode);
 			 		$tdnode;		

 			 	foreach ($array as $element) {

 					$tdnode=$trnode->getElementsByTagName('td')->item($i);

					while($tdnode->hasChildNodes()){
						$tdnode=$tdnode->firstChild;
					}
					$tdnode->nodeValue='{{ $row[\''.$element->getName().'\'] }}';
					$i++;

			}

			$rowstext='@endforeach';
			$after = new DOMText(utf8_decode($rowstext));
			$tbody->insertBefore($after,$trnode->nextSibling);

			}

			$arraytoadd = array();
			foreach ($array as $element){
				$arraytoadd[$element->getName()]=(string)$element;
			}
			array_push($array2[$array->getName()],$arraytoadd);
		}
	}
}