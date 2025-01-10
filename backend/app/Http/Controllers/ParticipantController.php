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
    })
    ->orderBy('eventDate', 'asc') // Tri décroissant sur eventDate
    ->get();

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
        //petite modification ici 
        $eventsCount = $events->count(); // Compter les événements

        // Enregistrer le nombre d'événements dans la session
        session(['eventsCount' => $eventsCount]);

        return view('participants.my-events', compact('events', 'eventsCount'));
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

    public function showDashboard()
{
    $user = auth()->user();

    // Récupérer tous les événements rejoints par l'utilisateur
    $events = $user->participations;  // Cela récupère tous les événements rejoints

    // Si la relation participations retourne null ou une collection vide, initialise à un tableau vide
    $eventsCount = $events ? $events->count() : 0;

    // Passer les données à la vue
    return view('home.participator', compact('eventsCount', 'events'));
}

public function leaveEvent($eventId)
{
    $user = auth()->user();

    // Supprimer l'utilisateur de l'événement
    $user->participations()->detach($eventId);

    // Rediriger l'utilisateur avec un message de succès
    return redirect()->route('participants.myEvents')->with('success', 'Vous avez quitté l\'événement avec succès.');
}




    


    

    
}
