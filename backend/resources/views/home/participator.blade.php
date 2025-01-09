@extends('layouts.app')

@php
use Illuminate\Support\Facades\Auth;
@endphp

@section('title', 'Tableau de bord - Participant')

@section('content')
<div class="max-w-4xl mx-auto mt-12 bg-white shadow-xl my-6  rounded-xl p-10 ">
    <!-- Titre de bienvenue -->
    <h1 class="text-5xl font-bold text-[#5D3F6B] mb-6 text-shadow-md">Bienvenue, {{ Auth::user()->name }} ! 🎉</h1>
    <p class="text-gray-600 text-lg mb-8">
    </p>

    <!-- Statistiques récapitulatives -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-8 mb-8">
        <div class="bg-[#F1E8E1] p-8 rounded-2xl shadow-xl hover:bg-[#E4D6C9] transition-colors duration-300 text-center">
            <h2 class="text-xl font-bold text-[#5D3F6B] uppercase tracking-wider">Événements Rejoints</h2>
            <p class="text-3xl font-semibold text-[#3E1F47]">
            {{ session('eventsCount', 0) }} 
            </p>

        </div>
        <div class="bg-[#F1E8E1] p-8 rounded-2xl shadow-xl hover:bg-[#E4D6C9] transition-colors duration-300 text-center">
            <h2 class="text-xl font-bold text-[#5D3F6B] uppercase tracking-wider">Tickets Gagnés</h2>
            <p class="text-3xl font-semibold text-[#3E1F47]">{{ $ticketsCount }}</p>
        </div>
    </div>

    <!-- Boutons d'action -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
        <a href="{{ route('participants.availableEvents') }}" class="flex items-center justify-center bg-[#5D3F6B] text-white px-8 py-5 rounded-xl font-medium shadow-lg hover:bg-[#9B4F96] transition duration-300 transform hover:scale-105">
            Voir les événements disponibles
        </a>

        <a href="{{ route('participants.myTickets') }}" class="flex items-center justify-center bg-[#C99E9A] text-white px-8 py-5 rounded-xl font-medium shadow-lg hover:bg-[#A38E91] transition duration-300 transform hover:scale-105">
            Voir mes tickets
        </a>
        <a href="{{ route('participants.myEvents') }}" class="flex items-center justify-center bg-[#5D3F6B] text-white px-8 py-5 rounded-xl font-medium shadow-lg hover:bg-[#9B4F96] transition duration-300 transform hover:scale-105">
            Voir les événements rejoints
        </a>
    </div>

    <!-- Section Call-to-Action -->
    <div class="mt-10 text-sm text-gray-500">
        Besoin d'aide ? Consultez la <a href="#" class="text-[#5D3F6B] font-medium hover:underline">FAQ</a> ou contactez-nous.
    </div>
</div>
@endsection
