@extends('layouts.app')

@section('title', 'Événements disponibles')

@section('content')
<div class="container">
    <h1>Événements Disponibles</h1>

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
                            <form action="{{ route('participants.joinEvent', $event->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm">Rejoindre</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Aucun événement disponible.</p>
    @endif
</div>
@endsection
