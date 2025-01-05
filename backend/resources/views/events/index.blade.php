@extends('layouts.app')
<? /*Affiche tous les événements créés par l'organisateur.*/ ?>
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
                            <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
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
