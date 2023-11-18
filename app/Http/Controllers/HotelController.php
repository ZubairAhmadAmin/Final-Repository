<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\HotelServices;
use App\Models\HotelServicesItems;
use App\Models\HotelSalons;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;

class HotelController extends Controller
{
    public function index()
    { 
        $hotels = Hotel::with('city', 'owner')->get();
        $city = City::with('hotels')->get();
        return view('Backend.dashboard.index', compact('hotels', 'city'));
    }

    public function create()
    {
        $cities = City::all();
        return view('Backend.dashboard.create', ['cities' => $cities]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'hotel_name' => 'required|max:255',
            'address' => 'required',
            'email' => 'required',
            'mobile_number' => 'required',
            'total_salons' => 'required',
            'total_capacity' => 'required',
            'city_id' => 'required',
            'hotel_images.*' => ['required', File::image()],
            'hotel_services.*.photos' => ['required', File::image()],
            'hotel_services.*.name' => 'required',
            'hotel_services.*.price' => 'required|integer',
            'hotel_services.serviceItems.*.name' => 'sometimes|required',
            'hotel_salons.*.name' => 'required',
            'hotel_salons.*.max_guests_capacity' => 'required',
            'hotel_salons.*.photos' => ['required', File::image()],
        ]);

        $hotel = new Hotel();
        $hotel->hotel_name = $request->input('hotel_name');
        $hotel->hotel_address = $request->input('address');
        $hotel->email = $request->input('email');
        $hotel->mobile_number = $request->input('mobile_number');
        $hotel->description = $request->input('description');
        $hotel->total_salons = $request->input('total_salons');
        $hotel->total_capacity = $request->input('total_capacity');
        $hotel->city_id = $request->input('city_id');
        $hotel->hotel_user_id = Auth::user()->id;

        if($request->hasfile('hotel_images')) {
            $files = $request->file('hotel_images');
            $fileNames = [];
            foreach($files as $file){
                $filename = $file->getClientOriginalName();
                array_push($fileNames, $filename);
                Storage::put('public/'.$filename, file_get_contents($file));
            }

            $hotel->hotel_images = json_encode($fileNames);
        }

        // if($request->has('hotel_videos')) {
        //     $files = $request->file('hotel_videos');
        //     $fileNames = [];
        //     foreach($files as $file){
        //         $filename = $file->getClientOriginalName();
        //         array_push($fileNames, $filename);
        //         Storage::putFileAs('', $file, $filename);
        //     }

        //     $hotel->videos = json_encode($fileNames);
        // }
        $hotel->save();

        // dd(explode("/", mime_content_type($t[0]['photos'][0]['data']))[1]);

        if($request->has('hotel_services')) {
            $services = json_decode($request->input('hotel_services'), true);
            $fileNames = [];
            foreach($services as $service) {
                if ($service['photos']) {
                    foreach($service['photos'] as $photo) {
                        $filename = $photo['fileName'];
                        array_push($fileNames, $filename);
                        Storage::put('public/'.$filename, file_get_contents($photo['data']));
                    }
                }

                $hotelService = new HotelServices([
                    'name' => $service['name'],
                    'price' => $service['price'],
                    'description' => $service['details'],
                    'photos' => json_encode($fileNames)
                ]);

                $hotel->services()->save($hotelService);
                
                if (array_key_exists('serviceItems', $service)) {
                    foreach($service['serviceItems'] as $item) {
                        $hotelService->serviceItems()->save(
                            new HotelServicesItems(['name' => $service['name'], 'description' => 'test'])
                        );
                    }
                }
            }
        }

        if($request->has('hotel_salons')) {
            $salons = json_decode($request->input('hotel_salons'), true);
            $fileNames = [];
            foreach($salons as $salon) {
                if ($salon['photos']) {
                    foreach($salon['photos'] as $photo) {
                        $filename = $photo['fileName'];
                        array_push($fileNames, $filename);
                        Storage::put('public/'.$filename, file_get_contents($photo['data']));
                    }
                }

                $hotelSalon = new HotelSalons([
                    'name' => $salon['name'],
                    'max_guests_capacity' => $salon['max_guest_capacity'],
                    'photos' => json_encode($fileNames)
                ]);

                $hotel->salons()->save($hotelSalon);
            }
        }
        // Storage::put('demo.png', file_get_contents($t[0]['photos'][0]));


        return redirect()->back()->with('status', 'hotel register sccessfuly.');
    }
    
    public function show($id)
    {
        $hotel = Hotel::with(['city', 'salons', 'services.serviceItems', 'owner'])->find($id);

        if (Auth::user()) {
            return view('Backend.dashboard.show', compact('hotel'));
        }

        return view('Frontend.pages.show', compact('hotel'));
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

    public function search(Request $request)
    { 
        $hotels = Hotel::with('owner', 'city')
        ->whereHas('city', function($q) use ($request) {
            $q->where('id', '=', $request->input('search_term'));
        })->get();
        $city = City::with('hotels')->get();
        return view('Frontend.pages.hotels', compact('hotels', 'city'));
    }
}
