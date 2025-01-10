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
                <div class="relative w-full h-full bg-cover bg-center" style="background-image: url('https://images.squarespace-cdn.com/content/v1/5aadc54285ede1bd72181a3a/1521339647830-LKHTH62ZRY5TCGVCW81P/shutterstock_538256848.jpg?format=1500w');">
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-center text-white">
                        <h1 class="text-7xl font-bold mb-6 text-white">Événement d'Art Numérique Immersif</h1>
                        <p class="text-xl mb-8 px-8">Vivez une expérience unique où l'art numérique prend vie sous forme interactive et immersive. Explorez des créations visuelles et sonores qui repoussent les frontières de l'imagination. Un voyage sensoriel à ne pas manquer !</p>
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
    <h2 class="text-4xl font-semibold text-center text-[#5D3F6B] mb-12 font-poppins">
        Découvrez nos fonctionnalités uniques
    </h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
        
        <!-- Fonctionnalité 1 : Organisateur -->
        <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl hover:scale-105 transition duration-300 ease-in-out text-center transform hover:translate-y-2">
            <img src="https://i.pinimg.com/736x/08/4c/33/084c334578eb54c4d0ea0dbe3dc6979a.jpg" alt="Créer des événements" class="h-36 w-60 mx-auto mb-4 object-cover rounded-lg">
            <h3 class="text-xl font-semibold text-[#5D3F6B] mb-2">Créez vos événements</h3>
            <p class="text-gray-600 mt-2">Organisez et personnalisez des événements surprises pour apporter du fun à votre communauté.</p>
        </div>

        <!-- Fonctionnalité 2 : Participant -->
        <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl hover:scale-105 transition duration-300 ease-in-out text-center transform hover:translate-y-2">
            <img src="https://i.pinimg.com/736x/4d/7f/20/4d7f202a0d827d6da2d5aea02e1320e0.jpg" alt="Rejoindre des événements" class="h-36 w-60 mx-auto mb-4 object-cover rounded-lg">
            <h3 class="text-xl font-semibold text-[#5D3F6B] mb-2">Participez à des événements mystères</h3>
            <p class="text-gray-600 mt-2">Rejoignez des événements secrets, résolvez des énigmes et vivez des expériences inoubliables.</p>
        </div>

        <!-- Fonctionnalité 3 : Quizz -->
        <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl hover:scale-105 transition duration-300 ease-in-out text-center transform hover:translate-y-2">
            <img src="https://i.pinimg.com/736x/2d/73/b9/2d73b9f67f338abbf3866a1e60d62060.jpg" alt="Répondre à des quizz" class="h-36 w-60 mx-auto mb-4 object-cover rounded-lg">
            <h3 class="text-xl font-semibold text-[#5D3F6B] mb-2">Répondez aux quizz</h3>
            <p class="text-gray-600 mt-2">Testez vos connaissances, débloquez des indices et gagnez des tickets pour des événements exclusifs !</p>
        </div>

    </div>
</div>

<!-- Call to Action Section -->
<!-- Call to Action Section with Fireworks and Scrolling Images -->
<div style="height: 400px;" class="relative bg-[#5D3F6B] text-white py-16 mt-16 text-center overflow-hidden shadow-xl ">
    <!-- Fireworks Animation Background -->
    <div class="absolute inset-0 bg-gradient-to-r from-[#5D3F6B] to-[#9B4F96] opacity-70 z-0"></div>
    <div id="fireworks-container" class="absolute inset-0 z-0"></div>
    <!-- Animated Scrolling Images -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0">
        <div class="flex w-max animate-scrollImages">
            <!-- Images qui défilent -->
            <img src="https://i.pinimg.com/736x/91/2f/68/912f6806c19e94a1073f218672af5d0f.jpg" class="object-cover h-full w-1/3" alt="Image 1" />
            <img src="https://media.istockphoto.com/id/1397223333/fr/photo/des-amis-assis-autour-dun-feu-de-joie-sur-la-plage-le-soir.jpg?s=612x612&w=0&k=20&c=8HJFn6uc1md_RMO2j-OR4hSFqJgS_pBMGWKhDSvOmpw=" class="object-cover h-full w-1/3" alt="Image 2" />
            <img src="https://i.pinimg.com/736x/dc/e4/30/dce4309363fa29fea2de08cd51db45cc.jpg" class="object-cover h-full w-1/3" alt="Image 3" />
            <img src="https://i.pinimg.com/736x/91/2f/68/912f6806c19e94a1073f218672af5d0f.jpg" class="object-cover h-full w-1/3" alt="Image 1" />
        </div>
    </div>

    <h2 class="text-5xl font-extrabold mb-4 text-shadow-lg z-10 relative">Rejoignez l'aventure maintenant !</h2>
    <p class="text-xl mb-8 font-medium z-10 relative">Inscrivez-vous dès aujourd'hui et choisissez votre rôle : Organisateur ou Participant, c'est à vous de jouer !</p>
    <div class="flex justify-center space-x-6 z-10 relative">
        <a href="{{ route('register') }}" class="bg-white text-[#5D3F6B] px-8 py-4 rounded-full font-bold shadow-lg hover:scale-110 hover:bg-[#F1E8E1] transform transition duration-300">
            S'inscrire
        </a>
    </div>
</div>

<!-- Fireworks Animation Script -->
<script>
    // Simple fireworks animation using particles.js (you can replace this with any animation library)
    var fireworksContainer = document.getElementById('fireworks-container');
    particlesJS(fireworksContainer, {
        particles: {
            number: { value: 30 },
            size: { value: 3 },
            opacity: { value: 0.5, random: true },
            line_linked: { enable: false },
            move: {
                speed: 4,
                direction: "top",
                out_mode: "out",
                random: true
            }
        },
        interactivity: {
            events: { onhover: { enable: true, mode: "repulse" } }
        }
    });
</script>

<!-- CSS Animation for continuous scrolling images -->
<style>
    @keyframes scrollImages {
        0% { transform: translateX(0); }
        100% { transform: translateX(-33.33%); }
    }

    .animate-scrollImages {
        animation: scrollImages 30s linear infinite;
    }

    /* Assurez-vous que le conteneur est assez large pour contenir toutes les images */
    .flex {
        display: flex;
    }
    .object-cover {
        object-fit: cover; /* Garantir que les images couvrent l'espace sans être déformées */
    }

    .h-full {
        height: 100%; /* L'image occupe toute la hauteur du conteneur */
    }

    .w-1\/3 {
        width: 33.33%; /* Chaque image occupe un tiers de la largeur du conteneur */
    }
   

   
</style>




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
</script>


</div>

@endsection