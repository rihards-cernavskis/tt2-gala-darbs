<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Review;
use App\Models\Payment;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        User::factory(10)->create();

        Hotel::factory(5)->create()->each(function ($hotel) {
            Room::factory(10)->create(['hotel_id' => $hotel->id])->each(function ($room) {
                Booking::factory(5)->create([
                    'room_id' => $room->id,
                    'total_price' => rand(100, 1000)
                ])->each(function ($booking) {
                    Payment::factory()->create([
                        'booking_id' => $booking->id,
                        'amount' => $booking->total_price,
                        'payment_date' => now()
                    ]);
                });
            });
            Review::factory(5)->create(['hotel_id' => $hotel->id]);
        });
    }
}
