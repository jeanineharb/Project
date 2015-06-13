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

Route::get('/templates', 'EditorController@index');
Route::get('/template/new', array('as' => 'new.temp', 'uses' =>'EditorController@create'));
Route::get('/template/pick/{id}', array('as' => 'pick.temp', 'uses' =>'EditorController@show'));
Route::get('/template/edit/{id}', array('as' => 'edit.temp', 'uses' =>'EditorController@edit'));
Route::any('/template/save', array('as' => 'save.temp', 'uses' =>'EditorController@store'));
Route::any('/template/rename', array('as' => 'rename.temp', 'uses' =>'EditorController@rename'));
Route::get('/template/delete/{id}', array('as' => 'delete.temp', 'uses' =>'EditorController@delete'));
Route::get('/template/send/{id}', array('as' => 'send.temp', 'uses' =>'EditorController@send'));


Route::any('/upload/{id}', array('as' => 'upload', 'uses' => 'UploadFileController@upload'));
Route::post('/postupload/{id}', 'UploadFileController@postupload');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
