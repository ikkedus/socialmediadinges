<?php

namespace App\Http\Controllers;

use App\Dao\Post;
use Illuminate\Http\Request;

class pagecontroller extends Controller
{
    function index($page){

        return $page;
    }
}
