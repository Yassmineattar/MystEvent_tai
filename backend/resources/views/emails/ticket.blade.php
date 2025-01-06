@component('mail::message')
# Félicitations !

Vous avez gagné un ticket pour l'événement **{{ $ticket->event->title }}**.

Voici les détails de votre ticket :

- **Code du ticket :** {{ $ticket->code }}
- **Statut :** {{ $ticket->status }}

Nous avons hâte de vous voir à l'événement !

Merci,  
L'équipe MystEvent.
@endcomponent
