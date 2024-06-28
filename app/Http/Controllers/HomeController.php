<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel; // Import the Hotel model


class HomeController extends Controller
{
    public function index()
    {
        $hotels = Hotel::all(); // Fetch all hotels for demonstration
        return view('home', compact('hotels'));
    }
}
