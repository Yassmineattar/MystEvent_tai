<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Afficher la liste des événements créés par l'organisateur.
     */
    public function index()
    {
        $events = Event::where('organizerId', Auth::id())->get();
        return view('events.index', compact('events'));
    }

    /**
     * Afficher le formulaire de création d’un événement.
     */
    public function create()
{
    // Si l'utilisateur est un organisateur, afficher la page de création d'événement
    return view('events.create');
}


    /**
     * Sauvegarder un nouvel événement.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'eventDate' => 'required|date',
        ]);

        Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'eventDate' => $request->eventDate,
            'organizerId' => Auth::id(),
        ]);

        return redirect()->route('events.index')->with('success', 'Événement créé avec succès.');
    }

    /**
     * Afficher le formulaire d'édition d’un événement.
     */
    public function edit($id)
    {
        $event = Event::where('id', $id)->where('organizerId', Auth::id())->firstOrFail();
        return view('events.edit', compact('event'));
    }

    /**
     * Mettre à jour un événement existant.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'eventDate' => 'required|date',
        ]);

        $event = Event::where('id', $id)->where('organizerId', Auth::id())->firstOrFail();
        $event->update($request->only('title', 'description', 'eventDate'));

        return redirect()->route('events.index')->with('success', 'Événement mis à jour avec succès.');
    }

    /**
     * Supprimer un événement.
     */
    public function destroy($id)
    {
        $event = Event::where('id', $id)->where('organizerId', Auth::id())->firstOrFail();
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Événement supprimé avec succès.');
    }

    public function show()
    {
        // Récupérer l'événement "Masquerade Ball" de la base de données
        $event = Event::where('title', 'Soirée Masquerade Ball')->first();

        // Vérifier si l'événement est trouvé
        if (!$event) {
            abort(404, 'Événement non trouvé');
        }

        // Passer l'événement à la vue
        return view('welcome', compact('event'));
    }

    public function availableEvents(Request $request)
{
    $search = $request->query('search');

    // Filtrer les événements en fonction de la recherche
    $events = Event::when($search, function ($query, $search) {
        return $query->where('title', 'like', "%{$search}%");
    })->get();

    return view('participants.available-events', compact('events'));
}

public function dashboard()
{
    $user = Auth::user();

    // Compter les événements rejoins par l'utilisateur
    $eventsCount = $user->events()->count(); // Nombre d'événements rejoins
    $ticketsCount = $user->tickets()->count(); // Nombre de tickets gagnés
    $upcomingEventsCount = $user->events()->where('eventDate', '>', now())->count(); // Nombre d'événements à venir
    $recentEvents = $user->events()->latest()->take(5)->get(); // Derniers événements auxquels l'utilisateur a participé

    return view('participants.home', compact('eventsCount', 'ticketsCount', 'upcomingEventsCount', 'recentEvents'));
}


    
}
