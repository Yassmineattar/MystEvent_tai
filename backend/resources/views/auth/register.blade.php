@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Inscription</h2>

    {{-- Message flash de succès --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST" class="p-4 border rounded shadow">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="Entrez votre nom" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="Entrez votre email" required>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Choisissez un mot de passe" required>
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirmez votre mot de passe" required>
        </div>
        <div class="mb-3">
            <label for="user_type" class="form-label">Type d'utilisateur</label>
            <select name="user_type" id="user_type" class="form-control">
                <option value="organizer" {{ old('user_type') == 'organizer' ? 'selected' : '' }}>Organisateur</option>
                <option value="participator" {{ old('user_type') == 'participator' ? 'selected' : '' }}>Participant</option>
            </select>
            @error('user_type')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary w-100">S'inscrire</button>
    </form>
</div>
@endsection
