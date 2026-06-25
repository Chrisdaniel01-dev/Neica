<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Project;

class HomeController extends Controller
{
    /**
     * Homepage - shows latest projects
     */
    public function home()
    {
        $projects = Project::latest()->take(3)->get();

        return view('home', compact('projects'));
    }

 
}
