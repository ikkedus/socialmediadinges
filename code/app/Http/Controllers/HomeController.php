<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::getMostRecent();
        $projects = Project::findAll("1=1 Limit 12");
        return view('home.home',['events'=> $events,'projects'=>$projects]);
    }
}
