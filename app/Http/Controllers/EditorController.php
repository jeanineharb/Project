<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Template;
use App\EmailCategory;

use Input;

class EditorController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		// $cat = Template::find(1)->category();

		// return view('predefinedTemplates')->with('cat', $cat);
		// $templates = Template::all();
		$cat = EmailCategory::all();
		return view('predefinedTemplates')->with('cat', $cat);

		// return view('predefinedTemplates');
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
		$c = "hola";

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
