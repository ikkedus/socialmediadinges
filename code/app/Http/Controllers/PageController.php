<?php

namespace App\Http\Controllers;

use App\Helpers\CurrentUser;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        if(!CurrentUser::IsAuthenticated()){
            //return redirect('/admin/login');
        }
        return view("admin.page.add");
    }
    public function save()
    {
        if(!CurrentUser::IsAuthenticated()){
            return redirect('/admin/login');
        }
    }
    public function renderPage($title)
    {
        return view("page.template",Page::find(["title"=>$title]));
    }

}
