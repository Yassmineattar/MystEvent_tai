<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $events = [
            [
                'title' => 'Soirée Masquerade Ball',
                'description' => 'Venez vivre une soirée inoubliable avec des costumes élégants et des masques mystérieux.',
                'eventDate' => '2025-02-14 20:00:00',
                'organizerId' => 2,
                'available_tickets'=> 100,           
            ],
            [
                'title' => 'Week-end aventure - Plage secrète',
                'description' => 'Rejoignez-nous pour un week-end d’aventure et de détente sur une plage cachée.',
                'eventDate' => '2025-06-10 15:00:00',
                'organizerId' => 2,
                'available_tickets'=> 100, 
            ],
            [
                'title' => 'Club de lecture - Enquête littéraire',
                'description' => 'Participez à notre club de lecture mensuel, cette fois sur le thème des romans policiers.',
                'eventDate' => '2025-03-05 18:00:00',
                'organizerId' => 2,
                'available_tickets'=> 100, 
            ],
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}
