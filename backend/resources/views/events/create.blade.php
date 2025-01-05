@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Créer un Événement</h1>

    <form action="{{ route('events.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="5" required></textarea>
        </div>
        <div class="mb-3">
            <label for="eventDate" class="form-label">Date de l'Événement</label>
            <input type="datetime-local" name="eventDate" id="eventDate" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>
@endsection
