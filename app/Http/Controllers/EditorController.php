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
use Redirect;

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
		return view('editor')->with('action', 'save');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::all();
		$userId = Auth::id();
		
		$action = $data['action'];

		if($action == "save"){
			//Save template as a new record.
			$nb = UserTemplate::all()->where('user', $userId)->count() + 1;

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
		}
		else{
			//Edit existing template.
			$temp = Template::find($data['id']);
			$temp->html = $data['html'];
			$temp->save();
		}

		return url('/templates');

		// 	return url('/upload', ['id' => $temp->templateId]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$temp = Template::find($id);
		return view('template')->with(array('temp' => $temp, 'action' => 'save'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$temp = Template::find($id);
		return view('template')->with(array('temp' => $temp, 'action' => 'edit'));
	}


	public function rename()
	{
		$data = Input::all();
		$id = $data['id'];
		$newName = $data['value'];

		$temp = Template::find($id);
		$temp->templateName = $newName;
		$temp->save();

		return url('/templates');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function send($id)
	{
		return Redirect::to('/upload', array('id', $id));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id)
	{
		Template::destroy($id);
		return Redirect::to('/templates');
	}

}
