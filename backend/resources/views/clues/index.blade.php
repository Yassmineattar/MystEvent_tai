@extends('layouts.app')

@section('title', 'Liste des indices')

@section('content')
    <h1>Indices de l'Événement : {{ $event->title }}</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('clues.create', $event->id) }}" class="btn btn-primary mb-3">Ajouter un nouvel indice</a>

    <ul class="list-group">
        @foreach($clues as $clue)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $clue->content }}
                <div>
                    <a href="{{ route('clues.edit', [$event->id, $clue->id]) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('clues.destroy', [$event->id, $clue->id]) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('events.index') }}" class="btn btn-secondary mt-3">Retour aux événements</a>
@endsection
