<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

use App\Http\Controllers\EventController;

Route::middleware('auth')->group(function () {
    // Création d'un événement
    Route::post('/events/create', [EventController::class, 'createEvent'])->name('events.create');

    // Ajouter un indice à un événement
    Route::post('/events/{event}/addClue', [EventController::class, 'addClue'])->name('events.addClue');

    // Afficher les utilisateurs intéressés
    Route::get('/events/{event}/users', [EventController::class, 'showInterestedUsers'])->name('events.showUsers');
    
    // Page d'accueil avec la liste des événements
    Route::get('/', [EventController::class, 'index'])->name('home');
});
