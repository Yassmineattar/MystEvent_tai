<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ClueController;
use App\Http\Controllers\QuizzController;
use Illuminate\Support\Facades\Route;

// 🌟 Page d'accueil principale
Route::get('/', function () {
    return view('welcome');
});

// 🚪 Routes publiques
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//test
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');
//test
Route::get('/welcome', [EventController::class, 'show'])->name('welcome');

// 🔐 Routes protégées (requièrent une authentification)
Route::middleware(['auth'])->group(function () {
     Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // 🏠 Page d'accueil personnalisée
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // 🎉 Routes pour les événements (organisateurs)
    Route::get('/events', [EventController::class, 'index'])->name('events.index'); // Liste des événements créés
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create'); // Formulaire de création
    Route::post('/events', [EventController::class, 'store'])->name('events.store'); // Enregistrement d'un événement
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit'); // Formulaire de modification
    Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update'); // Mise à jour
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy'); // Suppression
    Route::get('/events/available', [EventController::class, 'availableEvents'])->name('events.available');
    //quitter evenement
    Route::delete('/event/{event}/leave', [ParticipantController::class, 'leaveEvent'])->name('event.leave');

    // Routes pour les indices
     // Liste des indices d'un événement
     Route::get('/events/{event}/clues', [ClueController::class, 'index'])->name('clues.index');

     // Formulaire d'ajout d'un nouvel indice
     Route::get('/events/{event}/clues/create', [ClueController::class, 'create'])->name('clues.create');
 
     // Enregistrement d'un nouvel indice
     Route::post('/events/{event}/clues', [ClueController::class, 'store'])->name('clues.store');
 
     // Formulaire de modification d'un indice existant
     Route::get('/events/{event}/clues/{clue}/edit', [ClueController::class, 'edit'])->name('clues.edit');
 
     // Mise à jour d'un indice
     Route::put('/events/{event}/clues/{clue}', [ClueController::class, 'update'])->name('clues.update');
 
     // Suppression d'un indice
     Route::delete('/events/{event}/clues/{clue}', [ClueController::class, 'destroy'])->name('clues.destroy');

     Route::get('/events/{event}/participants', [ParticipantController::class, 'showInterestedParticipants'])->name('participants.interested');

    // 🎟️ Routes pour les participants
    Route::get('/available-events', [ParticipantController::class, 'availableEvents'])->name('participants.availableEvents'); // Événements disponibles
    Route::post('/join-event/{event}', [ParticipantController::class, 'joinEvent'])->name('participants.joinEvent'); // Rejoindre un événement
    Route::get('/my-events', [ParticipantController::class, 'myEvents'])->name('participants.myEvents'); // Mes événements
    Route::get('/my-tickets', [ParticipantController::class, 'myTickets'])->name('participants.myTickets'); // Mes tickets
    Route::get('/quizz/{event}', [QuizzController::class, 'start'])->name('quizz.start');
    Route::post('/quizz/{event}', [QuizzController::class, 'submit'])->name('quizz.submit');
    Route::get('/quizz/{event}/success', [QuizzController::class, 'success'])->name('quizz.success');
    Route::get('/quizz/{event}/view-indices', [QuizzController::class, 'viewIndices'])->name('quizz.viewIndices');
    Route::get('/quizz/{event}/fail', [QuizzController::class, 'fail'])->name('quizz.fail');

    // 🎟️ Routes pour les tickets
    Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->name('tickets.show');
    Route::post('/tickets/{event}/generate', [TicketController::class, 'generateTicket'])->name('tickets.generate');
    Route::put('/tickets/{ticket}/status', [TicketController::class, 'updateStatus'])->name('tickets.updateStatus');

    
    // Route pour diriger vers la page fail une fois timer écoulé







});
