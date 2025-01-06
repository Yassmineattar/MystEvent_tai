@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1>Quizz échoué</h1>
    <p>Vous avez donné une réponse incorrecte. Malheureusement, vous avez échoué au quiz.</p>
    <a href="{{ route('participants.myEvents') }}" class="btn btn-danger">Retour à mes événements</a>
</div>
@endsection
