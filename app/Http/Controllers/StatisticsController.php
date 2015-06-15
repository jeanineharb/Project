<?php namespace App\Http\Controllers;

use App\Batch;
use App\MailStatus;

use Auth;

class StatisticsController extends Controller {

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
	 * Show the application welcome screen to the user.
	 *s
	 * @return Response
	 */
	public function index()
	{
		$userId = Auth::id();
		$bat = Batch::orderBy('batchId', 'desc')->where('user', $userId)->get();

		return view('stats')->with('batches', $bat);

	}

}