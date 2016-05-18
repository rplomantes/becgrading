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

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::get('auth/changepassword', 'RecordingController@getReset');
Route::post('auth/changepassword', 'RecordingController@postReset');


Route::get('/', 'RecordingController@index');
Route::get('viewgrade/{id}/{currentsubject}','RecordingController@viewgrade');
Route::get('recording/update/{id}/{type}/{value}', 'RecordingController@encodegrade');
