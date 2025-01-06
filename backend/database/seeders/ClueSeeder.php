<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Clue;

class ClueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $clues = [
            // Indices pour "Soirée Masquerade Ball"
            ['content' => 'Le lieu est une salle située près de la rivière Seine.', 'event_id' => 1],
            ['content' => 'Le mot de passe à l\'entrée est "Mystère".', 'event_id' => 1],
            ['content' => 'Apportez un masque, c\'est obligatoire pour entrer.', 'event_id' => 1],
            ['content' => 'Un photographe sera présent pour immortaliser la soirée.', 'event_id' => 1],

            // Indices pour "Week-end aventure - Plage secrète"
            ['content' => 'La plage est située dans le sud du pays.', 'event_id' => 2],
            ['content' => 'Vous devez traverser une forêt pour y accéder.', 'event_id' => 2],
            ['content' => 'N’oubliez pas d’apporter votre maillot de bain et des lunettes de soleil.', 'event_id' => 2],
            ['content' => 'Un feu de camp est prévu le soir avec des surprises.', 'event_id' => 2],

            // Indices pour "Club de lecture - Enquête littéraire"
            ['content' => 'Le livre sélectionné est un roman policier écrit par une femme célèbre.', 'event_id' => 3],
            ['content' => 'L\'intrigue se déroule dans un train célèbre.', 'event_id' => 3],
            ['content' => 'Le titre du livre contient le mot "Orient".', 'event_id' => 3],
            ['content' => 'Un invité spécial sera présent pour discuter du livre.', 'event_id' => 3],
        ];

        foreach ($clues as $clue) {
            Clue::create($clue);
        }
    }
}
