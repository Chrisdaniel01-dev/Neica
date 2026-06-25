<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Volunteer;
use App\Models\Project;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    /**
     * Display all volunteers.
     */
    public function index()
    {
        $volunteers = Volunteer::latest()->paginate(10);

        return view(
            'admin.volunteers.index',
            compact('volunteers')
        );
    }


     /**
     * Display volunteer details.
     */
    public function show(Volunteer $volunteer)
    {
        return view(
            'admin.volunteers.show',
            compact('volunteer')
        );
    }


     /**
     * Actions on all volunteers.
     */
    public function approve(Volunteer $volunteer)
    {
        $volunteer->update([
            'status' => 'approved'
        ]);

        return back()->with(
            'success',
            'Le bénévole a été activé avec succès.'
        );
    }

    public function reject(Volunteer $volunteer)
    {
        $volunteer->update([
            'status' => 'rejected'
        ]);

        return back()->with(
            'success',
            'La candidature a été rejetée.'
        );
    }

        /**
     * Show edit form.
     */
    public function edit(Volunteer $volunteer)
    {
        return view(
            'admin.volunteers.edit',
            compact('volunteer')
        );
    }

    /**
     * Update volunteer.
     */
    public function update(Request $request, Volunteer $volunteer)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'skills' => 'nullable|string',
            'availability' => 'nullable|string',
            'motivation' => 'nullable|string',
            'status' => 'required|string'
        ]);

        $volunteer->update($validated);

        return redirect()
            ->route('admin.volunteers.index')
            ->with('success', 'Bénévole mis à jour avec succès.');
    }

    /**
     * Delete volunteer.
     */
    public function destroy(Volunteer $volunteer)
    {
        $volunteer->delete();

        return redirect()
            ->route('admin.volunteers.index')
            ->with('success', 'Bénévole supprimé avec succès.');
    }


    public function showAssignProjectForm(Volunteer $volunteer)
    {
        $projects = Project::orderBy('title')->get();

        return view(
            'admin.volunteers.assign-project',
            compact('volunteer', 'projects')
        );
    }

    public function assignProject(Request $request, Volunteer $volunteer)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
        ]);

        $volunteer->projects()->syncWithoutDetaching([
            $request->project_id
        ]);

        return redirect()
            ->route('admin.volunteers.show', $volunteer)
            ->with(
                'success',
                'Le bénévole a été affecté au projet avec succès.'
            );
    }
}