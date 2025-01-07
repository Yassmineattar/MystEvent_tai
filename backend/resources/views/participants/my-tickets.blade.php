@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto mt-12 bg-white shadow-lg rounded-lg p-8">
    <!-- Titre de la page -->
    <h1 class="text-4xl font-bold text-[#5D3F6B] mb-8">🎟️ Mes Tickets</h1>

    <!-- Vérification des tickets -->
    @if($tickets->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($tickets as $ticket)
                <!-- Carte de ticket -->
                <div class="bg-white border rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300">
                    <div class="flex items-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-[#5D3F6B] mr-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7-7v14" />
                        </svg>
                        <div>
                            <h2 class="text-xl font-bold text-[#5D3F6B]">Ticket #{{ $ticket->id }}</h2>
                            <p class="text-gray-600">Pour l'événement : "{{ $ticket->event->title }}"</p>
                        </div>
                    </div>
                    <p class="text-gray-500">Date de l'événement : {{ $ticket->event->eventDate->format('d/m/Y H:i') }}</p>
                </div>
            @endforeach
        </div>
    @else
        <!-- Message si aucun ticket -->
        <p class="text-gray-600 text-lg text-center mt-8">Vous n'avez encore gagné aucun ticket.</p>
    @endif
</div>
@endsection
