<?php

namespace App\Http\Controllers;

use App\Models\Clue;
use App\Models\Event;
use Illuminate\Http\Request;

class ClueController extends Controller
{
    // Afficher la liste des indices d'un événement
    public function index(Event $event)
    {
        $clues = $event->clues;
        return view('clues.index', compact('event', 'clues'));
    }

    // Afficher le formulaire d'ajout d'un nouvel indice
    public function create(Event $event)
    {
        return view('clues.create', compact('event'));
    }

    // Ajouter un nouvel indice
    public function store(Request $request, Event $event)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $event->clues()->create([
            'content' => $request->content,
        ]);

        return redirect()->route('clues.index', $event)->with('success', 'Indice ajouté avec succès.');
    }

    // Afficher le formulaire de modification d'un indice
    public function edit(Event $event, Clue $clue)
    {
        return view('clues.edit', compact('event', 'clue'));
    }

    // Mettre à jour un indice existant
    public function update(Request $request, Event $event, Clue $clue)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $clue->update([
            'content' => $request->content,
        ]);

        return redirect()->route('clues.index', $event)->with('success', 'Indice modifié avec succès.');
    }

    // Supprimer un indice
    public function destroy(Event $event, Clue $clue)
    {
        $clue->delete();

        return redirect()->route('clues.index', $event)->with('success', 'Indice supprimé avec succès.');
    }
}
