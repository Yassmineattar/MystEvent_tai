<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParticipantController extends Controller
{
    /**
     * Afficher tous les événements disponibles pour rejoindre.
     */
    public function availableEvents()
    {
        $events = Event::whereDoesntHave('participants', function ($query) {
            $query->where('user_id', Auth::id());
        })->get();

        return view('participants.available-events', compact('events'));
    }

    /**
     * Rejoindre un événement.
     */
    public function joinEvent($eventId)
    {
        $event = Event::findOrFail($eventId);

        // Ajouter l'utilisateur comme participant
        $event->participants()->attach(Auth::id());

        return redirect()->route('participants.myEvents')->with('success', 'Vous avez rejoint l’événement avec succès.');
    }

    /**
     * Afficher les événements auxquels le participant a voulu rejoindre.
     */
    public function myEvents()
    {
        $events = Auth::user()->events;
        return view('participants.my-events', compact('events'));
    }

    /**
     * Afficher les tickets gagnés par le participant.
     */
    public function myTickets()
    {
        $tickets = Ticket::where('user_id', Auth::id())->get();
        return view('participants.my-tickets', compact('tickets'));
    }
}
