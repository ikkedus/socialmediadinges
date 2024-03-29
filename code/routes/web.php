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
    return view('home.home');
});
Route::get('/hello',function (){
    phpinfo();
});

Route::get('/project','ProjectController@index');
Route::get('/project/modal/{id}','ProjectController@modal');

Route::get('/admin',"AdminController@index");



Route::get('/admin/login',"UserController@login");
Route::post('/admin/validate',"UserController@validateUser");

Route::get('/admin/pages',"PageController@index");
Route::post('/page/save',"PageController@save");

Route::post('/image/upload',"ImageController@upload");
Route::post('/image/clear',"ImageController@clear");
Route::post('/image/rotate',"ImageController@rotate");
Route::post('/image/crop',"ImageController@crop");



Route::get('/user','UserController@index');
Route::get('/users',"UserController@add");
Route::post('/user/save',"UserController@save");
Route::get('/user/edit/{id}',"UserController@edit");
Route::post('/user/update',"UserController@update");
Route::get('/user/delete/{id}','UserController@delete');
Route::get('/user/validate',"UserController@validateUser");
Route::get('/user/lock/{id}',"UserController@lock");
Route::get('/user/logout',"UserController@logout");