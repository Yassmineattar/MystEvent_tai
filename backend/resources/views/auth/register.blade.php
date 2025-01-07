@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white shadow-lg rounded-lg p-8 mt-10">
    <h2 class="text-2xl font-bold text-center text-[#5D3F6B] mb-6">Inscription</h2>

    <!-- Message flash de succès -->
    @if(session('success'))
        <div class="bg-[#C99E9A] text-white rounded-md p-4 mb-6">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulaire d'inscription -->
    <form action="{{ route('register') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Champ Nom -->
        <div>
            <label for="name" class="block text-sm font-medium text-[#5D3F6B]">Nom</label>
            <input type="text" name="name" id="name" class="w-full mt-1 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#9B4F96]" value="{{ old('name') }}" placeholder="Entrez votre nom" required>
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Champ Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-[#5D3F6B]">Email</label>
            <input type="email" name="email" id="email" class="w-full mt-1 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#9B4F96]" value="{{ old('email') }}" placeholder="Entrez votre email" required>
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Champ Mot de Passe -->
        <div>
            <label for="password" class="block text-sm font-medium text-[#5D3F6B]">Mot de passe</label>
            <input type="password" name="password" id="password" class="w-full mt-1 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#9B4F96]" placeholder="Choisissez un mot de passe" required>
            @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Champ Confirmer le Mot de Passe -->
        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-[#5D3F6B]">Confirmer le mot de passe</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="w-full mt-1 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#9B4F96]" placeholder="Confirmez votre mot de passe" required>
        </div>

        <!-- Champ Type d'Utilisateur -->
        <div>
            <label for="user_type" class="block text-sm font-medium text-[#5D3F6B]">Type d'utilisateur</label>
            <select name="user_type" id="user_type" class="w-full mt-1 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#9B4F96]">
                <option value="organizer" {{ old('user_type') == 'organizer' ? 'selected' : '' }}>Organisateur</option>
                <option value="participator" {{ old('user_type') == 'participator' ? 'selected' : '' }}>Participant</option>
            </select>
            @error('user_type')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Bouton de Soumission -->
        <div>
            <button type="submit" class="w-full bg-[#5D3F6B] text-white py-3 rounded-md text-sm font-medium hover:bg-[#9B4F96] transition duration-200">
                S'inscrire
            </button>
        </div>
    </form>
</div>
@endsection
