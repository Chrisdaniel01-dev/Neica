<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    /**
     * Display donation form for a project.
     */
    public function create()
    {
        return view('donate');
    }

    /**
     * Handle donation submission.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            /*'project_id' => 'required|exists:projects,id',*/
            'donor_name' => 'required|string|max:255',
            'donor_email' => 'required|email|max:255',
            'amount' => 'required|numeric|min:1',
            'message' => 'nullable|string|max:1000',
            'payment_method' => 'required|in:bank_transfer,paypal,stripe',
        ]);

        $validated['status'] = 'pending';
        $validated['transaction_id'] = 'TXN-' . time() . '-' . rand(1000, 9999);

        Donation::create($validated);

        return redirect()->route('donate.create')
        ->with('success', 'Thank you for your donation!');
    }

    /**
     * Display all donations (admin).
     */
    public function index()
    {
        $donations = Donation::latest()->get();
        return view('admin.donations.index', compact('donations'));
    }
}
