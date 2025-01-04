<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Afficher la liste des événements.
     */
    public function index()
    {
        $events = Event::with('organizer')->get();
        return view('events.index', compact('events'));
    }

    /**
     * Créer un événement.
     */
    public function createEvent(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
        ]);

        $event = Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'organizer_id' => auth()->id(),
        ]);

        return redirect()->route('home')->with('success', 'Événement créé avec succès');
    }

    /**
     * Ajouter un indice à un événement.
     */
    public function addClue(Request $request, Event $event)
    {
        $request->validate([
            'clue' => 'required|string',
        ]);

        $event->clues()->create([
            'content' => $request->clue,
        ]);

        return redirect()->route('home')->with('success', 'Indice ajouté avec succès');
    }

    /**
     * Afficher les utilisateurs intéressés et ayant gagné.
     */
    public function showInterestedUsers(Event $event)
    {
        $interestedUsers = $event->users()->wherePivot('status', 'pending')->get();
        $acceptedUsers = $event->users()->wherePivot('status', 'accepted')->get();

        return view('events.show_users', compact('interestedUsers', 'acceptedUsers'));
    }
}
