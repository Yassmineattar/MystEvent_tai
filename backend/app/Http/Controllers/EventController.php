<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            'available_tickets' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation pour l'image
        ]);
    
        $event = new Event();
        $event->title = $request->title;
        $event->description = $request->description;
        $event->eventDate = $request->eventDate;
        $event->available_tickets = $request->available_tickets;
    
        // Assigner l'ID de l'organisateur (utilisateur actuellement connecté)
        $event->organizerId = Auth::id();  // L'ID de l'utilisateur connecté
    
        // Traitement de l'image si elle est téléchargée
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('events', 'public'); // Stocker l'image dans le dossier public
            $event->image = $imagePath;  // Enregistrer le chemin de l'image
        }
    
        $event->save();
    
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
            'available_tickets' => 'required|integer|min:1',
        ]);

        $event = Event::where('id', $id)->where('organizerId', Auth::id())->firstOrFail();
        $event->update($request->only('title', 'description', 'eventDate', 'available_tickets'));

        // Traitement de l'image si elle est téléchargée
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($event->image) {
                \Storage::delete('public/' . $event->image);
            }

            // Télécharger la nouvelle image
            $imagePath = $request->file('image')->store('events', 'public');
            $event->image = $imagePath;  // Mettre à jour le chemin de l'image
        }

        $event->save();

        return redirect()->route('events.index')->with('success', 'Événement mis à jour avec succès.');
    }

    /**
     * Supprimer un événement.
     */
    public function destroy($id)
    {
        $event = Event::where('id', $id)->where('organizerId', Auth::id())->firstOrFail();

        // Supprimer l'image de l'événement si elle existe
        if ($event->image) {
            \Storage::delete('public/' . $event->image);
        }

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
