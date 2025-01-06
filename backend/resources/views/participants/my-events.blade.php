@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Mes Événements</h1>

    @if($events->count() > 0)
        <ul class="list-group">
            @foreach($events as $event)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong>{{ $event->title }}</strong> - {{ $event->eventDate->format('d/m/Y H:i') }}
                    </div>

                    <!-- Vérification du statut de l'utilisateur pour cet événement -->
                    @php
                        $status = DB::table('event_user')
                                    ->where('event_id', $event->id)
                                    ->where('user_id', auth()->id())
                                    ->value('status');
                    @endphp

                    @if($status === 'accepted')
                        <!-- Si accepté, afficher "Accepted" et "View Indices" -->
                        <div>
                            <span class="badge bg-success">Accepted</span>
                            <a href="{{ route('quizz.viewIndices', $event->id) }}" class="btn btn-info btn-sm">View Indices</a>
                        </div>
                    @else
                        <!-- Sinon, afficher le bouton "Passer un Quizz" -->
                        <a href="{{ route('quizz.start', $event->id) }}" class="btn btn-primary btn-sm">Passer un Quizz</a>
                    @endif
                </li>
            @endforeach
        </ul>
    @else
        <p>Vous n'avez rejoint aucun événement pour l'instant.</p>
    @endif
</div>
@endsection
