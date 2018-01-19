<?php

namespace App\Http\Controllers;
use App\Helpers\CurrentUser;

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
        if(!CurrentUser::IsAdmin()){
            return redirect('/admin');
        }
        return view("admin.user.add ",["id"=>0,"title"=>"Gebruikers","users"=>User::findAll()]);
    }

    public function save(Request $request){
        if(!CurrentUser::IsAdmin()){
            return redirect('/admin/login');
        }
        $validatedData = $request->validate([
            'password' => 'required|same:password2|min:8',
            'email' => 'required|email|min:8'
        ]);
        if(User::find(["username"=>$request->username]) === null){
            $user = new User();
            $user->setUsername($request->username);
            $user->setEmail($request->email);
            $user->setPassword($request->password);
            $user->setFirstname($request->firstname);
            $user->setLastname($request->lastname);
            $user->setPrefix($request->prefix);
            $user->setAdmin(false);
            $user->save();
            return view("admin.user.add ",["id"=>0,"message"=>"User Has been Added","title"=>"Gebruikers","users"=>User::findAll()]);
        }
        return view("admin.user.add ",["id"=>0,"message"=>"error","errors"=>$validatedData,"title"=>"Gebruikers","users"=>User::findAll()]);
    }
    public function edit($id){
        if(!CurrentUser::IsAdmin()){
            return redirect('/admin/login');
        }
        return view("user.edit",["id"=>$id]);
    }
    public function lock($id){

        $user = User::find(["id"=>$id]);
        $user->setLocked(!$user->getLocked());
        $user->save();
        return redirect("users");
    }
    public function login(){
        if(CurrentUser::IsAuthenticated()){
            return redirect('/admin');
        }
        return view('admin.login',['status'=>false]);
    }
    public function update(Request $request){
        if(!CurrentUser::IsAdmin()){
            return redirect('/admin/login');
        }
        $validatedData = $request->validate([
            'password' => 'required|same:password2|min:8|not_in:'.$request->oldpassword,
            'oldpassword' => [new OldPassword]
        ]);
        $user = User::find(['id'=>$request->id]);
        $user->setPassword($request->password);
        $user->save();
    }
    public function delete($id){
        if(!CurrentUser::IsAdmin()){
            return redirect('/admin/login');
        }
        $user = User::find(["id"=>$id]);
        $user->thrash();
        return redirect("users");
    }
    public function validateUser(Request $request){
        $user = User::validateUser($request->username,$request->password);
        if(!$user->getLocked()){
            session_start();
            $_SESSION["userid"] = $user->getId();
            return redirect("/admin");
        }
        return redirect("/admin/login");
    }
    public function logout()
    {
        session_start();
        $_SESSION["userid"] = null;
        return redirect("/admin/login");
    }


}
