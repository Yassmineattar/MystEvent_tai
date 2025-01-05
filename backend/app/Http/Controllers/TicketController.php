<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Générer un ticket pour un utilisateur.
     */
    public function generateTicket($eventId)
    {
        $ticket = Ticket::create([
            'event_id' => $eventId,
            'user_id' => auth()->id(),
            'email' => auth()->user()->email,
            'code' => strtoupper(str_random(10)),
            'status' => 'valid',
        ]);

        return redirect()->route('participants.tickets')->with('success', 'Ticket généré avec succès.');
    }

    /**
     * Afficher tous les tickets d'un utilisateur.
     */
    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('tickets.show', compact('ticket'));
    }

    /**
     * Mettre à jour le statut d'un ticket.
     */
    public function updateStatus($id, Request $request)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->status = $request->status;
        $ticket->save();

        return redirect()->route('participants.tickets')->with('success', 'Statut du ticket mis à jour.');
    }
}
