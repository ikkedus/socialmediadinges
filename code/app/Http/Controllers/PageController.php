<?php

namespace App\Http\Controllers;

use App\Helpers\CurrentUser;
use App\Models\ContentBlock;
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
    public function save(Request $request)
    {
        foreach ($request->except('regions','images','page') as $key => $part) {

            $cb = new ContentBlock();
            $cb->setContent($part);
            $cb->setName($key);
            $cb->setPageid(1);
            $cb->save();
        }


        if(!CurrentUser::IsAuthenticated()){
            //return redirect('/admin/login');
        }
    }
    public function renderPage($title)
    {
        return view("page.template",Page::find(["title"=>$title]));
    }

}
