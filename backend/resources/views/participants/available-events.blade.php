@extends('layouts.app')

@section('title', 'Événements disponibles')

@section('content')
<div class="max-w-6xl mx-auto mt-12 bg-white shadow-lg rounded-lg p-8">
    <!-- Titre de la page -->
    <h1 class="text-4xl font-bold text-[#5D3F6B] mb-8">Événements Disponibles 🎉</h1>

    <!-- Vérification des événements -->
    @if($events->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full border-collapse bg-white shadow-sm rounded-lg">
                <thead class="bg-[#5D3F6B] text-white">
                    <tr>
                        <th class="py-4 px-6 text-left">Titre</th>
                        <th class="py-4 px-6 text-left">Date de l'événement</th>
                        <th class="py-4 px-6 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($events as $event)
                        <tr class="hover:bg-gray-100 transition duration-200">
                            <td class="py-4 px-6">{{ $event->title }}</td>
                            <td class="py-4 px-6">{{ $event->eventDate->format('d/m/Y H:i') }}</td>
                            <td class="py-4 px-6 text-center">
                                <form action="{{ route('participants.joinEvent', $event->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-[#5D3F6B] text-white px-4 py-2 rounded-lg font-medium shadow-md hover:bg-[#9B4F96] transition duration-300">
                                        Rejoindre
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <!-- Message si aucun événement disponible -->
        <p class="text-gray-600 text-lg text-center mt-8">Aucun événement disponible pour le moment.</p>
    @endif
</div>
<br>
@endsection
