@extends('layouts.app')

@section('title', 'Accueil - Participant')

@section('content')
<div class="max-w-4xl mx-auto mt-12 bg-white shadow-lg rounded-lg p-8 text-center">
    <!-- Titre de bienvenue -->
    <h1 class="text-4xl font-bold text-[#5D3F6B] mb-6">Bienvenue, Participant ! 🎉</h1>
    <p class="text-gray-600 text-lg mb-8">
        Rejoignez des événements passionnants, débloquez des indices et suivez vos tickets gagnés.
    </p>

    <!-- Boutons d'action -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <!-- Bouton Voir les événements disponibles -->
        <a href="{{ route('participants.availableEvents') }}" class="flex items-center justify-center bg-[#5D3F6B] text-white px-6 py-4 rounded-lg font-medium shadow-md hover:bg-[#9B4F96] transition duration-200">
            
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M9 16h6m-3-9V4m0 4v4" />
            
            Voir les événements disponibles
        </a>

        <!-- Bouton Voir mes tickets -->
        <a href="{{ route('participants.myTickets') }}" class="flex items-center justify-center bg-[#C99E9A] text-white px-6 py-4 rounded-lg font-medium shadow-md hover:bg-[#A38E91] transition duration-200">
        
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17a4 4 0 00-8 0M15 12h4m-2-2v4m4 0v4m-4-4h4" />
            
            Voir mes tickets
        </a>
    </div>

    <!-- Section Call-to-Action -->
    <div class="mt-8 text-sm text-gray-500">
        Besoin d'aide ? Consultez la <a href="#" class="text-[#5D3F6B] font-medium hover:underline">FAQ</a> ou contactez-nous.
    </div>
</div>
@endsection
