<?php

namespace App\Http\Controllers;

use App\Models\ContentBlock;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $cb = new ContentBlock();
        $html ="<!DOCTYPE html>
                <html>
                <body>
                
                <h1>My First Heading</h1>
                
                <p>My first paragraph.</p>
                
                </body>
                </html>";
        $cb->setContent($html);
        return $cb->getContent();
    }
}
