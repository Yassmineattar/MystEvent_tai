@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white shadow-lg rounded-lg p-8 mt-10">
    <h2 class="text-2xl font-bold text-center text-[#5D3F6B] mb-6">Connexion</h2>

    <!-- Affichage des erreurs -->
    @if ($errors->any())
        <div class="bg-[#c35e54] text-white rounded-md p-4 mb-6">
            @foreach ($errors->all() as $error)
                <p class="text-sm">{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST" class="space-y-6">
        @csrf
        <!-- Champ Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-[#5D3F6B]">Email</label>
            <input type="email" name="email" id="email" class="w-full mt-1 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#9B4F96]" value="{{ old('email') }}" required>
        </div>

        <!-- Champ Mot de Passe -->
        <div>
            <label for="password" class="block text-sm font-medium text-[#5D3F6B]">Mot de passe</label>
            <input type="password" name="password" id="password" class="w-full mt-1 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#9B4F96]" required>
        </div>

        <!-- Case à Cocher -->
        <div class="flex items-center">
            <input type="checkbox" name="remember" id="remember" class="h-4 w-4 text-[#9B4F96] border-gray-300 rounded focus:ring-[#9B4F96]">
            <label for="remember" class="ml-2 text-sm text-gray-600">Se souvenir de moi</label>
        </div>

        <!-- Bouton de Connexion -->
        <div>
            <button type="submit" class="w-full bg-[#5D3F6B] text-white py-3 rounded-md text-sm font-medium hover:bg-[#9B4F96] transition duration-200">
                Se connecter
            </button>
        </div>
        
    </form>
</div>
<br>
@endsection
