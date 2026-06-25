<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    { 
        $validated = $request->validate([
        'prenom' => 'required|string|max:255',
        'nom' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'sujet' => 'required|string|max:255',
        'message' => 'required|string|max:5000',
    ]);

    Message::create([
        'name' => $validated['prenom'].' '.$validated['nom'],
        'email' => $validated['email'],
        'subject' => $validated['sujet'],
        'message' => $validated['message'],
        'is_read' => false,
    ]);

    return redirect()
        ->route('contact')
        ->with('success', 'Votre message a été envoyé avec succès !');
    }

    public function index()
    {
        $messages = Message::latest()->paginate(10);

        return view('admin.messages.index', compact('messages'));
    }


    public function show(Message $message)
    {
        $message->update([
            'is_read' => true
        ]);

        return view('admin.messages.show', compact('message'));
    }


    public function markAsRead(Message $message)
    {
        $message->update([
            'is_read' => true
        ]);

        return back();
    }

    public function destroy(Message $message)
    {
        $message->delete();

        return redirect()
            ->route('admin.messages.index')
            ->with('success', 'Message supprimé avec succès.');
    }
    
}