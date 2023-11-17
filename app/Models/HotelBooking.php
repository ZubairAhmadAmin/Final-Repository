<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\HotelSalons;
use App\Models\HotelServices;
use App\Models\User;
use App\Models\Hotel;

class HotelBooking extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function salons()
    {
        return $this->belongsToMany(HotelSalons::class, 'booking_salons','hotel_bookings_id', 'hotel_salons_id');
    }

    public function services()
    {
        return $this->belongsToMany(HotelServices::class, 'booking_services', 'hotel_bookings_id', 'hotel_services_id');
    }

    public function booker()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }
}
