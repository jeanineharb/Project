<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Template;
use App\EmailCategory;
use App\UserTemplate;

use Input;
use Auth;
use DB;

class EditorController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$cat = EmailCategory::all();
		$userId = Auth::id();
		$ut = UserTemplate::all()->where('user', $userId);
		return view('predefinedTemplates')->with(array('cat'=>$cat, 'ut'=> $ut));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('editor');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//Get html string from modified template.
		$data = Input::all();
		$c = "Saved";

		$userId = Auth::id();
		$nb = DB::table('user_templates')->where('user', $userId)->count() + 1;

		$temp = new Template;
		$temp->category = $data['cat'];
		$temp->templateName = 'Custom Template #'.$nb;
		$temp->isFavorite = '0';
		$temp->isPredefined = '0';
		$temp->html = $data['html'];
		$temp->css = $data['css'];
		$temp->save();

		$ut = new UserTemplate;
		$ut->user = $userId;
		$ut->template = $temp->templateId;
		$ut->save();

		// foreach ($data as $name => $value) {
  //     		echo "$name: $value\n";
  // 		}

		if($data['action'] == "Save"){
			return url('/save/'.$c);
		}
		else{
			return url('/template');
		}

		// print_r($data);
		// return view('test')->with('data', $data);
		// Redirect::route('test', array('data' => $data));
		// Redirect::to($url, array('data'=>$data));
		// Redirect::to($url)->withInput();
		// echo implode(" ",$data);
		// return View::make('test')->with('data', $d);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$temp = Template::where('templateId', '=', $id)->get()->first();
		return view('template')->with('temp', $temp);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
