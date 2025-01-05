@extends('layouts.app')

@section('title', 'Accueil - Invité')

@section('content')
    <div class="text-center">
        <h1>Bienvenue sur MystEvent!</h1>
        <p>Votre plateforme pour rejoindre et organiser des événements surprises.</p>
        <a href="{{ route('register') }}" class="btn btn-outline-primary">Inscrivez-vous</a>
        <a href="{{ route('login') }}" class="btn btn-outline-secondary mt-2">Ou connectez-vous</a>
    </div>
@endsection
