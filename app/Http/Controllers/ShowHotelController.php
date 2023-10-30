<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\City;
use Illuminate\Http\Request;

class ShowHotelController extends Controller
{
    public function index()
    { 
        $hotels = Hotel::with('city')->get();
        $city = City::with('hotels')->get();
        return view('Frontend.pages.hotels', compact('hotels', 'city'));
    }
}
