@extends('layouts.app')

@section('title', 'Créer un Indice')

@section('content')
<div class="max-w-4xl mx-auto mt-12 bg-white shadow-lg rounded-lg p-10">
    <!-- Titre principal -->
    <div class="text-center mb-8">
        <h1 class="text-4xl font-extrabold text-[#5D3F6B]"> Créer un Indice</h1>
        <h2 class="text-2xl font-semibold text-gray-600 mt-2">Pour l'Événement : <span class="text-[#9B4F96]">{{ $event->title }}</span></h2>
    </div>

    <!-- Formulaire de création d'indice -->
    <form action="{{ route('clues.store', $event->id) }}" method="POST" class="space-y-6">
        @csrf

        <div class="relative">
            <label for="content" class="text-lg font-medium text-[#5D3F6B]">Contenu de l'indice</label>
            <input type="text" name="content" id="content" class="w-full bg-gray-100 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-[#9B4F96] focus:border-[#9B4F96] p-4 mt-2" placeholder="Saisissez le contenu de l'indice..." required>
        </div>

        <!-- Bouton de soumission -->
        <div class="text-center mt-6">
            <button type="submit" class="bg-gradient-to-r from-[#5D3F6B] to-[#9B4F96] text-white px-8 py-3 rounded-full font-medium shadow-md hover:shadow-xl transition duration-300">
                 Créer l'Indice
            </button>
        </div>
    </form>

    <!-- Bouton de retour -->
    <div class="text-center mt-8">
        <a href="{{ route('clues.index', $event->id) }}" class="bg-[#F1E8E1] text-[#5D3F6B] px-6 py-3 rounded-full font-medium shadow-md hover:bg-[#E0D2D2] transition duration-300">
             Retour à la liste des indices
        </a>
    </div>
</div>
@endsection
