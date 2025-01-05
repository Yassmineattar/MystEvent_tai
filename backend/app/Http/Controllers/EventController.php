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
    // Vérification du rôle
    if (auth()->user()->role !== 'organizer') {
        // Redirection ou erreur si l'utilisateur n'est pas un organisateur
        return redirect()->route('home')->with('error', 'Vous n\'avez pas les autorisations nécessaires.');
    }

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
}
