@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1>Félicitations !</h1>
    <p>Vous avez terminé le quiz avec succès !</p>

    <h2>Voici les indices que vous avez découverts :</h2>
    <ul>
        @foreach($clues as $clue)
            <li>{{ $clue->content }}</li>
        @endforeach
    </ul>

    <h3>Votre ticket pour cet événement a été envoyé à votre adresse email.</h3>

    <a href="{{ route('home') }}" class="btn btn-success">Retour à la page d'accueil</a>
</div>
@endsection
