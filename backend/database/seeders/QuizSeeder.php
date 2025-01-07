<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quiz;

class QuizSeeder extends Seeder
{
    public function run()
    {
        // Question 1
        Quiz::create([
            'question' => 'Quel type d’événement consiste à résoudre des énigmes pour s’échapper d’une pièce ?',
            'choice_1' => 'Escape Game',
            'choice_2' => 'Chasse au trésor',
            'choice_3' => 'Blind Test',
            'correct_answer' => 'Escape Game',
        ]);

        // Question 2
        Quiz::create([
            'question' => 'Quel célèbre festival a lieu chaque année dans le désert de Black Rock, Nevada ?',
            'choice_1' => 'Burning Man',
            'choice_2' => 'Coachella',
            'choice_3' => 'Tomorrowland',
            'correct_answer' => 'Burning Man',
        ]);

        // Question 3
        Quiz::create([
            'question' => 'Quelle tradition consiste à jeter du riz sur les mariés pour leur porter chance ?',
            'choice_1' => 'Rituel de bénédiction',
            'choice_2' => 'Jet de riz',
            'choice_3' => 'Brindisi',
            'correct_answer' => 'Jet de riz',
        ]);

        // Question 4
        Quiz::create([
            'question' => 'Quel jeu de société consiste à deviner des mots ou des expressions à partir d’indices donnés ?',
            'choice_1' => 'Pictionary',
            'choice_2' => 'Scrabble',
            'choice_3' => 'Monopoly',
            'correct_answer' => 'Pictionary',
        ]);

        // Question 5
        Quiz::create([
            'question' => 'Quel accessoire est souvent utilisé dans les soirées costumées pour cacher l’identité des participants ?',
            'choice_1' => 'Masque',
            'choice_2' => 'Cagoule',
            'choice_3' => 'Chapeau',
            'correct_answer' => 'Masque',
        ]);

        // Question 6
        Quiz::create([
            'question' => 'Quelle ville accueille chaque année le plus grand carnaval du monde ?',
            'choice_1' => 'Venise',
            'choice_2' => 'Rio de Janeiro',
            'choice_3' => 'La Nouvelle-Orléans',
            'correct_answer' => 'Rio de Janeiro',
        ]);

        // Question 7
        Quiz::create([
            'question' => 'Quel célèbre événement mondial utilise une boule géante qui descend pour marquer le début de la nouvelle année ?',
            'choice_1' => 'New York Times Square',
            'choice_2' => 'Carnaval de Rio',
            'choice_3' => 'Fête de la Tour Eiffel',
            'correct_answer' => 'New York Times Square',
        ]);

        // Question 8
        Quiz::create([
            'question' => 'Quelle tradition consiste à briser une bouteille sur un bateau pour lui porter chance lors de son lancement ?',
            'choice_1' => 'Bénédiction',
            'choice_2' => 'Baptême',
            'choice_3' => 'Inauguration',
            'correct_answer' => 'Baptême',
        ]);

        // Question 9
        Quiz::create([
            'question' => 'Quelle activité consiste à résoudre des énigmes pour gagner des indices et des récompenses ?',
            'choice_1' => 'Chasse au trésor',
            'choice_2' => 'Escape Game',
            'choice_3' => 'Quizz Mystère',
            'correct_answer' => 'Chasse au trésor',
        ]);

        // Question 10
        Quiz::create([
            'question' => 'Quel est le plus grand festival de musique électronique en Belgique ?',
            'choice_1' => 'Tomorrowland',
            'choice_2' => 'Ultra Music Festival',
            'choice_3' => 'Electric Daisy Carnival',
            'correct_answer' => 'Tomorrowland',
        ]);

        // Question 11
        Quiz::create([
            'question' => 'Quel élément est souvent utilisé dans une chasse au trésor pour guider les participants ?',
            'choice_1' => 'Carte',
            'choice_2' => 'Boussole',
            'choice_3' => 'Clé',
            'correct_answer' => 'Carte',
        ]);

        // Question 12
        Quiz::create([
            'question' => 'Quel événement consiste à deviner un mot ou une phrase en mime ?',
            'choice_1' => 'Charades',
            'choice_2' => 'Pictionary',
            'choice_3' => 'Quizz',
            'correct_answer' => 'Charades',
        ]);

        // Question 13
        Quiz::create([
            'question' => 'Quel festival de musique célèbre la culture reggae à Kingston, Jamaïque ?',
            'choice_1' => 'Reggae Sumfest',
            'choice_2' => 'Burning Man',
            'choice_3' => 'Glastonbury',
            'correct_answer' => 'Reggae Sumfest',
        ]);

        // Question 14
        Quiz::create([
            'question' => 'Quel célèbre film a popularisé les bals masqués ?',
            'choice_1' => 'Eyes Wide Shut',
            'choice_2' => 'Titanic',
            'choice_3' => 'The Great Gatsby',
            'correct_answer' => 'Eyes Wide Shut',
        ]);

        // Question 15
        Quiz::create([
            'question' => 'Quel type de soirée consiste à découvrir un lieu secret dévoilé au dernier moment ?',
            'choice_1' => 'Soirée Mystère',
            'choice_2' => 'Blind Date',
            'choice_3' => 'Escape Game',
            'correct_answer' => 'Soirée Mystère',
        ]);

        // Question 16
        Quiz::create([
            'question' => 'Dans quelle ville se trouve le plus grand bal masqué d’Italie ?',
            'choice_1' => 'Venise',
            'choice_2' => 'Rome',
            'choice_3' => 'Milan',
            'correct_answer' => 'Venise',
        ]);

        // Question 17
        Quiz::create([
            'question' => 'Quelle fête célèbre la fin de l’année en jetant des fleurs dans l’océan ?',
            'choice_1' => 'Réveillon',
            'choice_2' => 'Fête d’Iemanjá',
            'choice_3' => 'Carnaval',
            'correct_answer' => 'Fête d’Iemanjá',
        ]);

                // Question 18
        Quiz::create([
            'question' => 'Quel symbole est traditionnellement utilisé pour représenter une fête surprise ?',
            'choice_1' => '🎉',
            'choice_2' => '🎂',
            'choice_3' => '🎈',
            'correct_answer' => '🎉',
        ]);

        // Question 19
        Quiz::create([
            'question' => 'Quel événement annuel célèbre le patrimoine et la culture dans le monde entier ?',
            'choice_1' => 'Journée du Patrimoine',
            'choice_2' => 'Fête de la Musique',
            'choice_3' => 'Carnaval',
            'correct_answer' => 'Journée du Patrimoine',
        ]);

        // Question 20
        Quiz::create([
            'question' => 'Quel terme désigne une réunion secrète organisée dans un lieu inconnu à l’avance ?',
            'choice_1' => 'Blind Date',
            'choice_2' => 'MystEvent',
            'choice_3' => 'Soirée Clandestine',
            'correct_answer' => 'MystEvent',
        ]);
    }
}