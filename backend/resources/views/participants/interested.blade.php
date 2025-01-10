@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto mt-12 bg-white shadow-lg rounded-lg p-10">
    <!-- Titre principal -->
    <div class="text-center mb-12">
        <h1 class="text-5xl font-extrabold text-[#5D3F6B]">Participants intéressés</h1>
        <h2 class="text-2xl font-semibold text-gray-600 mt-2">Événement : <span class="text-[#9B4F96]">{{ $event->title }}</span></h2>
    </div>

    <!-- Utilisateurs en attente -->
    <section class="mb-12">
        <h4 class="text-2xl font-semibold text-[#F59E0B] mb-6 flex items-center">
            <i class="fas fa-hourglass-half mr-2"></i> Utilisateurs en attente
            <span class="ml-2 bg-yellow-100 text-yellow-800 text-sm font-bold px-3 py-1 rounded-full">{{ $interestedUsers->count() }}</span>
        </h4>

        @if($interestedUsers->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($interestedUsers as $user)
                    <div class="bg-white border border-[#F59E0B] rounded-lg shadow-sm p-6 hover:shadow-md transition duration-300">
                        <div class="flex items-center space-x-4">
                            <div class="bg-yellow-500 text-white rounded-full h-12 w-12 flex items-center justify-center text-lg font-bold">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-[#5D3F6B]">{{ $user->name }}</h3>
                                <p class="text-sm text-gray-600">En attente</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-600 text-lg">Aucun utilisateur en attente.</p>
        @endif
    </section>

    <!-- Utilisateurs acceptés -->
    <section>
        <h4 class="text-2xl font-semibold text-[#10B981] mb-6 flex items-center">
            <i class="fas fa-check-circle mr-2"></i> Utilisateurs acceptés
            <span class="ml-2 bg-green-100 text-green-800 text-sm font-bold px-3 py-1 rounded-full">{{ $acceptedUsers->count() }}</span>
        </h4>

        @if($acceptedUsers->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($acceptedUsers as $user)
                    <div class="bg-white border border-[#10B981] rounded-lg shadow-sm p-6 hover:shadow-md transition duration-300">
                        <div class="flex items-center space-x-4">
                            <div class="bg-green-500 text-white rounded-full h-12 w-12 flex items-center justify-center text-lg font-bold">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-[#5D3F6B]">{{ $user->name }}</h3>
                                <p class="text-sm text-gray-600">Accepté</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-600 text-lg">Aucun utilisateur accepté.</p>
        @endif
    </section>

    <!-- Bouton de retour -->
    <div class="text-right mt-12">
        <a href="{{ route('events.index') }}" class="inline-flex items-center bg-gradient-to-r from-[#5D3F6B] to-[#9B4F96] text-white px-6 py-3 rounded-full font-medium shadow-md hover:shadow-xl transition duration-300">
            Retour aux événements
        </a>
    </div>
</div>
@endsection
