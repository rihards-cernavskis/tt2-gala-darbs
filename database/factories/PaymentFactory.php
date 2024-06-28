<?php

namespace Database\Factories;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    protected $model = Payment::class;

    public function definition()
    {
        return [
            'booking_id' => \App\Models\Booking::factory(),
            'amount' => $this->faker->randomFloat(2, 50, 500),
            'payment_date' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
