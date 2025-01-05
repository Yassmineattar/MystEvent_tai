@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Mes Événements</h1>

    @if($events->count() > 0)
        <ul class="list-group">
            @foreach($events as $event)
                <li class="list-group-item">
                    <strong>{{ $event->title }}</strong> - {{ $event->eventDate->format('d/m/Y H:i') }}
                </li>
            @endforeach
        </ul>
    @else
        <p>Vous n'avez rejoint aucun événement pour l'instant.</p>
    @endif
</div>
@endsection
