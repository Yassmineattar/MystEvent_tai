<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MystEvent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('home') }}">MystEvent</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @auth
                    <!-- Menu Accueil -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Accueil</a>
                    </li>

                    <!-- Navigation spécifique pour les organisateurs -->
                    @if(auth()->user()->user_type === 'organizer')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownOrganizer" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Mes événements
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownOrganizer">
                                <li><a class="dropdown-item" href="{{ route('events.index') }}">Voir mes événements</a></li>
                                <li><a class="dropdown-item" href="{{ route('events.create') }}">Créer un événement</a></li>
                            </ul>
                        </li>

                    <!-- Navigation spécifique pour les participants -->
                    @elseif(auth()->user()->user_type === 'participator')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownParticipant" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Événements
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownParticipant">
                                <li><a class="dropdown-item" href="{{ route('participants.availableEvents') }}">Voir les événements disponibles</a></li>
                                <li><a class="dropdown-item" href="{{ route('participants.myEvents') }}">Mes événements rejoints</a></li>
                                <li><a class="dropdown-item" href="{{ route('participants.myTickets') }}">Mes tickets</a></li>
                            </ul>
                        </li>
                    @endif

                    <!-- Déconnexion -->
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link" style="color: inherit; border: none; background: none;">Déconnexion</button>
                        </form>
                    </li>
                @else
                    <!-- Si non connecté -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Inscription</a>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
