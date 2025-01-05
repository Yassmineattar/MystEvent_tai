@extends('layouts.app')

@section('title', 'Accueil - Organisateur')

@section('content')
    <div class="text-center">
        <h1>Bienvenue, Organisateur!</h1>
        <p>Vous pouvez gérer vos événements et en créer de nouveaux.</p>
        <a href="{{ route('events.index') }}" class="btn btn-primary">Voir mes événements</a>
        <a href="{{ route('events.create') }}" class="btn btn-success mt-2">Créer un nouvel événement</a>
    </div>
@endsection
