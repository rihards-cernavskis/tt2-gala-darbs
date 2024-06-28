<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;

class ListingController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $hotel = new Hotel();
        $hotel->name = $request->title; // Assuming title is the name of the hotel
        $hotel->address = $request->description; // Assuming description is the address
        $hotel->city = $request->price; // Assuming price is the city
        $hotel->country = $request->price; // Assuming price is the country

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $hotel->image = $imagePath;
        }

        $hotel->save();

        return redirect()->route('listing.upload')->with('status', 'listing-uploaded');
    }
}

