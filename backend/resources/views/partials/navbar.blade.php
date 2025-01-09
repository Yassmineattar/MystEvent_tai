<head>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
</head>
<nav class="bg-[rgba(55,40,61,0.88)] text-[#F1E8E1] shadow-lg rounded-lg">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('welcome') }}" class="text-4xl font-serif font-extrabold text-[#F1E8E1] flex items-center space-x-2 hover:text-[#C99E9A] transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#C99E9A]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3-1.343-3-3s1.343-3 3-3 3 1.343 3 3-1.343 3-3 3zM12 22c-3.866 0-7-1.343-7-3V9c0-1.657 3.134-3 7-3s7 1.343 7 3v10c0 1.657-3.134 3-7 3z" />
                    </svg>
                    <span class="text-[#F1E8E1]">MystEvent</span>
                </a>
            </div>

            <!-- Menu desktop -->
            <div class="hidden md:flex space-x-6 items-center">
                <!-- Afficher "Accueil" seulement si l'utilisateur n'est pas connecté -->
                @guest
                    <a href="{{ route('welcome') }}" class="text-lg font-semibold text-[#F1E8E1] hover:text-[#C99E9A] transition duration-300 px-3 py-2 rounded-md">
                        Accueil
                    </a>
                @endguest

                <!-- Dropdown des événements -->
                @auth
                    <div class="relative">
                        <button id="event-menu-button" class="text-lg font-semibold text-[#F1E8E1] hover:text-[#C99E9A] flex items-center space-x-2 transition duration-300">
                            Événements
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M6 9l6 6 6-6"></path>
                            </svg>
                        </button>
                        <div id="event-menu" class="hidden absolute bg-[#F1E8E1] text-[#333333] rounded-md shadow-lg mt-2 z-10">
                            @if(auth()->user()->user_type === 'organizer')
                                <a href="{{ route('events.index') }}" class="block px-4 py-2 hover:bg-[#A38E91]">Voir mes événements</a>
                                <a href="{{ route('events.create') }}" class="block px-4 py-2 hover:bg-[#A38E91]">Créer un événement</a>
                            @elseif(auth()->user()->user_type === 'participator')
                                <a href="{{ route('participants.availableEvents') }}" class="block px-4 py-2 hover:bg-[#A38E91]">Voir les événements disponibles</a>
                                <a href="{{ route('participants.myEvents') }}" class="block px-4 py-2 hover:bg-[#A38E91]">Mes événements rejoints</a>
                                <a href="{{ route('participants.myTickets') }}" class="block px-4 py-2 hover:bg-[#A38E91]">Mes tickets</a>
                            @endif
                        </div>
                    </div>
                @endauth

                <!-- Lien Profil pour le participant et organisateur -->
                @auth
                <a href="{{ route('home') }}" class="flex items-center space-x-2 text-lg font-semibold text-[#F1E8E1] hover:text-[#C99E9A] transition duration-300 px-3 py-2 rounded-md">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#F1E8E1]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7a4 4 0 10-8 0 4 4 0 008 0zM12 14a9 9 0 00-9 9h18a9 9 0 00-9-9z" />
        </svg>
        <span>Profil</span>
    </a>
                @endauth

                <!-- Connexion / Inscription -->
                @auth
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-lg font-semibold text-[#F1E8E1] hover:text-[#C99E9A] transition duration-300 px-3 py-2 rounded-md">
                            Déconnexion
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-lg font-semibold text-[#F1E8E1] hover:text-[#C99E9A] transition duration-300 px-3 py-2 rounded-md">
                        Connexion
                    </a>
                    <a href="{{ route('register') }}" class="text-lg font-semibold text-[#F1E8E1] hover:text-[#C99E9A] transition duration-300 px-3 py-2 rounded-md">
                        Inscription
                    </a>
                @endauth
            </div>

            <!-- Menu mobile -->
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-button" class="text-[#F1E8E1] hover:text-[#C99E9A] focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Menu mobile -->
    <!-- Menu mobile -->
<div id="mobile-menu" class="hidden bg-[#F1E8E1] border-t border-gray-200 md:hidden">
    <div class="space-y-1 px-4 pt-4 pb-3">
        <!-- Afficher "Accueil" seulement si l'utilisateur n'est pas connecté -->
        @guest
            <a href="{{ route('welcome') }}" class="block text-[#333333] hover:bg-[#A38E91] px-3 py-2 rounded-md text-sm font-medium">
                Accueil
            </a>
        @endguest

        <!-- Affichage des liens pour les utilisateurs connectés -->
        @auth
            <!-- Affichage pour les participants -->
            @if(auth()->user()->user_type === 'participator')
                <a href="{{ route('participants.availableEvents') }}" class="block text-[#333333] hover:bg-[#A38E91] px-3 py-2 rounded-md text-sm font-medium">
                    Voir les événements disponibles
                </a>
                <a href="{{ route('participants.myEvents') }}" class="block text-[#333333] hover:bg-[#A38E91] px-3 py-2 rounded-md text-sm font-medium">
                    Mes événements rejoints
                </a>
                <a href="{{ route('participants.myTickets') }}" class="block text-[#333333] hover:bg-[#A38E91] px-3 py-2 rounded-md text-sm font-medium">
                    Mes tickets
                </a>
            @elseif(auth()->user()->user_type === 'organizer')
                <a href="{{ route('events.index') }}" class="block text-[#333333] hover:bg-[#A38E91] px-3 py-2 rounded-md text-sm font-medium">
                    Voir mes événements
                </a>
                <a href="{{ route('events.create') }}" class="block text-[#333333] hover:bg-[#A38E91] px-3 py-2 rounded-md text-sm font-medium">
                    Créer un événement
                </a>
            @endif

            <!-- Profil -->
            <a href="{{ route('home') }}" class="block text-[#333333] hover:bg-[#A38E91] px-3 py-2 rounded-md text-sm font-medium">
                Profil
            </a>

            <!-- Déconnexion -->
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="block text-[#333333] hover:bg-[#A38E91] px-3 py-2 rounded-md text-sm font-medium">
                    Déconnexion
                </button>
            </form>
        @endauth

        <!-- Connexion / Inscription pour les invités -->
        @guest
            <a href="{{ route('login') }}" class="block text-[#333333] hover:bg-[#A38E91] px-3 py-2 rounded-md text-sm font-medium">
                Connexion
            </a>
            <a href="{{ route('register') }}" class="block text-[#333333] hover:bg-[#A38E91] px-3 py-2 rounded-md text-sm font-medium">
                Inscription
            </a>
        @endguest
    </div>
</div>

</nav>



<!-- Script pour le menu mobile et le menu dropdown -->
<script>
    // Toggle du menu mobile
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    // Toggle du menu dropdown des événements
    const eventMenuButton = document.getElementById('event-menu-button');
    const eventMenu = document.getElementById('event-menu');

    eventMenuButton.addEventListener('click', () => {
        eventMenu.classList.toggle('hidden');
    });
</script>
