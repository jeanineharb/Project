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

class SendEmailsController extends Controller {
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

		$user = Auth::user();
		$subject = $clientsData['subject'];

	    foreach ($clientsData as $client) {
			if(Mail::Send('usertemplatesblades.'.$id , $client, function($message) use ($client , $user , $subject){
		    
		     $recipient = $client['emailTo'];
			 $recipient = str_replace(' ', '', $recipient);
	   		 $message->to($recipient, $client['nameTo']);
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

}