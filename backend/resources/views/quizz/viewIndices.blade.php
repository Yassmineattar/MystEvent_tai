@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1>Indices pour l'événement : {{ $event->title }}</h1>

    @if($clues->count() > 0)
        <ul class="list-group">
            @foreach($clues as $clue)
                <li class="list-group-item">{{ $clue->content }}</li>
            @endforeach
        </ul>
    @else
        <p>Aucun indice trouvé pour cet événement.</p>
    @endif

    <a href="{{ route('participants.myEvents') }}" class="btn btn-secondary mt-3">Retour à mes événements</a>
</div>
@endsection
