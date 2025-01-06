@extends('layouts.app')

@section('title', 'Modifier un Indice')

@section('content')
    <h1>Modifier l'Indice de l'Événement : {{ $event->title }}</h1>

    <form action="{{ route('clues.update', [$event->id, $clue->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="content">Contenu de l'indice</label>
            <input type="text" name="content" id="content" class="form-control" value="{{ $clue->content }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Mettre à jour</button>
    </form>

    <a href="{{ route('clues.index', $event->id) }}" class="btn btn-secondary mt-3">Retour à la liste des indices</a>
@endsection
