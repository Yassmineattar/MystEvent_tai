@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Événements</h2>
    <div class="list-group">
        @foreach($events as $event)
            <div class="list-group-item">
                <h5>{{ $event->title }}</h5>
                <p>{{ $event->description }}</p>
                <p><strong>Organisé par:</strong> {{ $event->organizer->name }}</p>
                <form action="{{ route('events.showUsers', $event) }}" method="GET">
                    <button type="submit" class="btn btn-info">Voir les utilisateurs intéressés</button>
                </form>
                @if(auth()->user()->user_type == 'participant' && !$event->users->contains(auth()->user()))
                    <form action="{{ route('events.addUser', $event) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">Manifester mon intérêt</button>
                    </form>
                @endif
            </div>
        @endforeach
    </div>
</div>
@endsection
