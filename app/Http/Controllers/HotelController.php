<?php

namespace App\Http\Controllers;
use App\Models\Hotel;
class HotelController extends Controller
{
    public function showHotels()
    {
        $hotels = Hotel::orderBy('rating', 'desc')->get();
        $recommendedHotels = Hotel::recommended()->get(); // Using the scope defined in the model

        return view('hotels.index', compact('hotels', 'recommendedHotels'));
    }
}
