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

Route::get('/admin',function (){
    return view('admin.template',["title" => "Dashboard"]);
});



Route::get('/admin/login',"UserController@login");
Route::post('/admin/validate',"UserController@validateUser");


Route::get('/user','UserController@index');
Route::get('/user/add',"UserController@add");
Route::post('/user/save',"UserController@save");
Route::get('/user/edit/{id}',"UserController@edit");
Route::post('/user/update',"UserController@update");
Route::get('/user/delete','UserController@delete');
Route::get('/user/validate',"UserController@validateUser");