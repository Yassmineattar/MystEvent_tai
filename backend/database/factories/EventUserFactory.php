<?php
namespace Database\Factories;

use App\Models\EventUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventUserFactory extends Factory
{
    protected $model = EventUser::class;

    public function definition()
    {
        return [
            'event_id' => \App\Models\Event::factory(),
            'user_id' => \App\Models\User::factory(),
            'status' => $this->faker->randomElement(['interested', 'pending', 'accepted']),

        ];
    }
}
