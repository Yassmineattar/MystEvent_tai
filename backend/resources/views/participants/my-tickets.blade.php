@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Mes Tickets</h1>

    @if($tickets->count() > 0)
        <ul class="list-group">
            @foreach($tickets as $ticket)
                <li class="list-group-item">
                    Ticket #{{ $ticket->id }} pour l'événement "{{ $ticket->event->title }}"
                </li>
            @endforeach
        </ul>
    @else
        <p>Vous n'avez encore gagné aucun ticket.</p>
    @endif
</div>
@endsection
