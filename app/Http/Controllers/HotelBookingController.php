<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\HotelServices;
use App\Models\HotelServicesItems;
use App\Models\HotelSalons;
use App\Models\Hotel;
use App\Models\HotelBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HotelBookingController extends Controller
{
    public function index()
    { 
        $bookings = HotelBooking::with('salons', 'services.serviceItems', 'booker', 'hotel');
        if (Auth::user()->user_type == 0) $bookings = $bookings->where('user_id', Auth::user()->id)->get();
        else $bookings = $bookings->get();

        return view('Backend.dashboard.bookings', compact('bookings'));
    }

    public function store(Request $request, $hotel_id)
    {
        $validated = $request->validate([
            'booking_date' => 'required|date',
            'guests_number' => 'required|integer',
            'salons' => 'required',
            'services' => 'required'
        ]);


        $hotelBooking = new HotelBooking();
        $hotelBooking->booking_date = Carbon::createFromFormat('m/d/Y', $request->input('booking_date'))->format('Y-m-d');
        $hotelBooking->guests_count = $request->input('guests_number');
        $hotelBooking->comment = $request->input('comment');
        $hotelBooking->user_id = Auth::user()->id;;
        $hotelBooking->hotel_id = $hotel_id;

        $hotelBooking->save();

        $hotelBooking->salons()->attach($request->input('salons'));
        $hotelBooking->services()->attach($request->input('services'));

        return redirect()->back()->with('status', 'hotel booked sccessfuly.');
    }
    
    public function show($id)
    {
        $booking = HotelBooking::with('salons', 'services.serviceItems', 'booker', 'hotel')
        ->find($id);
        return view('Backend.dashboard.show_booking', compact('booking'));
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, string $id)
    {
    }

    public function destroy(string $id)
    {
    }

    public function ApplyBookingStatusAction(Request $request, $id) {
        $booking = HotelBooking::find($id);

        $booking->update([
            'status' => $request->input('status'),
             'reason' => $request->input('reason')
        ]);

        return redirect()->back()->with(['status', 'Booking Status Action Applied']);
    }
}
