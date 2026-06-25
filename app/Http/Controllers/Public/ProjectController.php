<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * List all projects
     */
    public function index()
    {
            $projects = Project::whereIn('status', ['active','completed'])->latest()->get();

            return view('projects.index', compact('projects'));
    }

    

    /**
     * Show single project details
     */
    public function show(Project $project)
    {

        return view('projects.show', compact('project'));
    }

  
}
