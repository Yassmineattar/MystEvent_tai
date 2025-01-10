@extends('layouts.app')

@section('title', 'Accueil - Organisateur')

@section('content')
<div class="max-w-4xl mx-auto mt-12 bg-white shadow-lg rounded-lg p-8 text-center">
    <!-- Titre de la page -->
    <h1 class="text-4xl font-bold text-[#5D3F6B] mb-6">Bienvenue organisateur {{ Auth::user()->name }} !</h1>
    <p class="text-lg text-gray-700 mb-8">Gérez vos événements et créez-en de nouveaux pour offrir des expériences inoubliables.</p>

    <!-- Boutons d'action -->
    <div class="flex justify-center space-x-6">
        <!-- Bouton Voir mes événements -->
        <a href="{{ route('events.index') }}" class="flex items-center bg-[#5D3F6B] text-white px-6 py-3 rounded-lg font-medium shadow-lg hover:bg-[#9B4F96] hover:shadow-xl transition duration-300 transform hover:scale-105">
            <!-- Icône Font Awesome pour "Voir mes événements" -->
            <i class="fas fa-calendar-check h-5 w-5 mr-2"></i>
            Voir mes événements
        </a>

        <!-- Bouton Créer un nouvel événement -->
        <a href="{{ route('events.create') }}" class="flex items-center bg-[#C99E9A] text-white px-6 py-3 rounded-lg font-medium shadow-lg hover:bg-[#A38E91] hover:shadow-xl transition duration-300 transform hover:scale-105">
            <!-- Icône Font Awesome pour "Créer un nouvel événement" -->
            <i class="fas fa-plus-circle h-5 w-5 mr-2"></i>
            Créer un nouvel événement
        </a>
    </div>
</div>
@endsection
