<?php
namespace Database\Factories;

use App\Models\Clue;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClueFactory extends Factory
{
    protected $model = Clue::class;

    public function definition()
    {
        return [
            'event_id' => \App\Models\Event::factory(),
            'content' => $this->faker->sentence,
            // ajoute d'autres champs ici
        ];
    }
}
