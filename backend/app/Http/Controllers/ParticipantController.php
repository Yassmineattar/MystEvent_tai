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
        $events = Auth::user()->participations;
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
    // Afficher les utilisateurs intéressés par un événement
    public function showInterestedParticipants(Event $event)
    {
        // Utilisateurs en attente
        $interestedUsers = $event->participants()->wherePivot('status', 'pending')->get();

        // Utilisateurs acceptés
        $acceptedUsers = $event->participants()->wherePivot('status', 'accepted')->get();

        return view('participants.interested', compact('event', 'interestedUsers', 'acceptedUsers'));
    }
    public function home()
    {
        // Charger les événements depuis la base de données triés par date
        $events = Event::orderBy('eventDate', 'asc')->get();
    
        // Passer les événements à la vue
        return view('home.participator', ['events' => $events]);
    }
    
}
