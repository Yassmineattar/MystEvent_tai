@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto mt-12 bg-white shadow-lg rounded-lg p-8 text-center">
    <!-- Titre principal -->
    <h1 class="text-4xl font-bold text-[#5D3F6B] mb-6">🔍 Indices pour l'événement : {{ $event->title }}</h1>

    <!-- Liste des indices -->
    @if($clues->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($clues as $clue)
                <div class="bg-[#F1E8E1] text-[#5D3F6B] p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                    <h2 class="text-xl font-semibold mb-2">Indice</h2>
                    <p>{{ $clue->content }}</p>
                </div>
            @endforeach
        </div>
    @else
        <!-- Message si aucun indice trouvé -->
        <p class="text-lg text-gray-600 mt-6">Aucun indice trouvé pour cet événement.</p>
    @endif

    <!-- Bouton de retour -->
    <a href="{{ route('participants.myEvents') }}" class="bg-gray-600 text-white px-6 py-3 rounded-lg font-medium shadow-md hover:bg-gray-700 transition duration-300 mt-8">
        Retour à mes événements
    </a>
</div>
@endsection
