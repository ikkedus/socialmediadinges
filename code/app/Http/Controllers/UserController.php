<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Project;
use App\Models\User;
use App\Rules\OldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index(){
        dd(User::findAll());
    }
    public function add(){
        return view("user.add",["id"=>0]);
    }
    public function save(Request $request){
        $validatedData = $request->validate([
            'password' => 'required|same:password2|min:8',
            'username' => 'required|email|min:8'
        ]);
        if(User::find(["username"=>$request->username]) === null){
            $user = new User();
            $user->setUsername($request->username);
            $user->setPassword($request->password);
            $user->setAdmin(false);
            $user->save();
            return "gebruiker toegevoegd";
        }
        return "gebruiker bestaat al";
    }
    public function edit($id){
        return view("user.edit",["id"=>$id]);
    }
    public function update(Request $request){
        $validatedData = $request->validate([
            'password' => 'required|same:password2|min:8|not_in:'.$request->oldpassword,
            'oldpassword' => [new OldPassword]
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
        $user = User::validateUser("cbm@live.nl","marco2510");
        if($user){
            session_start();
            $_SESSION["userid"] = $user->getId();
            return "login succes";
        }
        return "login failed";
    }

}
