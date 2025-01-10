@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-12 bg-white shadow-lg rounded-lg p-8">
    <h1 class="text-4xl font-bold text-[#5D3F6B] mb-8">Modifier mes informations</h1>

    <!-- Message de succès si les informations ont été mises à jour -->
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulaire de mise à jour des informations utilisateur -->
    <form action="{{ route('user.update') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-lg font-medium text-gray-700 mb-2">Nom</label>
            <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-[#5D3F6B] focus:border-[#5D3F6B]" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-lg font-medium text-gray-700 mb-2">Email</label>
            <input type="email" name="email" id="email" value="{{ Auth::user()->email }}" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-[#5D3F6B] focus:border-[#5D3F6B]" required>
        </div>

        <div class="mb-4">
            <label for="password" class="block text-lg font-medium text-gray-700 mb-2">Nouveau mot de passe (optionnel)</label>
            <input type="password" name="password" id="password" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-[#5D3F6B] focus:border-[#5D3F6B]">
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block text-lg font-medium text-gray-700 mb-2">Confirmer le mot de passe</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-[#5D3F6B] focus:border-[#5D3F6B]">
        </div>

        <div class="text-right">
            <button type="submit" class="bg-[#5D3F6B] text-white px-6 py-3 rounded-full font-semibold shadow-md hover:bg-[#9B4F96] transition duration-300">
                Enregistrer les modifications
            </button>
        </div>
    </form>
</div>
<br>
@endsection
