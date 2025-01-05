@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 text-center">
            <h1>Bienvenue sur MystEvent!</h1>
            <p>Votre plateforme pour rejoindre et organiser des événements surprises.</p>

            @auth
                @if(Auth::user()->user_type === 'organizer')
                    <!-- Section pour les organisateurs -->
                    <div class="mt-4">
                        <h3>Bienvenue, Organisateur!</h3>
                        <p>Vous pouvez gérer vos événements et en créer de nouveaux.</p>
                        <a href="{{ route('organizer.events') }}" class="btn btn-primary">Voir mes événements</a>
                        <a href="{{ route('events.create') }}" class="btn btn-success mt-2">Créer un nouvel événement</a>
                    </div>
                @elseif(Auth::user()->user_type === 'participator')
                    <!-- Section pour les participants -->
                    <div class="mt-4">
                        <h3>Bienvenue, Participant!</h3>
                        <p>Vous pouvez rejoindre des événements passionnants et suivre vos tickets gagnés.</p>
                        <a href="{{ route('available.events') }}" class="btn btn-success">Voir les événements disponibles</a>
                        <a href="{{ route('my.tickets') }}" class="btn btn-info mt-2">Voir mes tickets</a>
                    </div>
                @endif
            @else
                <!-- Section pour les invités (non connectés) -->
                <div class="mt-4">
                    <h3>Pas encore inscrit ?</h3>
                    <p>Inscrivez-vous dès maintenant pour profiter de MystEvent.</p>
                    <a href="{{ route('register') }}" class="btn btn-outline-primary">Inscrivez-vous</a>
                    <a href="{{ route('login') }}" class="btn btn-outline-secondary mt-2">Ou connectez-vous</a>
                </div>
            @endauth
        </div>
    </div>
@endsection
