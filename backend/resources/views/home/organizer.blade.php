@extends('layouts.app')

@section('title', 'Accueil - Organisateur')

@section('content')
<div class="max-w-4xl mx-auto mt-12 bg-white shadow-lg rounded-lg p-8 text-center">
    <!-- Titre de la page -->
    <h1 class="text-4xl font-bold text-[#5D3F6B] mb-6">👋 Bienvenue, Organisateur !</h1>
    <p class="text-lg text-gray-700 mb-8">Gérez vos événements et créez-en de nouveaux pour offrir des expériences inoubliables.</p>

    <!-- Boutons d'action -->
    <div class="flex justify-center space-x-4">
        <!-- Bouton Voir mes événements -->
        <a href="{{ route('events.index') }}" class="flex items-center bg-[#5D3F6B] text-white px-6 py-3 rounded-lg font-medium shadow-md hover:bg-[#9B4F96] transition duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21V3M17 16l4-4m0 0l-4-4m4 4H9" />
            </svg>
            Voir mes événements
        </a>

        <!-- Bouton Créer un nouvel événement -->
        <a href="{{ route('events.create') }}" class="flex items-center bg-[#C99E9A] text-white px-6 py-3 rounded-lg font-medium shadow-md hover:bg-[#A38E91] transition duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Créer un nouvel événement
        </a>
    </div>
</div>
@endsection
