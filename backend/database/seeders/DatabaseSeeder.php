<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Event;
use App\Models\Clue;
use App\Models\Ticket;
use App\Models\EventUser;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Seeder pour les utilisateurs
        User::factory(5)->create(); // Crée 5 utilisateurs

        // Seeder pour les événements
        Event::factory(4)->create(); // Crée 4 événements

        // Seeder pour les indices (Clues)
        Clue::factory(10)->create(); // Crée 10 indices

        // Seeder pour les tickets
        Ticket::factory(10)->create(); // Crée 10 tickets

        // Créer des relations entre événements et utilisateurs (EventUser)
        EventUser::factory(2)->create(); // Crée des relations entre utilisateurs et événements
    }
}
