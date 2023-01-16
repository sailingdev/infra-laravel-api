<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});




Auth::routes();




Route::get('/home', 'HomeController@index')->name('home');



Route::group(['middleware' => ['auth']], function () {
Route::group(['middleware' => ['role']], function () {

    Route::get('/dashboard', 'DashboardController@dashboard');

    Route::get('/project', 'ProjectController@project');
    Route::get('/add_project', 'ProjectController@add_project');
    Route::post('/add_project', 'ProjectController@create_project');
    Route::get('/edit_project/{id}', 'ProjectController@edit_project');
    Route::post('/edit_project/', 'ProjectController@update_project');
    Route::get('/delete_project/{id}', 'ProjectController@delete_project');


    Route::get('/users', 'UserManagementController@users');
    Route::post('/user/isActive', 'UserManagementController@isActive');
    Route::post('/user/remove', 'UserManagementController@remove');
    Route::get('/user/project_permission/{id}', 'UserManagementController@project_permission');
    Route::post('user/project_permission', 'UserManagementController@user_project_permission');


    Route::get('/option', 'OptionController@option');
    Route::get('/add_option', 'OptionController@add_option');
    Route::post('/add_option', 'OptionController@create_option');
    Route::get('/edit_option/{id}', 'OptionController@edit_option');
    Route::post('/edit_option', 'OptionController@update_option');
    Route::get('/delete_option/{id}', 'OptionController@delete_option');


    Route::get('/file_form', 'FileController@file_form');
    Route::post('/file_upload', 'FileController@fileUpload');

    Route::get('/notification', 'NotificatinController@notification');
    Route::post('/notification/remove', 'NotificatinController@remove');

    Route::post('/getStatistics', 'DashboardController@getStatistics');


});
});

Route::post('/getusers', 'UserManagementController@getusers');
Route::post('/notifications', 'NotificatinController@notifications');




Route::get('/test', function (){
    return view('chart');
});


