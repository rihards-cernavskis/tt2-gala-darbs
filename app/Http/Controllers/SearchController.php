<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;


class SearchController extends Controller
{
    public function index(Request $request)
    {
        $location = $request->input('location');
        $checkin = $request->input('checkin');
        $checkout = $request->input('checkout');

        // Add your search logic here to find hotels based on the search criteria
        $hotels = Hotel::where('location', 'like', '%' . $location . '%')->get();

        return view('search-results', compact('hotels'));
    }
}
