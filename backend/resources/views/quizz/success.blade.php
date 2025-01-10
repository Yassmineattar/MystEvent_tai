@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-12 my-5 bg-white shadow-lg rounded-lg p-8 text-center">
    <!-- Titre de la page -->
    <h1 class="text-4xl font-bold text-[#5D3F6B] mb-6">🎉 Félicitations !</h1>
    <p class="text-lg text-gray-700 mb-6">Vous avez terminé le quiz avec succès !</p>

    <!-- Section des indices découverts -->
    <h2 class="text-2xl font-semibold text-[#5D3F6B] mb-4">🔍 Voici les indices que vous avez découverts :</h2>
    <ul class="list-disc list-inside text-gray-700 mb-6">
        @foreach($clues as $clue)
            <li class="bg-[#F1E8E1] text-[#5D3F6B] p-3 rounded-lg shadow-md mb-2">{{ $clue->content }}</li>
        @endforeach
    </ul>

    <!-- Message final -->
    <h3 class="text-lg text-gray-800 mb-6">Votre ticket pour cet événement a été envoyé à votre adresse email.</h3>

    <!-- Bouton de retour -->
    <a href="{{ route('home') }}" class="bg-[#5D3F6B] text-white px-6 py-3 rounded-lg font-medium shadow-md hover:bg-[#9B4F96] transition duration-300">
        Retour à la page d'accueil
    </a>
</div>
@endsection
