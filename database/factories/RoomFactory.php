<?php

namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    protected $model = Room::class;

    public function definition()
    {
        return [
            'hotel_id' => \App\Models\Hotel::factory(),
            'room_number' => $this->faker->numberBetween(100, 999),
            'type' => $this->faker->randomElement(['single', 'double', 'suite']),
            'price' => $this->faker->randomFloat(2, 50, 500),
        ];
    }
}
