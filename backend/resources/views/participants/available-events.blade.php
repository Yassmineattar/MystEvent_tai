@extends('layouts.app')

@section('title', 'Événements disponibles')

@section('content')
<div class="max-w-6xl mx-auto mt-12 bg-white shadow-xl rounded-lg p-8">
    <!-- Titre de la page -->
    <h1 class="text-4xl font-extrabold text-[#5D3F6B] mb-8">Événements Disponibles</h1>

    <!-- Formulaire de recherche -->
    <form method="GET" action="{{ route('events.available') }}" class="mb-8">
        <div class="flex items-center bg-gray-100 rounded-full p-3">
            <input type="text" name="search" placeholder="Rechercher un événement..." class="p-3 w-full rounded-full bg-transparent text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#5D3F6B]" value="{{ request()->query('search') }}">
            <button type="submit" class="ml-4 bg-[#5D3F6B] text-white px-6 py-3 rounded-full font-semibold shadow-md hover:bg-[#9B4F96] transition duration-300">
                Rechercher
            </button>
        </div>
    </form>

    <!-- Vérification des événements -->
    @if($events->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($events as $event)
                <div class="bg-white p-6 rounded-2xl shadow-xl transform transition duration-300 hover:scale-105 hover:shadow-2xl hover:translate-y-1 cursor-pointer">
                    <!-- Image de l'événement -->
                    @if($event->image)
                        <img src="{{ asset('storage/'.$event->image) }}" alt="{{ $event->title }}" class="w-full h-48 object-cover rounded-lg mb-6 ">
                    @else
                        <div class="w-full h-48 bg-gray-300 rounded-lg mb-6"></div> <!-- Placeholder -->
                    @endif

                    <!-- Titre de l'événement -->
                    <h2 class="text-2xl font-extrabold text-[#5D3F6B] mb-4">{{ $event->title }}</h2>

                    <!-- Date de l'événement avec style amélioré -->
                    <div class="flex items-center space-x-2 mb-4">
                        <span class="text-[#9B4F96] font-semibold text-lg">{{ $event->eventDate->format('d/m/Y') }}</span>
                        <span class="text-gray-500 text-sm">{{ $event->eventDate->format('H:i') }}</span>
                    </div>

                    <!-- Description de l'événement -->
                    <p class="text-gray-800 mb-4">{{ Str::limit($event->description, 150) }}</p>

                    <!-- Affichage des tickets restants -->
                    <p class="text-center font-semibold mb-4">
                        @if($event->available_tickets == 0)
                            <span class="text-red-500">Sold Out</span>
                        @else
                            <span class="text-green-500">En cours</span>
                        @endif
                    </p>

                    <!-- Action de rejoindre l'événement -->
                    <div class="text-center">
                        @if($event->available_tickets == 0)
                            <button disabled class="bg-gray-400 text-white px-6 py-2 rounded-full font-medium cursor-not-allowed transition duration-300 transform hover:scale-105">
                                Événement complet
                            </button>
                        @else
                            <form action="{{ route('participants.joinEvent', $event->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-[#5D3F6B] text-white px-6 py-2 rounded-full font-medium shadow-md hover:bg-[#9B4F96] transition duration-300 transform hover:scale-105">
                                    Rejoindre
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <!-- Message si aucun événement disponible -->
        <p class="text-gray-600 text-lg text-center mt-8">Aucun événement disponible pour le moment.</p>
    @endif
</div>
<br>
@endsection
