@extends('layouts.app')

@section('title', 'Bienvenue sur MystEvent')

@section('content')
<!-- Carrousel -->
<div class="relative w-full max-w-full mx-auto ">
    <div class="overflow-hidden">
        <div id="carousel" class="flex transition-transform duration-300">
            <!-- Slide 1 : Texte de bienvenue -->
            <div class="w-full flex-shrink-0 h-screen">
                <div class="relative w-full h-full bg-cover bg-center" style="background-image: url('https://c.pxhere.com/photos/ee/62/audience_band_blur_bokeh_celebration_club_concert_crowd-1557333.jpg!d');">
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-center text-white">
                        <h1 id="dynamic-text" class="text-7xl font-bold mb-6 text-white font-poppins py-12"></h1>
                        <p class="text-2xl mb-8 font-playfair px-16">Plongez dans des événements surprises où chaque moment compte ! Participez à des quiz interactifs et obtenez des indices exclusifs pour découvrir l'événement mystérieux qui vous attend. Résolvez les énigmes, débloquez des secrets et vivez une expérience unique ! Rejoignez l'aventure dès maintenant sur MystEvent !</p>
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
            </div>

            <!-- Slide 2 : Image et texte supplémentaires -->
            
<div class="w-full flex-shrink-0 h-screen">
    <div class="relative w-full h-full bg-cover bg-center" style="background-image: url('https://static.vecteezy.com/ti/photos-gratuite/t1/38448832-ai-genere-femme-avec-or-masque-et-plumes-elegant-mardi-gras-mascarade-balle-dans-manoir-ai-genere-photo.jpg');">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-center text-white">
            <!-- Affichage du nom de l'événement -->
            <h1 class="text-7xl font-bold mb-6 text-white font-poppins">{{ $event->title }}</h1>
            <p class="text-2xl mb-8 font-playfair px-12">{{ $event->description }}</p>
            
            <!-- Compteur de jours restants -->
            <div id="countdown" class="text-center">
    <div class="countdown-item">
        <div id="days" class="countdown-number">00</div>
        <div class="countdown-label">Jours</div>
    </div>
    <div class="countdown-item">
        <div id="hours" class="countdown-number">00</div>
        <div class="countdown-label">Heures</div>
    </div>
    <div class="countdown-item">
        <div id="minutes" class="countdown-number">00</div>
        <div class="countdown-label">Minutes</div>
    </div>
    <div class="countdown-item">
        <div id="seconds" class="countdown-number">00</div>
        <div class="countdown-label">Secondes</div>
    </div>
</div>

<style>
    #countdown {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
    }

    .countdown-item {
        text-align: center;
    }

    .countdown-number {
        font-size: 3rem;
        font-weight: bold;
        color: #FFFFFF;
        background-color: rgba(0, 0, 0, 0.5);
        padding: 20px;
        border-radius: 10px;
        font-family: 'Roboto Mono', monospace;
    }

    .countdown-label {
        font-size: 1rem;
        color: #FFFFFF;
        margin-top: 5px;
    }
</style>

<script>
    const eventDate = new Date("2025-02-14T20:00:00").getTime();
    const countdownElement = document.getElementById("countdown");

    function updateCountdown() {
        const now = new Date().getTime();
        const distance = eventDate - now;

        if (distance <= 0) {
            clearInterval(countdownInterval);
            countdownElement.innerHTML = "L'événement commence maintenant!";
            return;
        }

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("days").innerHTML = days < 10 ? "0" + days : days;
        document.getElementById("hours").innerHTML = hours < 10 ? "0" + hours : hours;
        document.getElementById("minutes").innerHTML = minutes < 10 ? "0" + minutes : minutes;
        document.getElementById("seconds").innerHTML = seconds < 10 ? "0" + seconds : seconds;
    }

    const countdownInterval = setInterval(updateCountdown, 1000);
</script>

        </div>
    </div>
</div>


            <!-- Slide 3 : Autre texte -->
            <div class="w-full flex-shrink-0 h-screen">
                <div class="relative w-full h-full bg-cover bg-center" style="background-image: url('https://via.placeholder.com/800x400');">
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-center text-white">
                        <h1 class="text-7xl font-bold mb-6 text-white">Rejoignez l'Aventure</h1>
                        <p class="text-xl mb-8 px-8">Résolvez des énigmes et débloquez des indices pour vos événements mystères !</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Flèches de navigation (cercle avec flèche) -->
