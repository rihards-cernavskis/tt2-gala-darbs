<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $hotel = new Hotel();
        $hotel->name = $request->name;
        $hotel->address = $request->address;
        $hotel->city = $request->city;
        $hotel->country = $request->country;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $hotel->image = $imagePath;
        }

        $hotel->save();

        return redirect()->back()->with('success', 'Hotel created successfully.');
    }

    public function index()
    {
        $hotels = Hotel::all(); // Fetches all hotels from the database
        return view('home', ['hotels' => $hotels]); // Passes them to the home view
    }
    

}
