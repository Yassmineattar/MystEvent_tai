<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

// 🚪 Routes publiques
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 🔐 Routes protégées (requièrent une authentification)
Route::middleware(['auth'])->group(function () {
    
    // 🏠 Page d'accueil
    Route::get('/', [EventController::class, 'index'])->name('home');

    // 🎉 Routes pour les événements (organisateurs)
    Route::get('/events', [EventController::class, 'index'])->name('events.index'); // Liste des événements créés
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create'); // Formulaire de création
    Route::post('/events', [EventController::class, 'store'])->name('events.store'); // Enregistrement d'un événement
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit'); // Formulaire de modification
    Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update'); // Mise à jour
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy'); // Suppression

    // 🎟️ Routes pour les participants
    Route::get('/available-events', [ParticipantController::class, 'availableEvents'])->name('participants.availableEvents'); // Événements disponibles
    Route::post('/join-event/{event}', [ParticipantController::class, 'joinEvent'])->name('participants.joinEvent'); // Rejoindre un événement
    Route::get('/my-events', [ParticipantController::class, 'myEvents'])->name('participants.myEvents'); // Mes événements
    Route::get('/my-tickets', [ParticipantController::class, 'myTickets'])->name('participants.myTickets'); // Mes tickets

    // 🎟️ Routes pour les tickets
    Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->name('tickets.show'); // Afficher un ticket
    Route::post('/tickets/{event}/generate', [TicketController::class, 'generateTicket'])->name('tickets.generate'); // Générer un ticket
    Route::put('/tickets/{ticket}/status', [TicketController::class, 'updateStatus'])->name('tickets.updateStatus'); // Mise à jour du statut d'un ticket
});