<!-- Flèches de navigation (cercle plus petit avec flèche) -->
<button id="prev-btn" class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-transparent text-white hover:bg-[#5D3F6B] p-3 rounded-full border-2 border-white hover:border-[#5D3F6B] transition duration-300">
    &#8592;
</button>

<button id="next-btn" class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-transparent text-white hover:bg-[#5D3F6B] p-3 rounded-full border-2 border-white hover:border-[#5D3F6B] transition duration-300">
    &#8594;
</button>



</div>


    

<!-- Fonctionnalités Section -->
<div class="max-w-7xl mx-auto mt-16 px-6 lg:px-8">
    <h2 class="text-4xl font-semibold text-center text-[#5D3F6B] mb-12">
        Découvrez nos fonctionnalités
    </h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
        
        <!-- Fonctionnalité 1 : Organisateur -->
        <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl hover:scale-105 transition duration-300 ease-in-out text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-[#5D3F6B] mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <h3 class="text-xl font-semibold text-[#5D3F6B] mb-2">Créer des événements</h3>
            <p class="text-gray-600 mt-2">Créez et gérez des événements surprises pour votre communauté.</p>
        </div>

        <!-- Fonctionnalité 2 : Participant -->
        <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl hover:scale-105 transition duration-300 ease-in-out text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-[#5D3F6B] mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12h7m-7-6h4m-4 12h4" />
            </svg>
            <h3 class="text-xl font-semibold text-[#5D3F6B] mb-2">Rejoindre des événements</h3>
            <p class="text-gray-600 mt-2">Participez à des événements mystères et découvrez des expériences uniques.</p>
        </div>

        <!-- Fonctionnalité 3 : Quizz -->
        <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl hover:scale-105 transition duration-300 ease-in-out text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-[#5D3F6B] mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-5a2 2 0 012-2h1m5 7v-5a2 2 0 00-2-2h-1" />
            </svg>
            <h3 class="text-xl font-semibold text-[#5D3F6B] mb-2">Participez à des quizz</h3>
            <p class="text-gray-600 mt-2">Débloquez des indices et gagnez des tickets en résolvant les quizz !</p>
        </div>

    </div>
</div>

<!-- Call to Action Section -->
<div class="bg-[#5D3F6B] text-white py-12 mt-16 text-center">
    <h2 class="text-3xl font-semibold mb-4">Prêt à rejoindre l'aventure ?</h2>
    <p class="text-lg mb-8">Créez un compte dès aujourd'hui et choisissez votre rôle : Organisateur ou Participant.</p>
    <div class="flex justify-center space-x-4">
        <a href="{{ route('register') }}" class="bg-white text-[#5D3F6B] px-6 py-3 rounded-lg font-semibold hover:bg-[#F1E8E1] transition duration-300">
            S'inscrire
        </a>
    </div>
</div>

    <br>
    <script>
    const text = "Bienvenue sur MystEvent";
    let index = 0;
    const textElement = document.getElementById("dynamic-text");

    function typeWriter() {
        if (index < text.length) {
            textElement.innerHTML += text.charAt(index);
            index++;
            setTimeout(typeWriter, 100);
        }
    }

    window.onload = typeWriter;
</script>
<script>
    const prevBtn = document.getElementById("prev-btn");
    const nextBtn = document.getElementById("next-btn");
    const carousel = document.getElementById("carousel");
    let currentIndex = 0;

    const slides = carousel.children;
    const totalSlides = slides.length;

    function goToSlide(index) {
        if (index < 0) {
            currentIndex = totalSlides - 1;
        } else if (index >= totalSlides) {
            currentIndex = 0;
        } else {
            currentIndex = index;
        }

        // Calculer le déplacement horizontal des slides
        const offset = -currentIndex * 100;
        carousel.style.transform = `translateX(${offset}%)`;
    }

    prevBtn.addEventListener("click", () => {
        goToSlide(currentIndex - 1);
    });

    nextBtn.addEventListener("click", () => {
        goToSlide(currentIndex + 1);
    });

    // Initialiser le carrousel
    goToSlide(currentIndex);
</script>


</div>

@endsection
