<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::latest()->get();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }



    public function show(Project $project)
    {
        $project->load('volunteers');
        return view('admin.projects.show', compact('project'));
    }
/**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    // Validation
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'target_audience' => 'required|string|max:255',
        'project_impact' => 'required|string|max:255',
        'status' => 'required|string|in:ongoing,planned',
        'goal_amount' => 'required|numeric|min:0',
        'image' => 'nullable|image|max:2048',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
    ]);

    // Prevent creating completed project manually
    if ($request->status === 'completed') {
        return back()->withErrors([
            'status' => 'Un projet ne peut pas être créé comme terminé.'
        ])->withInput();
        }

    // Convert frontend status → DB status
        $statusMap = [
            'ongoing' => 'active',
            'planned' => 'draft',
        ];

        // Handle image upload
        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request
                ->file('image')
                ->store('projects', 'public');
        }


        // Save project
        Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'target_audience' => $request->target_audience,
            'impact' => $request->project_impact,
            'goal_amount' => $request->goal_amount,
            'current_amount' => 0,
            'status' => $statusMap[$request->status],
            'image' => $imagePath,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);


     
    return redirect()
        ->route('admin.projects.index')
        ->with('success', 'Projet créé avec succès.');
    }

    public function edit(Project $project)
        {
            return view('admin.projects.edit', compact('project'));
        }


        // UPDATE

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'target_audience' => 'required|string|max:255',
            'project_impact' => 'required|string|max:255',
            'status' => 'required|string|in:ongoing,planned',
            'image' => 'nullable|image|max:2048',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $statusMap = [
            'ongoing' => 'active',
            'planned' => 'draft',
        ];

        if ($request->hasFile('image')) {
            $project->image = $request->file('image')->store('projects', 'public');
        }

        $project->update([
            'title' => $request->title,
            'description' => $request->description,
            'target_audience' => $request->target_audience,
            'impact' => $request->project_impact,
            'status' => $statusMap[$request->status],
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'image' => $project->image,
        ]);

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Projet mis à jour avec succès.');
    }

    public function destroy(Project $project)
    {
            $project->delete();

            return redirect()
                ->route('admin.projects.index');
    }

    public function removeVolunteer(Project $project,Volunteer $volunteer)
    {
            $project->volunteers()->detach(
                $volunteer->id
            );

            return back()->with(
                'success',
                'Le bénévole a été retiré du projet.'
            );
    }
}
