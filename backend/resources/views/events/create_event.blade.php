@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Créer un événement</h2>
    <form action="{{ route('events.create') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titre de l'événement</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="start_date" class="form-label">Date de début</label>
            <input type="date" name="start_date" id="start_date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Créer l'événement</button>
    </form>
</div>
@endsection
