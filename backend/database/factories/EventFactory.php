<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'description' => $this->faker->sentence,
            'eventDate' => $this->faker->date(),
            'organizerId' => User::factory(), // Crée un utilisateur avec la factory
        ];
    }
}
