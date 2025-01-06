@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Quizz pour l'événement : {{ $event->title }}</h1>
    <p>Date de l'événement : {{ $event->eventDate->format('d/m/Y H:i') }}</p>

    <form action="{{ route('quizz.submit', $event->id) }}" method="POST">
        @csrf

        @foreach($questions as $index => $question)
            <div class="mb-4">
                <h5>Question {{ $index + 1 }} : {{ $question->question }}</h5>
                <div>
                    <input type="radio" name="question_{{ $index }}" value="{{ $question->choice_1 }}" required>
                    {{ $question->choice_1 }}
                </div>
                <div>
                    <input type="radio" name="question_{{ $index }}" value="{{ $question->choice_2 }}" required>
                    {{ $question->choice_2 }}
                </div>
                <div>
                    <input type="radio" name="question_{{ $index }}" value="{{ $question->choice_3 }}" required>
                    {{ $question->choice_3 }}
                </div>
            </div>
        @endforeach

        <button type="submit" class="btn btn-success">Soumettre le Quizz</button>
    </form>
</div>
@endsection
