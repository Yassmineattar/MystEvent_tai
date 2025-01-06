@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Participants intéressés par l'événement : {{ $event->title }}</h1>

    <!-- Utilisateurs en attente -->
    <h4>Utilisateurs en attente</h4>
    <ul>
        @forelse($interestedUsers as $user)
            <li>{{ $user->name }}</li>
        @empty
            <li>Aucun utilisateur en attente.</li>
        @endforelse
    </ul>

    <!-- Utilisateurs acceptés -->
    <h4>Utilisateurs acceptés</h4>
    <ul>
        @forelse($acceptedUsers as $user)
            <li>{{ $user->name }}</li>
        @empty
            <li>Aucun utilisateur accepté.</li>
        @endforelse
    </ul>

    <a href="{{ route('events.index') }}" class="btn btn-primary mt-3">Retour aux événements</a>
</div>
@endsection
