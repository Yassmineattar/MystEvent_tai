@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto mt-12 bg-white shadow-lg rounded-lg p-8">
    <!-- Titre de la page -->
    <h1 class="text-4xl font-bold text-[#5D3F6B] mb-8">Mes Événements 🎉</h1>

    <!-- Vérification des événements -->
    @if($events->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($events as $event)
                <!-- Carte d'événement -->
                <div class="bg-white border rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300">
                    <h2 class="text-xl font-bold text-[#5D3F6B] mb-2">{{ $event->title }}</h2>
                    <p class="text-gray-600 mb-4">Date : {{ $event->eventDate->format('d/m/Y H:i') }}</p>

                    <!-- Vérification du statut de l'utilisateur pour cet événement -->
                    @php
                        $status = DB::table('event_user')
                                    ->where('event_id', $event->id)
                                    ->where('user_id', auth()->id())
                                    ->value('status');
                    @endphp

                    @if($status === 'accepted')
                        <!-- Si accepté -->
                        <span class="inline-block bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-medium mb-4">Accepted</span>
                        <a href="{{ route('quizz.viewIndices', $event->id) }}" class="flex items-center justify-center bg-[#5D3F6B] text-white px-4 py-2 rounded-lg font-medium shadow-md hover:bg-[#9B4F96] transition duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                            Voir les indices
                        </a>
                    @else
                        <!-- Sinon -->
                        <a href="{{ route('quizz.start', $event->id) }}" class="flex items-center justify-center bg-[#c8a5a3] text-white px-4 py-2 rounded-lg font-medium shadow-md hover:bg-[#A38E91] transition duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Passer un Quizz
                        </a>
                    @endif
                </div>
            @endforeach
        </div>
    @else
        <!-- Message si aucun événement -->
        <p class="text-gray-600 text-lg text-center mt-8">Vous n'avez rejoint aucun événement pour l'instant.</p>
    @endif
</div>
@endsection
