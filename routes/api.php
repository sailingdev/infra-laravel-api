<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});



Route::post('/v1/signup', 'ApisInfraController@signup');
Route::get('/v1/signup', 'ApisInfraController@signup');

Route::post('/v1/emailverify', 'ApisInfraController@emailverify');
Route::get('/v1/emailverify', 'ApisInfraController@emailverify');

Route::post('/v1/signin', 'ApisInfraController@signin');
Route::get('/v1/signin', 'ApisInfraController@signin');

Route::post('/v1/getfiles', 'ApisInfraController@getfiles');
Route::get('/v1/getfiles', 'ApisInfraController@getfiles');


Route::post('/v1/getnotifications', 'ApisInfraController@getnotifications');
Route::get('/v1/getnotifications', 'ApisInfraController@getnotifications');



