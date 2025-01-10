@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto mt-12 bg-white shadow-lg rounded-lg p-8">
    <!-- Titre de la page -->
    <h1 class="text-4xl font-bold text-[#5D3F6B] mb-8">Mes Événements rejoints</h1>

    <!-- Vérification des événements -->
    @if($events->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($events as $event)
                <!-- Carte d'événement -->
                <div class="bg-white border rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300">
                    <!-- Affichage de l'image de l'événement -->
                    @if($event->image)
                        <img src="{{ asset('storage/'.$event->image) }}" alt="{{ $event->title }}" class="w-full h-48 object-cover rounded-lg mb-4 ">
                    @else
                        <div class="w-full h-48 bg-gray-300 rounded-lg mb-4"></div> <!-- Placeholder si aucune image -->
                    @endif

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
                            <!-- Icône Font Awesome -->
                            <i class="fas fa-search mr-2"></i>
                            Voir les indices
                        </a>

                    @else
                        <!-- Sinon -->
                        <a href="{{ route('quizz.start', $event->id) }}" class="flex items-center justify-center bg-[#c8a5a3] text-white px-4 py-2 rounded-lg font-medium shadow-md hover:bg-[#A38E91] transition duration-300">
                            <!-- Icône Font Awesome -->
                            <i class="fas fa-play mr-2"></i>
                            Passer un Quizz
                        </a>

                        <!-- Bouton pour quitter l'événement -->
                        <form action="{{ route('event.leave', $event->id) }}" method="POST" class="mt-4">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="flex items-center justify-center bg-[#3E1F47] text-white px-4 py-2 rounded-lg font-medium shadow-md hover:bg-[#5D3F6B] transition duration-300 w-full">
                                <!-- Icône Font Awesome -->
                                <i class="fas fa-sign-out-alt mr-2"></i>
                                Quitter l'événement
                            </button>
                        </form>
                    @endif
                </div>
            @endforeach
        </div>
    @else
        <!-- Message si aucun événement -->
        <p class="text-gray-600 text-lg text-center mt-8">Vous n'avez rejoint aucun événement pour l'instant.</p>
    @endif
</div>

<!-- Lien pour revenir au profil -->
<div class="mt-8 text-center my-5">
    <a href="{{ route('home') }}" class="flex items-center justify-center bg-gradient-to-r from-[#5D3F6B] to-[#9B4F96] text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transition duration-300 transform hover:scale-105 hover:bg-[#C99E9A] max-w-max mx-auto">
        <!-- Icône Font Awesome -->
        <i class="fas fa-arrow-left mr-3"></i>
        <span class="text-lg">Revenir au profil</span>
    </a>
</div>

@endsection
