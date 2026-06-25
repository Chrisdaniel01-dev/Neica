<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Post;
use App\Models\Donation;
use App\Models\Volunteer;
use App\Models\Message;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the dashboard.
     */
    public function index()
    {
       

        $activities = collect();

        //Projects activities
        foreach (Project::latest()->take(5)->get() as $project) {
            $activities->push([
                'type' => 'project',
                'icon' => 'fas fa-folder-open',
                'text' => 'Projet créé : ' . $project->title,
                'date' => $project->created_at,
            ]);
        }

        //Posts activities
        foreach (Post::latest()->take(5)->get() as $post) {
            $activities->push([
                'type' => 'post',
                'icon' => 'fas fa-newspaper',
                'text' => 'Article publié : ' . $post->title,
                'date' => $post->created_at,
            ]);
        }


         //Volunteers activities
        foreach (Volunteer::latest()->take(5)->get() as $volunteer) {
            $activities->push([
                'type' => 'volunteer',
                'icon' => 'fas fa-user-friends',
                'text' => 'Nouveau bénévole : ' . $volunteer->name,
                'date' => $volunteer->created_at,
            ]);
        }

        //Donations activities
        foreach (Donation::latest()->take(5)->get() as $donation) {
            $activities->push([
                'type' => 'donation',
                'icon' => 'fas fa-hand-holding-heart',
                'text' => 'Don reçu : ' . number_format($donation->amount, 0, ',', ' ') . ' FCFA',
                'date' => $donation->created_at,
            ]);
        }

        //Messages activities
        foreach (Message::latest()->take(5)->get() as $message) {
            $activities->push([
                'type' => 'message',
                'icon' => 'fas fa-envelope',
                'text' => 'Message reçu de ' . $message->name,
                'date' => $message->created_at,
            ]);
        }

        //Sort by dates
        $activities = $activities ->sortByDesc('date') ->take(10);

         $stats = [
            'projects' => Project::count(),
            'posts' => Post::count(),
            'donations' => Donation::count(),
            'volunteers' => Volunteer::count(),
            'messages' => Message::where('is_read', false)->count(),
            'totalDonations' => Donation::sum('amount'),
            'recentProjects' => Project::latest()->limit(5)->get(),
            'recentDonations' => Donation::latest()->limit(5)->get(),
            'recentMessages' => Message::latest()->limit(5)->get(),
            'activities' => $activities,
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
