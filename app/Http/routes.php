<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/about', 'WelcomeController@about');

Route::get('/testMail', 'TestMailController@index');
Route::get('/testXml', 'TestXmlController@index');

Route::get('/template', 'EditorController@index');
Route::get('/template/new', 'EditorController@create');
Route::get('/template/edit/{id}', array('as' => 'edit.temp', 'uses' =>'EditorController@edit'));

Route::get('/save', 'EditorController@store');

Route::get('upload', function() {
  return View::make('uploads.upload');
});

Route::post('apply/upload', 'ApplyController@upload');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
