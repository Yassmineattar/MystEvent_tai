@extends('layouts.app')

@section('title', 'Bienvenue sur MystEvent')

@section('content')
<div class="bg-gray-100 min-h-screen">
    <!-- Hero Section -->
    <div class="relative bg-cover bg-center h-screen" style="background-image: url('https://plus.unsplash.com/premium_photo-1661306437817-8ab34be91e0c?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8JUMzJUE5diVDMyVBOW5lbWVudHN8ZW58MHx8MHx8fDA%3D');">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-center text-white">
            <h1 class="text-5xl font-bold mb-6">Bienvenue sur MystEvent 🎉</h1>
            <p class="text-xl mb-8">Découvrez, organisez et participez à des événements surprises uniques.</p>
            <div class="flex space-x-4">
                <a href="{{ route('login') }}" class="bg-white text-[#5D3F6B] px-6 py-3 rounded-lg font-semibold hover:bg-[#F1E8E1] transition duration-300">
                    Se connecter
                </a>
                <a href="{{ route('register') }}" class="bg-[#F1E8E1] text-[#5D3F6B] px-6 py-3 rounded-lg font-semibold hover:bg-[#D9C7C7] transition duration-300">
                    S'inscrire
                </a>
            </div>
        </div>
    </div>

    <!-- Fonctionnalités Section -->
    <div class="max-w-7xl mx-auto mt-16 px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center text-[#5D3F6B] mb-12">Découvrez nos fonctionnalités</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            <!-- Fonctionnalité 1 : Organisateur -->
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-[#5D3F6B] mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <h3 class="text-lg font-bold text-[#5D3F6B]">Créer des événements</h3>
                <p class="text-gray-600 mt-2">Créez et gérez des événements surprises pour votre communauté.</p>
            </div>

            <!-- Fonctionnalité 2 : Participant -->
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-[#5D3F6B] mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12h7m-7-6h4m-4 12h4" />
                </svg>
                <h3 class="text-lg font-bold text-[#5D3F6B]">Rejoindre des événements</h3>
                <p class="text-gray-600 mt-2">Participez à des événements mystères et découvrez des expériences uniques.</p>
            </div>

            <!-- Fonctionnalité 3 : Quizz -->
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-[#5D3F6B] mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-5a2 2 0 012-2h1m5 7v-5a2 2 0 00-2-2h-1" />
                </svg>
                <h3 class="text-lg font-bold text-[#5D3F6B]">Participez à des quizz</h3>
                <p class="text-gray-600 mt-2">Débloquez des indices et gagnez des tickets en résolvant les quizz !</p>
            </div>
        </div>
    </div>

    <!-- Call to Action Section -->
    <div class="bg-gradient-to-r from-[#5D3F6B] to-[#9B4F96] text-white py-12 mt-16 text-center">
        <h2 class="text-3xl font-bold mb-4">Prêt à rejoindre l'aventure ?</h2>
        <p class="text-lg mb-8">Créez un compte dès aujourd'hui et choisissez votre rôle : Organisateur ou Participant.</p>
        <div class="flex justify-center space-x-4">
            <a href="{{ route('register') }}" class="bg-white text-[#5D3F6B] px-6 py-3 rounded-lg font-semibold hover:bg-[#F1E8E1] transition duration-300">
                S'inscrire
            </a>
        </div>
    </div>
    <br>
</div>
@endsection
