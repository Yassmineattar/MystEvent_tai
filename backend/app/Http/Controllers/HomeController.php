<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user(); // Récupère l'utilisateur connecté

            if ($user->user_type === 'organizer') {
                return view('home.organizer');
            } elseif ($user->user_type === 'participator') {
                // Récupère les données spécifiques au participant
                $eventsCount = $user->events()->count(); // Nombre d'événements auxquels l'utilisateur a participé
                $ticketsCount = $user->tickets()->count(); // Nombre de tickets gagnés
                $upcomingEventsCount = $user->events()->where('eventDate', '>', now())->count(); // Nombre d'événements à venir
                $recentEvents = $user->events()->latest()->take(5)->get(); // Derniers événements auxquels l'utilisateur a participé

                return view('home.participator', compact('eventsCount', 'ticketsCount', 'upcomingEventsCount', 'recentEvents'));
            }
        }

        return view('home.guest');
    }
}
