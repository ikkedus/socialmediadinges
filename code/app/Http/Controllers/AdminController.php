<?php

namespace App\Http\Controllers;

use App\Helpers\CurrentUser;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        if(!CurrentUser::IsAuthenticated()){
            return redirect('/admin/login');
        }
        return view("admin.template",["title"=>"Dashboard"]);
    }

}
