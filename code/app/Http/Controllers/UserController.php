<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        dd(User::findAll(["username"=>"test"]));
    }
    public function create(){
        $user = new User();
        $user->setPassword("hello");
        $user->setUsername("test");
        $user->setAdmin(true);
        $user->setCreatedon("".date("Y-m-d H:i:s"));
        $user->setUpdatedon("".date("Y-m-d H:i:s"));
        $user->save();
    }
    public function delete(){
        $user = User::find(["username"=>"test"]);
        $user->thrash();
    }
    public function validateUser(){
        if(($user = User::find(["username"=>"test","password"=>"hell"])) != null){
            
        }
    }

}
