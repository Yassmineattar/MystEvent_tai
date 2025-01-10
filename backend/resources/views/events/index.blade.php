@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto mt-12 bg-white shadow-md rounded-lg p-8">
    <!-- Titre principal -->
    <h1 class="text-4xl font-bold text-[#5D3F6B] mb-8">Mes Événements</h1>

    <!-- Bouton Créer un événement -->
    <div class="text-right mb-8">
        <a href="{{ route('events.create') }}" class="bg-gradient-to-r from-[#5D3F6B] to-[#9B4F96] text-white px-6 py-3 rounded-full font-semibold shadow-lg hover:shadow-xl hover:opacity-90 transition duration-300">
            ➕ Créer un nouvel événement
        </a>
    </div>

    <!-- Affichage des événements -->
    @if($events->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($events as $event)
                <div class="bg-[#F1E8E1] shadow-md rounded-lg p-6 hover:shadow-lg transition duration-300">
                    <!-- Image de l'événement -->
                    @if($event->image)
                        <img src="{{ asset('storage/'.$event->image) }}" alt="{{ $event->title }}" class="w-full h-48 object-cover rounded-lg mb-6 transition-transform duration-300 hover:scale-105">
                    @else
                        <div class="w-full h-48 bg-gray-300 rounded-lg mb-6"></div> <!-- Placeholder si aucune image -->
                    @endif

                    <!-- Titre de l'événement -->
                    <h2 class="text-2xl font-bold text-[#5D3F6B] mb-2">{{ $event->title }}</h2>
                    <p class="text-gray-600 mb-4">Date : {{ $event->eventDate->format('d/m/Y H:i') }}</p>

                    <!-- Affichage des tickets restants -->
                    <div class="mb-4">
                        <p class="text-gray-800 font-semibold">
                            Tickets restants: 
                            @if($event->available_tickets > 0)
                                <span class="text-green-600">{{ $event->available_tickets }}</span>
                            @else
                                <span class="text-red-600">Sold Out</span>
                            @endif
                        </p>
                    </div>

                    <!-- Boutons d'actions -->
                    <div class="flex flex-wrap gap-4 mt-4">
                        <!-- Bouton Modifier -->
                        <a href="{{ route('events.edit', $event->id) }}" class="flex items-center bg-yellow-500 text-white px-4 py-2 rounded-full shadow-md hover:bg-yellow-600 transition duration-300">
                            <i class="fas fa-edit mr-2"></i> Modifier
                        </a>

                        <!-- Bouton Supprimer avec SweetAlert -->
                        <button onclick="confirmDeletion('{{ route('events.destroy', $event->id) }}')" class="flex items-center bg-red-500 text-white px-4 py-2 rounded-full shadow-md hover:bg-red-600 transition duration-300">
                            <i class="fas fa-trash-alt mr-2"></i> Supprimer
                        </button>

                        <!-- Bouton Voir les indices -->
                        <a href="{{ route('clues.index', $event->id) }}" class="flex items-center bg-blue-500 text-white px-4 py-2 rounded-full shadow-md hover:bg-blue-600 transition duration-300">
                            <i class="fas fa-search mr-2"></i> Voir les indices
                        </a>

                        <!-- Bouton Voir les participants intéressés -->
                        <a href="{{ route('participants.interested', $event->id) }}" class="flex items-center bg-gray-600 text-white px-4 py-2 rounded-full shadow-md hover:bg-gray-700 transition duration-300">
                            <i class="fas fa-users mr-2"></i> Voir les participants
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <!-- Message si aucun événement trouvé -->
        <p class="text-lg text-gray-600 mt-6">Aucun événement trouvé.</p>
    @endif
</div>

<!-- Script SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDeletion(url) {
        Swal.fire({
            title: 'Êtes-vous sûr ?',
            text: "Cette action est irréversible.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Oui, supprimer',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.createElement('form');
                form.action = url;
                form.method = 'POST';
                form.innerHTML = `@csrf @method('DELETE')`;
                document.body.appendChild(form);
                form.submit();
            }
        });
    }
</script>
@endsection
