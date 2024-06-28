<?php

namespace Database\Factories;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    protected $model = Booking::class;

    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'room_id' => \App\Models\Room::factory(),
            'check_in' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'check_out' => $this->faker->dateTimeBetween('now', '+1 month'),
        ];
    }
}
