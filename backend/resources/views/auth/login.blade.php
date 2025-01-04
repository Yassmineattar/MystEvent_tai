@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Connexion</h2>
    
    <!-- Affichage des erreurs -->
    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show w-75" role="alert">
        @foreach ($errors->all() as $error)
            <p class="mb-0">{{ $error }}</p>
        @endforeach
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="remember" id="remember" class="form-check-input">
            <label for="remember" class="form-check-label">Se souvenir de moi</label>
        </div>
        <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>
</div>
@endsection
