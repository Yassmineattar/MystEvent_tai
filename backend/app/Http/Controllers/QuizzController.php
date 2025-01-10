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
        // Charger 4 questions aléatoires
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

        // Récupérer la première question non encore répondue
        $currentQuestion = $remainingQuestions->first();

        // Définir le temps restant pour le quiz
        $timeLeft = 30;

        return view('quizz.question', compact('event', 'currentQuestion', 'timeLeft'));
    }

    // Vérifier la réponse et passer à la question suivante
    public function submit(Request $request, Event $event)
    {
        $question = Quiz::findOrFail($request->get('question_id'));
        $answeredQuestions = session()->get('answered_questions', []);

        // Vérification de la réponse
        if ($request->get('answer') === $question->correct_answer) {
            // Ajouter la question à la liste des questions répondues
            $answeredQuestions[] = $question->id;
            session()->put('answered_questions', $answeredQuestions);

            // Récupérer un indice aléatoire de l'événement
            $clue = $event->clues()->inRandomOrder()->first();

            // Rediriger avec un message de succès et un indice
            return redirect()->route('quizz.start', $event->id)
                ->with('message', 'Réponse correcte ! Voici un indice : ' . $clue->content);
        }

        // Si la réponse est incorrecte, réinitialiser le quiz et afficher le message d'échec
        session()->forget('answered_questions');

        return redirect()->route('quizz.fail', $event->id)
            ->with('error', 'Réponse incorrecte. Le quiz a échoué, veuillez réessayer.');
    }

    // Afficher le message de succès
    public function success(Event $event)
{
    if (session()->has('quiz_failed')) {
        session()->forget('answered_questions');
        session()->forget('quiz_failed');
        return redirect()->route('participants.myEvents')->with('error', 'Vous avez échoué au quiz.');
    }

    // Vérifier s'il reste des tickets disponibles
    if ($event->available_tickets > 0) {
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

        // Récupérer les indices collectés
        $clues = $event->clues()->take(count(session('answered_questions', [])))->get();

        // Décrémenter le nombre de tickets disponibles
        $event->decrement('available_tickets');

        session()->forget('answered_questions');

        return view('quizz.success', compact('event', 'clues'));
    } else {
        return redirect()->route('participants.myEvents')->with('error', 'Il n\'y a plus de tickets disponibles pour cet événement.');
    }
}

    // Afficher la vue d'échec
    public function fail(Event $event)
    {
        return view('quizz.fail', compact('event'));
    }
    // Afficher les indices collectés pour un événement
public function viewIndices(Event $event)
{
    // Récupérer les indices collectés par le participant
    $clues = $event->clues;

    return view('quizz.viewIndices', compact('event', 'clues'));
}

}
