<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Event;

class TicketFactory extends Factory
{
    protected $model = Ticket::class;

    public function definition()
    {
        return [
            'event_id' => Event::factory(), // Lien avec l'événement
            'user_id' => User::factory(),  // Lien avec l'utilisateur
            'email' => $this->faker->unique()->safeEmail(),
            'code' => $this->faker->unique()->randomNumber(6), // Génère un code unique pour chaque ticket
            'status' => $this->faker->randomElement(['valid', 'used', 'expired']), // Statut du ticket
        ];
    }
}
