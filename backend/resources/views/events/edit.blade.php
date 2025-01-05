@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier l'Événement</h1>

    <form action="{{ route('events.update', $event->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $event->title }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="5" required>{{ $event->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="eventDate" class="form-label">Date de l'Événement</label>
            <input type="datetime-local" name="eventDate" id="eventDate" class="form-control" value="{{ $event->eventDate->format('Y-m-d\TH:i') }}" required>
        </div>
        <button type="submit" class="btn btn-success">Mettre à jour</button>
    </form>
</div>
@endsection
