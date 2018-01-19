<?php

namespace App\Http\Controllers;

use App\Models\ContentBlock;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        return view('project.project');
    }
    public function modal($id){
        return view('project.modal');
    }

}
