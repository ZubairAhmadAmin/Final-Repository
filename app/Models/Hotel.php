<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;

class Hotel extends Model
{
    public function city () {
        return $this->belongsTo(City::class);
    }

    use HasFactory;
    protected $tabale = 'hotels';
    protected $fillable = [
        'hotel_name',
        'hotel_address',
        'booking_price',
        'tolal_solon',
        'total_capacity',
        'hotel_image',
        'city_id'
    ];
}
