@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-12 bg-white shadow-lg rounded-lg p-8">
    <!-- Titre -->
    <h1 class="text-4xl font-bold text-[#5D3F6B] mb-6 text-center">📖 Quizz : {{ $event->title }}</h1>
    <p class="text-lg text-gray-600 mb-8 text-center">Question {{ count(session('answered_questions', [])) + 1 }} sur 4</p>

    <!-- Timer -->
    <div class="timer-container mb-6 mx-auto">
        <svg class="timer-circle" viewBox="0 0 120 120">
            <circle cx="60" cy="60" r="55" class="timer-background" />
            <circle cx="60" cy="60" r="55" class="timer-foreground" stroke-dasharray="345" stroke-dashoffset="345" />
        </svg>
        <div id="timer" class="timer-text text-2xl font-bold text-[#9B4F96]">30</div>
    </div>

    <!-- Question -->
    <div class="bg-[#F1E8E1] p-6 rounded-lg shadow-md text-[#5D3F6B] text-lg mb-8">
        {{ $currentQuestion->question }}
    </div>

    <!-- Formulaire de réponses -->
    <form action="{{ route('quizz.submit', $event->id) }}" method="POST" class="space-y-4">
        @csrf
        <input type="hidden" name="question_id" value="{{ $currentQuestion->id }}">

        <!-- Choix 1 -->
        <div class="flex items-center answer-choice hover:bg-[#9B4F96] hover:text-white transition duration-300 p-2 rounded-lg">
            <input class="form-check-input h-5 w-5 text-[#5D3F6B] border-gray-300 focus:ring-[#9B4F96]" type="radio" name="answer" value="{{ $currentQuestion->choice_1 }}" required>
            <label class="ml-3 text-gray-800">{{ $currentQuestion->choice_1 }}</label>
        </div>

        <!-- Choix 2 -->
        <div class="flex items-center answer-choice hover:bg-[#9B4F96] hover:text-white transition duration-300 p-2 rounded-lg">
            <input class="form-check-input h-5 w-5 text-[#5D3F6B] border-gray-300 focus:ring-[#9B4F96]" type="radio" name="answer" value="{{ $currentQuestion->choice_2 }}" required>
            <label class="ml-3 text-gray-800">{{ $currentQuestion->choice_2 }}</label>
        </div>

        <!-- Choix 3 -->
        <div class="flex items-center answer-choice hover:bg-[#9B4F96] hover:text-white transition duration-300 p-2 rounded-lg">
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

<script>
    let timeLeft = 30;
    const timerElement = document.getElementById('timer');
    const timerCircle = document.querySelector('.timer-foreground');
    const totalTime = 30;

    const timer = setInterval(function() {
        if (timeLeft > 0) {
            timeLeft--;
            timerElement.textContent = timeLeft;
            const offset = (timeLeft / totalTime) * 345;
            timerCircle.style.strokeDashoffset = offset;
        } else {
            clearInterval(timer);
            alert('Le temps est écoulé !');
            // Vous pouvez ici soumettre automatiquement le formulaire si nécessaire
            window.location.href = "{{ route('quizz.fail', $event->id) }}"; 
        }
    }, 1000); // Décrémente toutes les secondes
</script>

@endsection

<style>
    .timer-container {
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        width: 120px;
        height: 120px;
    }
    .timer-circle {
        transform: rotate(-90deg); /* Rotation du cercle pour commencer à partir du haut */
    }
    .timer-background {
        fill: none;
        stroke: #ddd;
        stroke-width: 10;
    }
    .timer-foreground {
        fill: none;
        stroke: #FFA500;
        stroke-width: 10;
        transition: stroke-dashoffset 1s linear;
    }
    .timer-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 24px;
    }

    /* Style de survol sur les choix */
    .answer-choice:hover {
        cursor: pointer;
        background-color: #9B4F96; /* Changer la couleur de fond lors du survol */
        color: white; /* Changer la couleur du texte */
    }
</style>
