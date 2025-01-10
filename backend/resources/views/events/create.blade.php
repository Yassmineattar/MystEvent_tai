@extends('layouts.app')

@section('title', 'Créer un nouvel événement')

@section('content')
<div class="max-w-4xl mx-auto mt-12 bg-white shadow-lg rounded-lg p-8">
    <!-- Titre de la page -->
    <h1 class="text-4xl font-bold text-[#5D3F6B] mb-6"> Créer un Événement</h1>

    <!-- Formulaire de création d'événement -->
    <form action="{{ route('events.store') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Champ Titre -->
        <div>
            <label for="title" class="block text-lg font-medium text-gray-700 mb-2">Titre</label>
            <input type="text" name="title" id="title" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-[#9B4F96] focus:border-[#9B4F96]" required>
        </div>

        <!-- Champ Description -->
        <div>
            <label for="description" class="block text-lg font-medium text-gray-700 mb-2">Description</label>
            <textarea name="description" id="description" rows="5" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-[#9B4F96] focus:border-[#9B4F96]" required></textarea>
        </div>

        <!-- Champ Date de l'Événement -->
        <div>
            <label for="eventDate" class="block text-lg font-medium text-gray-700 mb-2">Date de l'Événement</label>
            <input type="datetime-local" name="eventDate" id="eventDate" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-[#9B4F96] focus:border-[#9B4F96]" required>
        </div>

        <!-- Bouton de soumission -->
        <button type="submit" class="bg-gradient-to-r from-[#5D3F6B] to-[#9B4F96] text-white px-6 py-3 rounded-lg font-semibold shadow-lg hover:shadow-xl hover:opacity-90 transition duration-300 transform hover:scale-105">
            Créer l'Événement
        </button>
    </form>
    <div class="text-right mt-12">
        <a href="{{ route('events.index') }}" class="bg-[#5D3F6B] text-white px-6 py-3 rounded-md font-medium shadow-md hover:bg-[#9B4F96] transition duration-300">
            <i class="fas fa-arrow-left mr-2"></i> Retour aux événements
        </a>
    </div>

</div>
@endsection
