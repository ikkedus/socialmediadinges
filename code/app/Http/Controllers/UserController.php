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
    public function create(){
        $user = new User();
        $user->setUsername("test");
        $user->setPassword("hallo");
        $user->setAdmin(true);
        $user->save();

        $post = new Post();
        $post->setPost("hello this is post");
        $post->setUserId(User::find(["username"=>'test'])->getId());
        $post->save();
        dd(User::find(["username"=> 'test'])->getPosts());
    }
    public function update(){
        $user = User::find(["username"=>"test"]);
        $posts = $user->getPosts();
        $post = $posts[0];
        $post->setPost("this is mod");
        $post->save();
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
