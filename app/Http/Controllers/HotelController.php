<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    { 
        $hotels = Hotel::with('city')->get();
        $city = City::with('hotels')->get();
        return view('Backend.dashboard.index', compact('hotels', 'city'));
    }

    public function create()
    {
        return view('Backend.dashboard.create');
    }

    public function store(Request $request)
    {
        $hotel = new Hotel();
        $hotel->hotel_name = $request->input('hotel-name');
        $hotel->hotel_address = $request->input('hotel-address');
        $hotel->booking_price = $request->input('booking-price');
        $hotel->total_solon = $request->input('total-solon');
        $hotel->total_capacity = $request->input('total-capacity');

        if($request->hasfile('hotel_image')) {
            $file = $request->file('hotel_image');
            $extention = $file->getClientOriginalName();
            $filename =time().'.'.$extention;
            $file->move('upload', $filename);
            $hotel->hotel_image = $filename;
        }
        // $hotel->city_name = $request->input('city_name');
        $hotel->save();
        return redirect()->back()->with('status', 'hotel register sccessfuly.');

        $city = new City();
        $city->city_name = $request->input('city-name');
    }
    
    public function show($id)
    {
        $hotel = Hotel::find($id);
        return view('Frontend.pages.hotels', compact('hotel'));
    }

    public function edit($id)
    {
        $hotel = Hotel::find($id);
        return view('Backend.dashboard.edit', compact('hotel'));
    }

    public function update(Request $request, string $id)
    {
        $hotel = Hotel::find($id);
        $hotel->hotel_image = $request->input('hotel-image');
        $hotel->hotel_name = $request->input('hotel-name');
        $hotel->hotel_address = $request->input('hotel-address');
        $hotel->booking_price = $request->input('booking-price');
        $hotel->total_solon = $request->input('total-solon');
        $hotel->total_capacity = $request->input('total-capacity');
        $hotel->update();
        return redirect()->back()->with('status', 'hotel update successfuly');
    }

    public function destroy(string $id)
    {
        
        $hotel = Hotel::find($id);
        $hotel->delete();
        return redirect()->back()->with('success', 'hotel deleted succesfuly');
    }
}
