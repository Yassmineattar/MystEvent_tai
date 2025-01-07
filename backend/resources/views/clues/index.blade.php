@extends('layouts.app')

@section('title', 'Liste des indices')

@section('content')
<div class="max-w-6xl mx-auto mt-12 bg-white shadow-lg rounded-lg p-10">
    <!-- Titre principal -->
    <div class="text-center mb-10">
        <h1 class="text-4xl font-extrabold text-[#5D3F6B]">🔍 Indices de l'Événement</h1>
        <h2 class="text-2xl font-semibold text-gray-600 mt-2">{{ $event->title }}</h2>
    </div>

    <!-- Message de succès -->
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-6 shadow-md">
            {{ session('success') }}
        </div>
    @endif

    <!-- Vérification du nombre d'indices -->
    @if($clues->count() < 4)
        <!-- Bouton Ajouter un nouvel indice -->
        <div class="text-right mb-8">
            <a href="{{ route('clues.create', $event->id) }}" class="bg-gradient-to-r from-[#5D3F6B] to-[#9B4F96] text-white px-6 py-3 rounded-full font-medium shadow-md hover:shadow-xl transition duration-300">
                ➕ Ajouter un nouvel indice
            </a>
        </div>
    @else
        <!-- Message de limite atteinte -->
        <div class="bg-yellow-100 text-yellow-800 p-4 rounded-lg mb-6 shadow-md text-center">
            🚫 Vous avez déjà ajouté 4 indices majeurs pour cet événement. Vous ne pouvez pas en ajouter davantage.
        </div>
    @endif

    <!-- Liste des indices -->
    @if($clues->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($clues as $clue)
                <div class="bg-[#F1E8E1] text-[#5D3F6B] p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                    <p class="text-lg font-medium mb-4">{{ $clue->content }}</p>
                    <div class="flex justify-between items-center gap-4">
                        <!-- Bouton Modifier -->
                        <a href="{{ route('clues.edit', [$event->id, $clue->id]) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-full font-medium hover:bg-yellow-600 transition duration-300">
                            ✏️ Modifier
                        </a>

                        <!-- Bouton Supprimer avec SweetAlert -->
                        <button onclick="confirmDeletion('{{ route('clues.destroy', [$event->id, $clue->id]) }}')" class="bg-red-500 text-white px-4 py-2 rounded-full font-medium hover:bg-red-600 transition duration-300">
                            🗑️ Supprimer
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-lg text-gray-600 text-center">Aucun indice trouvé.</p>
    @endif

    <!-- Bouton Retour aux événements -->
    <div class="text-right mt-12">
        <a href="{{ route('events.index') }}" class="bg-[#5D3F6B] text-white px-6 py-3 rounded-full font-medium shadow-md hover:bg-[#9B4F96] transition duration-300">
            🔙 Retour aux événements
        </a>
    </div>
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
                form.innerHTML = `
                    @csrf
                    @method('DELETE')
                `;
                document.body.appendChild(form);
                form.submit();
            }
        });
    }
</script>
@endsection
