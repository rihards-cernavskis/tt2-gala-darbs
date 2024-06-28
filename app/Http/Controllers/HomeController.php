<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel; // Import the Hotel model
use Illuminate\Support\Facades\App;


class HomeController extends Controller
{
    public function index($lang = null)
    {
        if ($lang) {
            App::setLocale($lang);
            session(['locale' => $lang]);
        } else {
            $lang = session('locale', 'en');
            App::setLocale($lang);
        }

        $translations = trans('messages');
        $hotels = Hotel::all(); // Fetch all hotels for demonstration

        return view('home', compact('hotels', 'translations'));
    }
}
