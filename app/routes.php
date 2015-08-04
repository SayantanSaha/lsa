<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('login');
});
Route::get('login', function()
{
	return View::make('login');
});
Route::get('newapp', function()
{
	return View::make('newApp');
});
Route::get('/lang/{lng}', array('uses' => 'AppController@setLanguage'));
Route::group(array('prefix' => 'api/v1', 'before' => 'auth'), function()
{
	Route::resource('user', 'UserController');
	Route::resource('district', 'DistrictController');
	Route::get('district/{id}/subdivisions', array('uses' => 'DistrictController@showSubdivisions'));
	Route::get('district/{id}/circles', array('uses' => 'DistrictController@showCircles'));
	Route::resource('subdivision', 'SubdivisionController');
	Route::resource('circle', 'CircleController');
	Route::get('circle/{id}/mouzas', array('uses' => 'CircleController@showMouzas'));
	Route::get('circle/{id}/villages', array('uses' => 'CircleController@showVillages'));
	Route::get('circle/{id}/applications', array('uses' => 'CircleController@showApplications'));
	Route::resource('mouza', 'MouzaController');
	Route::get('mouza/{id}/villages', array('uses' => 'MouzaController@showVillages'));
	Route::get('mouza/{id}/applications', array('uses' => 'MouzaController@showApplications'));
	Route::resource('village', 'VillageController');
	Route::resource('application', 'ApplicationController');
	Route::get('application/{circleId}/{appStatus}/count', array('uses' => 'ApplicationController@showCount'));
	Route::get('village/{villageId}/class', array('uses' => 'ApplicationController@getClass'));
	Route::post('village/{villageId}/rate', array('uses' => 'VillageController@saveRate'));
	Route::get('application/{circleId}/{appStatus}/list', array('uses' => 'ApplicationController@showList'));
	Route::any('search/application/list', array('uses' => 'ApplicationController@searchList'));
	Route::get('application/{id}/status', array('uses' => 'ApplicationController@showStatus'));
	
	Route::match(array('GET', 'POST'),'application/{id}/updateStatus', array('uses' => 'ApplicationController@updateStatus'));
	Route::post('application/{id}', array('uses' => 'ApplicationController@edit'));
	Route::post('application/{id}/edit', array('uses' => 'ApplicationController@edit'));
	Route::resource('role', 'RoleController');
	//Route::resource('file', 'FileController');
	Route::post('file/{appId}',array('uses' => 'AttachmentController@saveAttachment'));
	//Route::post('nic/{appId}',array('uses' => 'AttachmentController@saveNIC'));
	Route::get('file/{appId}',array('uses' => 'AttachmentController@getAttachment'));
	Route::get('file/download/{appId}/{fileName}',array('uses' => 'AttachmentController@downloadAttachment'));
	
	Route::resource('comment', 'CommentController');
	Route::resource('committee', 'CommitteeController');
	Route::get('committee/applications', array('uses' => 'ApplicationController@committeeList'));
	
});
Route::post('login', array('uses' => 'UserController@login'));
Route::get('logout', array('uses' => 'UserController@logout'));

Route::get('home', array('before' => 'auth','uses' => 'PageController@showHome'));
Route::get('new', array('before' => 'auth','uses' => 'PageController@showNew'));
Route::any('{appStatus}', array('before' => 'auth','uses' => 'PageController@showList'));
Route::any('application/updatemultiplestatus', array('before' => 'auth','uses' => 'ApplicationController@updateMultipleStatus'));
Route::any('view/{appId}', array('before' => 'auth','uses' => 'PageController@showDetails'));
Route::any('view/district/{distId}', array('before' => 'auth','uses' => 'PageController@showDistHome'));
Route::any('view/subdiv/{subdivId}', array('before' => 'auth','uses' => 'PageController@showSubdivHome'));
Route::any('user/profile', array('before' => 'auth','uses' => 'PageController@showProfile'));
Route::any('view/circle/{circleId}', array('before' => 'auth','uses' => 'PageController@showCircleHome'));
Route::any('view/mouza/{mouzaId}', array('before' => 'auth','uses' => 'PageController@showMouzaHome'));
Route::any('view/village/{villageId}', array('before' => 'auth','uses' => 'PageController@showVillageHome'));
Route::any('edit/{appId}', array('before' => 'auth','uses' => 'PageController@showEdit'));
Route::get('application/{id}/noc', array('before' => 'auth','uses' => 'PageController@showNOC'));
Route::get('nic/{appId}', array('before' => 'auth','uses' => 'PageController@showNIC'));
Route::get('ack/{appId}', array('before' => 'auth','uses' => 'PageController@showAck'));
Route::any('committee/{comId}', array('before' => 'auth','uses' => 'PageController@showCommittee'));
Route::any('/user/{id}/update', array('before' => 'auth','uses' => 'UserController@updatePwd'));
Route::any('new/committee', array('before' => 'auth','uses' => 'PageController@showCommHome'));

