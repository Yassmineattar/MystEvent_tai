@extends('layouts.app')

@section('title', 'Accueil - Participant')

@section('content')
    <div class="text-center">
        <h1>Bienvenue, Participant!</h1>
        <p>Vous pouvez rejoindre des événements passionnants et suivre vos tickets gagnés.</p>
        <a href="{{ route('participants.availableEvents') }}" class="btn btn-success">Voir les événements disponibles</a>
        <a href="{{ route('participants.myTickets') }}" class="btn btn-info mt-2">Voir mes tickets</a>
    </div>
@endsection
