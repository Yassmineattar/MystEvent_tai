@extends('layouts.app')

@section('title', 'Créer un Indice')

@section('content')
    <h1>Créer un Indice pour l'Événement : {{ $event->title }}</h1>

    <form action="{{ route('clues.store', $event->id) }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="content">Contenu de l'indice</label>
            <input type="text" name="content" id="content" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Créer</button>
    </form>

    <a href="{{ route('clues.index', $event->id) }}" class="btn btn-secondary mt-3">Retour à la liste des indices</a>
@endsection
