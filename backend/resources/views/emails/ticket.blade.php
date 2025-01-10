@component('mail::message')
# Félicitations !

Vous avez gagné un ticket pour l'événement **{{ $ticket->event->title }}**.

Voici les détails de votre ticket :

- **Code du ticket :** {{ $ticket->code }}
- **Statut :** {{ $ticket->status }}
- **Date de l'événement :** {{ $ticket->event->eventDate->format('d/m/Y H:i') }}

### Voici les indices que vous avez collectés :

@foreach ($ticket->event->clues as $clue)
- {{ $clue->content }}
@endforeach

Nous avons hâte de vous voir à l'événement !

Merci,  
L'équipe MystEvent.
@endcomponent
