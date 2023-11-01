<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\HotelServices;

class HotelServicesItems extends Model
{
    use HasFactory;

    public function hotelService () {
        return $this->belongsTo(HotelServices::class);
    }
}
