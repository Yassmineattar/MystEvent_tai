<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Quiz;

class QuizSeeder extends Seeder
{
    

public function run()
{
    Quiz::create([
        'question' => 'Quelle est la capitale de la France ?',
        'choice_1' => 'Paris',
        'choice_2' => 'Londres',
        'choice_3' => 'Berlin',
        'correct_answer' => 'Paris',
    ]);

    Quiz::create([
        'question' => 'Quel est le plus grand océan du monde ?',
        'choice_1' => 'Atlantique',
        'choice_2' => 'Pacifique',
        'choice_3' => 'Indien',
        'correct_answer' => 'Pacifique',
    ]);

    Quiz::create([
        'question' => 'En quelle année l\'homme a-t-il marché sur la Lune pour la première fois ?',
        'choice_1' => '1969',
        'choice_2' => '1972',
        'choice_3' => '1959',
        'correct_answer' => '1969',
    ]);

    Quiz::create([
        'question' => 'Qui a peint la Joconde ?',
        'choice_1' => 'Léonard de Vinci',
        'choice_2' => 'Pablo Picasso',
        'choice_3' => 'Claude Monet',
        'correct_answer' => 'Léonard de Vinci',
    ]);

    Quiz::create([
        'question' => 'Quelle est la plus grande pyramide d\'Égypte ?',
        'choice_1' => 'Pyramide de Khéops',
        'choice_2' => 'Pyramide de Khéphren',
        'choice_3' => 'Pyramide de Mykérinos',
        'correct_answer' => 'Pyramide de Khéops',
    ]);

    Quiz::create([
        'question' => 'Quelle est la couleur du sang des homards ?',
        'choice_1' => 'Bleu',
        'choice_2' => 'Rouge',
        'choice_3' => 'Vert',
        'correct_answer' => 'Bleu',
    ]);

    Quiz::create([
        'question' => 'Quel pays a la plus grande superficie ?',
        'choice_1' => 'Chine',
        'choice_2' => 'Russie',
        'choice_3' => 'États-Unis',
        'correct_answer' => 'Russie ',
    ]);

    Quiz::create([
        'question' => 'Quel est l\'élément chimique dont le symbole est O ?',
        'choice_1' => 'Or',
        'choice_2' => 'Oxygène',
        'choice_3' => 'Osmium',
        'correct_answer' => 'Oxygène',
    ]);

    Quiz::create([
        'question' => 'Quel est le plus grand désert du monde ?',
        'choice_1' => 'Sahara',
        'choice_2' => 'Désert de Gobi',
        'choice_3' => 'Antarctique',
        'correct_answer' => 'Antarctique',
    ]);

    Quiz::create([
        'question' => 'Qui a inventé le téléphone ?',
        'choice_1' => 'Thomas Edison',
        'choice_2' => 'Alexander Graham Bell',
        'choice_3' => 'Nikola Tesla',
        'correct_answer' => 'Alexander Graham Bell',
    ]);
    Quiz::create([
        'question' => 'Quelle est la plus grande planète du système solaire ?',
        'choice_1' => 'Terre',
        'choice_2' => 'Mars',
        'choice_3' => 'Jupiter',
        'correct_answer' => 'Jupiter',
    ]);
    
    Quiz::create([
        'question' => 'Quel est l\'animal terrestre le plus rapide ?',
        'choice_1' => 'Guépard',
        'choice_2' => 'Lion',
        'choice_3' => 'Éléphant',
        'correct_answer' => 'Guépard',
    ]);
    
    Quiz::create([
        'question' => 'Quel est le plus grand pays du monde par superficie ?',
        'choice_1' => 'Canada',
        'choice_2' => 'Russie',
        'choice_3' => 'Chine',
        'correct_answer' => 'Russie',
    ]);
    
    Quiz::create([
        'question' => 'Quelle est la langue la plus parlée au monde ?',
        'choice_1' => 'Espagnol',
        'choice_2' => 'Anglais',
        'choice_3' => 'Mandarin',
        'correct_answer' => 'Mandarin',
    ]);
    
    Quiz::create([
        'question' => 'Dans quel pays se trouve la ville de Machu Picchu ?',
        'choice_1' => 'Brésil',
        'choice_2' => 'Pérou',
        'choice_3' => 'Argentine',
        'correct_answer' => 'Pérou',
    ]);
    
    Quiz::create([
        'question' => 'Quel est l\'océan qui borde la côte est des États-Unis ?',
        'choice_1' => 'Océan Atlantique',
        'choice_2' => 'Océan Pacifique',
        'choice_3' => 'Océan Indien',
        'correct_answer' => 'Océan Atlantique',
    ]);
    
    Quiz::create([
        'question' => 'Quel est l\'élément chimique dont le symbole est Au ?',
        'choice_1' => 'Argon',
        'choice_2' => 'Aluminium',
        'choice_3' => 'Or',
        'correct_answer' => 'Or',
    ]);
    
    Quiz::create([
        'question' => 'Qui a écrit la pièce de théâtre "Roméo et Juliette" ?',
        'choice_1' => 'William Shakespeare',
        'choice_2' => 'Victor Hugo',
        'choice_3' => 'Molière',
        'correct_answer' => 'William Shakespeare',
    ]);
    
    Quiz::create([
        'question' => 'En quelle année a eu lieu la Révolution française ?',
        'choice_1' => '1789',
        'choice_2' => '1799',
        'choice_3' => '1801',
        'correct_answer' => '1789',
    ]);
    
    Quiz::create([
        'question' => 'Quel est l\'inventeur du vaccin contre la variole ?',
        'choice_1' => 'Louis Pasteur',
        'choice_2' => 'Edward Jenner',
        'choice_3' => 'Marie Curie',
        'correct_answer' => 'Edward Jenner',
    ]);
    
}


}
