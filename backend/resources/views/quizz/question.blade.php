@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-12 bg-white shadow-lg rounded-lg p-8">
    <!-- Titre -->
    <h1 class="text-4xl font-bold text-[#5D3F6B] mb-6">📖 Quizz : {{ $event->title }}</h1>
    <p class="text-lg text-gray-600 mb-8">Question {{ count(session('answered_questions', [])) + 1 }} sur 4</p>

    <!-- Question -->
    <div class="bg-[#F1E8E1] p-6 rounded-lg shadow-md text-[#5D3F6B] text-lg mb-8">
        {{ $currentQuestion->question }}
    </div>

    <!-- Formulaire de réponses -->
    <form action="{{ route('quizz.submit', $event->id) }}" method="POST" class="space-y-4">
        @csrf
        <input type="hidden" name="question_id" value="{{ $currentQuestion->id }}">

        <!-- Choix 1 -->
        <div class="flex items-center">
            <input class="form-check-input h-5 w-5 text-[#5D3F6B] border-gray-300 focus:ring-[#9B4F96]" type="radio" name="answer" value="{{ $currentQuestion->choice_1 }}" required>
            <label class="ml-3 text-gray-800">{{ $currentQuestion->choice_1 }}</label>
        </div>

        <!-- Choix 2 -->
        <div class="flex items-center">
            <input class="form-check-input h-5 w-5 text-[#5D3F6B] border-gray-300 focus:ring-[#9B4F96]" type="radio" name="answer" value="{{ $currentQuestion->choice_2 }}" required>
            <label class="ml-3 text-gray-800">{{ $currentQuestion->choice_2 }}</label>
        </div>

        <!-- Choix 3 -->
        <div class="flex items-center">
            <input class="form-check-input h-5 w-5 text-[#5D3F6B] border-gray-300 focus:ring-[#9B4F96]" type="radio" name="answer" value="{{ $currentQuestion->choice_3 }}" required>
            <label class="ml-3 text-gray-800">{{ $currentQuestion->choice_3 }}</label>
        </div>

        <!-- Bouton de soumission -->
        <button type="submit" class="bg-[#5D3F6B] text-white px-6 py-3 rounded-lg font-medium shadow-md hover:bg-[#9B4F96] transition duration-300 mt-6">
            Valider
        </button>
    </form>

    <!-- Messages d'alerte -->
    @if(session('message'))
    <div class="mt-6 bg-green-100 text-green-700 px-4 py-3 rounded-lg shadow-md">
        <p>{{ session('message') }}</p>
    </div>
@endif

@if(session('error'))
    <div class="mt-6 bg-red-100 text-red-700 px-4 py-3 rounded-lg shadow-md">
        <p>{{ session('error') }}</p>
    </div>
@endif

</div>
<br>
@endsection
