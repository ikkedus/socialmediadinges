<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        dd(User::findAll(["username"=>"test"]));
    }
    public function add(){
        return view("user.add",["id"=>0]);
    }
    public function save(Request $request){
        $validatedData = $request->validate([
            'password' => 'required|same:password2|min:8',
            'username' => 'required|email|min:8'
        ]);
        $user = new User();
        $user->setUsername($request->username);
        $user->setPassword($request->password);
        $user->setAdmin(true);
        $user->save();

    }
    public function edit($id){
        return view("user.add",["id"=>$id]);

    }
    public function update(Request $request){
        $validatedData = $request->validate([
            'password' => 'required|same:password2|min:8',
        ]);
        $user = User::find(['id'=>$request->id]);
        $user->setPassword($request->password);
        $user->save();
    }
    public function delete(){
        $user = User::find(["username"=>"test"]);
        $user->thrash();
    }
    public function validateUser(){
        $user = new User();
        $user = User::validateUser("test","hello");
        if($user){
            dd($user);
        }
    }

}
