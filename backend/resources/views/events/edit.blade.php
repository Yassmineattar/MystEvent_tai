@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-12 bg-white shadow-lg rounded-lg p-8">
    <!-- Titre principal -->
    <h1 class="text-4xl font-bold text-[#5D3F6B] mb-6"> Modifier l'Événement</h1>

    <!-- Formulaire de modification -->
    <form action="{{ route('events.update', $event->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Champ Titre -->
        <div>
            <label for="title" class="block text-lg font-medium text-gray-700 mb-2">Titre</label>
            <input type="text" name="title" id="title" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-[#9B4F96] focus:border-[#9B4F96]" value="{{ $event->title }}" required>
        </div>

        <!-- Champ Description -->
        <div>
            <label for="description" class="block text-lg font-medium text-gray-700 mb-2">Description</label>
            <textarea name="description" id="description" rows="5" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-[#9B4F96] focus:border-[#9B4F96]" required>{{ $event->description }}</textarea>
        </div>

        <!-- Champ Date de l'Événement -->
        <div>
            <label for="eventDate" class="block text-lg font-medium text-gray-700 mb-2">Date de l'Événement</label>
            <input type="datetime-local" name="eventDate" id="eventDate" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-[#9B4F96] focus:border-[#9B4F96]" value="{{ $event->eventDate->format('Y-m-d\TH:i') }}" required>
        </div>

        <!-- Champ Tickets Restants -->
        <div>
            <label for="available_tickets" class="block text-lg font-medium text-gray-700 mb-2">Tickets Restants</label>
            <input type="number" name="available_tickets" id="available_tickets" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-[#9B4F96] focus:border-[#9B4F96]" min="0" value="{{ $event->available_tickets }}" required>
        </div>
        <!-- Champ Image -->
        <div>
            <label for="image" class="block text-lg font-medium text-gray-700 mb-2">Image de l'Événement</label>
            <input type="file" name="image" id="image" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-[#9B4F96] focus:border-[#9B4F96]" accept="image/*">
        </div>
        <!-- Bouton de soumission -->
        <div class="text-right">
            <button type="submit" class="bg-[#5D3F6B] text-white px-6 py-3 rounded-full font-medium shadow-md hover:bg-[#9B4F96] transition duration-300">
                Mettre à jour
            </button>
        </div>
    </form>
</div>
<br>
@endsection
