@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Mes Événements</h1>
    <a href="{{ route('events.create') }}" class="btn btn-primary mb-3">Créer un nouvel événement</a>

    @if($events->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Date de l'événement</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>{{ $event->title }}</td>
                        <td>{{ $event->eventDate->format('d/m/Y H:i') }}</td>
                        <td>
                            <!-- Bouton Modifier -->
                            <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning btn-sm">Modifier</a>

                            <!-- Bouton Supprimer -->
                            <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>

                            <!-- Bouton Voir les indices -->
                            <a href="{{ route('clues.index', $event->id) }}" class="btn btn-info btn-sm">Voir les indices</a>

                            <!-- Bouton Voir les participants intéressés -->
                            <a href="{{ route('participants.interested', $event->id) }}" class="btn btn-secondary btn-sm">Voir les participants</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Aucun événement trouvé.</p>
    @endif
</div>
@endsection
