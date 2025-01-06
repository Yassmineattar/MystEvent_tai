<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Quiz;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TicketEmail;

class QuizzController extends Controller
{
    // Commencer le quiz
    public function start(Request $request, Event $event)
    {
        // Charger les questions de manière aléatoire
        $questions = Quiz::inRandomOrder()->take(4)->get();
        $answeredQuestions = session()->get('answered_questions', []);

        // Limiter le nombre de questions à 4
        if (count($answeredQuestions) >= 4) {
            return redirect()->route('quizz.success', $event->id);
        }

        // Filtrer les questions déjà répondues
        $remainingQuestions = $questions->whereNotIn('id', $answeredQuestions);

        // Vérifier s'il reste des questions
        if ($remainingQuestions->isEmpty()) {
            return redirect()->route('quizz.success', $event->id);
        }

        // Prendre une question au hasard
        $currentQuestion = $remainingQuestions->first();

        return view('quizz.question', compact('event', 'currentQuestion'));
    }

    // Vérifier la réponse et passer à la question suivante
    public function submit(Request $request, Event $event)
    {
        $question = Quiz::findOrFail($request->get('question_id'));
        $answeredQuestions = session()->get('answered_questions', []);

        // Vérification de la réponse
        $isCorrect = $request->get('answer') === $question->correct_answer;

        // Ajouter la question à la liste des questions répondues
        $answeredQuestions[] = $question->id;
        session()->put('answered_questions', $answeredQuestions);

        // Ajouter un message si la réponse est incorrecte
        if (!$isCorrect) {
            session()->put('quiz_failed', true);
            return redirect()->route('participants.myEvents')->with('error', 'Vous avez échoué au quiz.');
        }

        // Rediriger vers la prochaine question
        return redirect()->route('quizz.start', $event->id)->with('message', 'Réponse correcte !');
    }

    // Afficher le message de succès
    public function success(Event $event)
    {
        // Vérifier si le quiz a échoué
        if (session()->has('quiz_failed')) {
            session()->forget('answered_questions');
            session()->forget('quiz_failed');
            return redirect()->route('participants.myEvents')->with('error', 'Vous avez échoué au quiz.');
        }

        // Mettre à jour le statut dans la table pivot
        $event->participants()->updateExistingPivot(auth()->id(), ['status' => 'accepted']);

        // Générer un ticket
        $ticket = Ticket::create([
            'event_id' => $event->id,
            'user_id' => auth()->id(),
            'email' => auth()->user()->email,
            'code' => strtoupper(\Illuminate\Support\Str::random(10)),
            'status' => 'valid',
        ]);

        // Envoyer le ticket par email
        Mail::to(auth()->user()->email)->send(new TicketEmail($ticket));

        // Afficher la vue de succès avec les indices collectés
        $clues = $event->clues;

        session()->forget('answered_questions');

        return view('quizz.success', compact('event', 'clues'));
    }
    public function viewIndices(Event $event)
{
    // Récupérer les indices collectés par le participant pour cet événement
    $clues = $event->clues;

    return view('quizz.viewIndices', compact('event', 'clues'));
}

}
