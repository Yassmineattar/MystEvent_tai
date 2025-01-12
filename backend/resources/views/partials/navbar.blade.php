<head>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<nav class="bg-[rgba(55,40,61,0.88)] text-[#F1E8E1] shadow-lg">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('welcome') }}" class="text-4xl font-serif font-extrabold text-[#F1E8E1] flex items-center space-x-2 hover:text-[#C99E9A] transition duration-300">
                    <i class="fas fa-masks-theater text-[#C99E9A] text-2xl"></i>
                    <span>MystEvent</span>
                </a>
            </div>

            <!-- Menu desktop -->
            <div class="hidden md:flex space-x-6 items-center">
                <!-- Accueil (invité uniquement) -->
                @guest
                <a href="{{ route('welcome') }}" class="flex items-center space-x-2 text-lg font-semibold text-[#F1E8E1] hover:text-[#C99E9A] transition duration-300 px-3 py-2 rounded-md">
                    <i class="fas fa-home"></i>
                    <span>Accueil</span>
                </a>
                @endguest

                <!-- Dropdown Événements -->
                @auth
                <div class="relative">
                    <button id="event-menu-button" class="text-lg font-semibold text-[#F1E8E1] hover:text-[#C99E9A] flex items-center space-x-2 transition duration-300">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Événements</span>
                        <i class="fas fa-chevron-down text-sm"></i>
                    </button>

                    <!-- Contenu du menu déroulant -->
                    <div id="event-menu" class="hidden absolute bg-[#F1E8E1] text-[#333333] rounded-md shadow-lg mt-2 z-10">
                        @if(auth()->user()->user_type === 'organizer')
                        <a href="{{ route('events.index') }}" class="block px-4 py-2 hover:bg-[#A38E91]">
                            <i class="fas fa-list"></i> Voir mes événements
                        </a>
                        <a href="{{ route('events.create') }}" class="block px-4 py-2 hover:bg-[#A38E91]">
                            <i class="fas fa-plus-circle"></i> Créer un événement
                        </a>
                        @endif

                        @if(auth()->user()->user_type === 'participator')
                        <a href="{{ route('participants.availableEvents') }}" class="block px-4 py-2 hover:bg-[#A38E91]">
                            <i class="fas fa-search"></i> Événements disponibles
                        </a>
                        <a href="{{ route('participants.myEvents') }}" class="block px-4 py-2 hover:bg-[#A38E91]">
                            <i class="fas fa-list-ul"></i> Mes événements rejoints
                        </a>
                        @endif
                    </div>
                </div>
                <!-- Bouton séparé Mes tickets -->
                @if(auth()->user()->user_type === 'participator')
                <a href="{{ route('participants.myTickets') }}" class="flex items-center space-x-2 text-lg font-semibold text-[#F1E8E1] hover:text-[#C99E9A] transition duration-300 px-3 py-2 rounded-md">
                    <i class="fas fa-ticket-alt"></i>
                    <span>Mes tickets</span>
                </a>
                @endif
                <!-- Lien Profil avec menu déroulant -->
                <div class="relative">
                    <button id="profile-menu-button" class="flex items-center space-x-2 text-lg font-semibold text-[#F1E8E1] hover:text-[#C99E9A] transition duration-300 px-3 py-2 rounded-md">
                        <i class="fas fa-user-alt"></i>
                        <span>Profil</span>
                        <i class="fas fa-chevron-down text-sm"></i>
                    </button>

                    <!-- Menu déroulant Profil -->
                    <div id="profile-menu" class="hidden absolute bg-[#F1E8E1] text-[#333333] rounded-md shadow-lg mt-2 z-10">
                        <a href="{{ route('home') }}" class="block px-4 py-2 hover:bg-[#A38E91]">
                            <i class="fas fa-tachometer-alt"></i> Tableau de bord
                        </a>
                        <a href="{{ route('user.settings') }}" class="block px-4 py-2 hover:bg-[#A38E91]">
                            <i class="fas fa-cogs"></i> Paramètres
                        </a>
                    </div>
                </div>

                <div class="relative">
    <!-- Icône de notification -->
    <button id="notification-button" class="relative flex items-center space-x-2 text-lg font-semibold text-[#F1E8E1] hover:text-[#C99E9A] transition duration-300 px-3 py-2 rounded-md">
        <i class="fas fa-bell"></i>
        @php
            $unreadCount = \App\Models\Notification::where('user_id', auth()->id())->where('read', false)->count();
        @endphp
        @if ($unreadCount > 0)
            <span class="bg-red-500 text-white text-xs rounded-full px-2 py-1 absolute -top-1 -right-2">{{ $unreadCount }}</span>
        @endif
    </button>

    <!-- Dropdown des notifications -->
    <div id="notification-menu" class="hidden absolute bg-white text-black rounded-md shadow-lg mt-2 right-0 z-10 w-80">
        <div class="p-4 border-b">
            <h2 class="text-lg font-bold">Notifications</h2>
        </div>
        @php
            $notifications = \App\Models\Notification::where('user_id', auth()->id())->orderBy('created_at', 'desc')->take(5)->get();
        @endphp

        <ul class="divide-y divide-gray-200">
            @if ($notifications->isEmpty())
                <li class="p-4 text-gray-500">Aucune notification pour le moment.</li>
            @else
                @foreach ($notifications as $notification)
                    <li class="flex justify-between items-center p-4">
                        <span>{{ $notification->message }}</span>
                        <form method="POST" action="{{ route('notifications.markAsRead', $notification->id) }}">
                            @csrf
                            <button type="submit" class="text-red-500 hover:text-red-700">
                                <i class="fas fa-times"></i>
                            </button>
                        </form>
                    </li>
                @endforeach
            @endif
        </ul>

        <!-- Bouton pour marquer toutes les notifications comme lues -->
        <form method="POST" action="{{ route('notifications.markAllRead') }}" class="p-4">
            @csrf
            <button type="submit" class="bg-[#5D3F6B] text-white px-4 py-2 rounded-lg shadow hover:bg-[#9B4F96] transition duration-300 w-full">
                Marquer toutes comme lues
            </button>
        </form>
    </div>
</div>

                <!-- Déconnexion -->
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="flex items-center space-x-2 text-lg font-semibold text-[#F1E8E1] hover:text-[#C99E9A] transition duration-300 px-3 py-2 rounded-md">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Déconnexion</span>
                    </button>
                </form>
                @endauth

                <!-- Connexion / Inscription -->
                @guest
                <a href="{{ route('login') }}" class="flex items-center space-x-2 text-lg font-semibold text-[#F1E8E1] hover:text-[#C99E9A] transition duration-300 px-3 py-2 rounded-md">
                    <i class="fas fa-sign-in-alt"></i>
                    <span>Connexion</span>
                </a>
                <a href="{{ route('register') }}" class="flex items-center space-x-2 text-lg font-semibold text-[#F1E8E1] hover:text-[#C99E9A] transition duration-300 px-3 py-2 rounded-md">
                    <i class="fas fa-user-plus"></i>
                    <span>Inscription</span>
                </a>
                @endguest
            </div>

            <!-- Menu mobile -->
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-button" class="text-[#F1E8E1] hover:text-[#C99E9A] focus:outline-none">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </div>

   <!-- Menu mobile -->
   <div id="mobile-menu" class="hidden bg-[#F1E8E1] border-t border-gray-200 md:hidden">
        @auth
        <!-- Organisateur -->
        @if(auth()->user()->user_type === 'organizer')
        <a href="{{ route('events.index') }}" class="block text-[#333333] hover:bg-[#A38E91] px-3 py-2 rounded-md text-sm font-medium">
            <i class="fas fa-list"></i> Voir mes événements
        </a>
        <a href="{{ route('events.create') }}" class="block text-[#333333] hover:bg-[#A38E91] px-3 py-2 rounded-md text-sm font-medium">
            <i class="fas fa-plus-circle"></i> Créer un événement
        </a>
        @endif

        <!-- Participant -->
        @if(auth()->user()->user_type === 'participator')
        <a href="{{ route('participants.availableEvents') }}" class="block text-[#333333] hover:bg-[#A38E91] px-3 py-2 rounded-md text-sm font-medium">
            <i class="fas fa-search"></i> Événements disponibles
        </a>
        <a href="{{ route('participants.myEvents') }}" class="block text-[#333333] hover:bg-[#A38E91] px-3 py-2 rounded-md text-sm font-medium">
            <i class="fas fa-list-ul"></i> Mes événements rejoints
        </a>
        <a href="{{ route('participants.myTickets') }}" class="block text-[#333333] hover:bg-[#A38E91] px-3 py-2 rounded-md text-sm font-medium">
            <i class="fas fa-ticket-alt"></i> Mes tickets
        </a>
        @endif
        <a href="{{ route('home') }}" class="block text-[#333333] hover:bg-[#A38E91] px-3 py-2 rounded-md text-sm font-medium">
            <i class="fas fa-user-alt"></i> Profil
        </a>
        <a href="{{ route('user.settings') }}" class="block text-[#333333] hover:bg-[#A38E91] px-3 py-2 rounded-md text-sm font-medium">
            <i class="fas fa-cogs"></i> Paramètres
        </a>
        <form action="{{ route('logout') }}" method="POST" class="block text-[#333333] hover:bg-[#A38E91] px-3 py-2 rounded-md text-sm font-medium">
            @csrf
            <button type="submit" class="w-full text-left">
                <i class="fas fa-sign-out-alt"></i> Déconnexion
            </button>
        </form>
        @endauth

        @guest
        <a href="{{ route('login') }}" class="block text-[#333333] hover:bg-[#A38E91] px-3 py-2 rounded-md text-sm font-medium">
            <i class="fas fa-sign-in-alt"></i> Connexion
        </a>
        <a href="{{ route('register') }}" class="block text-[#333333] hover:bg-[#A38E91] px-3 py-2 rounded-md text-sm font-medium">
            <i class="fas fa-user-plus"></i> Inscription
        </a>
        @endguest
    </div>
</nav>

<!-- Script -->
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

    // Toggle du menu dropdown Profil
    const profileMenuButton = document.getElementById('profile-menu-button');
    const profileMenu = document.getElementById('profile-menu');
    profileMenuButton.addEventListener('click', () => {
        profileMenu.classList.toggle('hidden');
    });
</script>
<script>
    // Toggle du menu dropdown des notifications
    const notificationButton = document.getElementById('notification-button');
    const notificationMenu = document.getElementById('notification-menu');
    notificationButton.addEventListener('click', () => {
        notificationMenu.classList.toggle('hidden');
    });

    // Fermer le dropdown en cliquant à l'extérieur
    document.addEventListener('click', (e) => {
        if (!notificationButton.contains(e.target) && !notificationMenu.contains(e.target)) {
            notificationMenu.classList.add('hidden');
        }
    });
</script>
