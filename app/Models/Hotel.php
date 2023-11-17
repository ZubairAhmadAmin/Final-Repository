<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;
use App\Models\HotelSalons;
use App\Models\HotelServices;
use App\Models\User;

class Hotel extends Model
{
    public function city () {
        return $this->belongsTo(City::class);
    }

    use HasFactory;
    protected $table = 'hotels';
    protected $fillable = [
        'hotel_name',
        'hotel_address',
        'booking_price',
        'tolal_salons',
        'total_capacity',
        'hotel_images',
        'city_id',
        'videos'
    ];
    
    public function salons () {
        return $this->hasMany(HotelSalons::class);
    }

    public function services () {
        return $this->hasMany(HotelServices::class);
    }

    public function owner() {
        return $this->belongsTo(User::class, 'hotel_user_id');
    }
}
