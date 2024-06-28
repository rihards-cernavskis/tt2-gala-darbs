<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Hotel; 
use Carbon\Carbon; 



class BookingController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        $bookings = Booking::where('user_id', $user->id)->get();

        return view('profile', compact('user', 'bookings'));
    }

    public function index()
    {
        $bookings = Booking::all(); // Fetch all bookings for demonstration
        return view('bookings.index', compact('bookings'));
    }

    public function create()
    {
        // Retrieve necessary data for creating a booking
        return view('bookings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'hotel_id' => 'required|exists:hotels,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
        ]);

        $hotel = Hotel::find($request->hotel_id);
        $checkIn = Carbon::parse($request->check_in);
        $checkOut = Carbon::parse($request->check_out);
        $nights = $checkIn->diffInDays($checkOut);
        $totalPrice = $hotel->price_per_night * $nights;

        Booking::create([
            'hotel_id' => $request->hotel_id,
            'user_id' => Auth::id(),
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'total_price' => $totalPrice,
        ]);

        return response()->json(['message' => 'Booking successful!']);
    }


}
