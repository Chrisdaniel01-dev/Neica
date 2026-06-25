<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    /**
     * Handle volunteer form submission.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'skills' => 'nullable|string|max:1000',
            'availability' => 'nullable|string|max:255',
            'motivation' => 'nullable|string|max:2000',
        ]);

        $validated['status'] = 'pending';

        Volunteer::create($validated);

        return redirect()->route('home')->with('success', 'Votre candidature a été envoyée avec succès. Merci de votre engagement à nos côtés!');
    }

}
