<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function upload(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle the uploaded file
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        // Store the listing data in the database
        // Assuming you have a Listing model
        \App\Models\Hotel::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imageName,
        ]);

        // Redirect back with a success message
        return back()->with('status', 'listing-uploaded');
    }
}
