@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-12 bg-white shadow-lg rounded-lg p-8 text-center">
    <!-- Icône illustrant l'échec -->
    <div class="bg-red-100 text-red-600 rounded-full w-24 h-24 mx-auto mb-6 flex items-center justify-center shadow-md">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </div>    
    <!-- Titre principal -->
    <h1 class="text-4xl font-bold text-red-600 mb-6"> Quizz Échoué</h1>
    <p class="text-lg text-gray-700 mb-8">Vous avez donné une réponse incorrecte. Vous avez échoué au quiz, réessayez encore!</p>



    <!-- Bouton de retour -->
    <a href="{{ route('participants.myEvents') }}" class="bg-red-600 text-white px-6 py-3 rounded-lg font-medium shadow-md hover:bg-red-700 transition duration-300">
        Retour à mes événements
    </a>
</div>
@endsection
