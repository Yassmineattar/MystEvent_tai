@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Quizz pour l'événement : {{ $event->title }}</h1>
    <p>Question {{ count(session('answered_questions', [])) + 1 }} sur 4</p>

    <div class="alert alert-info">
        {{ $currentQuestion->question }}
    </div>

    <form action="{{ route('quizz.submit', $event->id) }}" method="POST">
        @csrf
        <input type="hidden" name="question_id" value="{{ $currentQuestion->id }}">

        <div class="form-check">
            <input class="form-check-input" type="radio" name="answer" value="{{ $currentQuestion->choice_1 }}" required>
            <label class="form-check-label">{{ $currentQuestion->choice_1 }}</label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="answer" value="{{ $currentQuestion->choice_2 }}" required>
            <label class="form-check-label">{{ $currentQuestion->choice_2 }}</label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="answer" value="{{ $currentQuestion->choice_3 }}" required>
            <label class="form-check-label">{{ $currentQuestion->choice_3 }}</label>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Valider</button>
    </form>

    @if(session('message'))
        <div class="alert alert-success mt-3">
            {{ session('message') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger mt-3">
            {{ session('error') }}
        </div>
        
    @endif
</div>
@endsection
