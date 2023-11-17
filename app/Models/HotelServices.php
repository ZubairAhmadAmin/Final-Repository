<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hotel;
use App\Models\HotelServicesItems;

class HotelServices extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function hotel () {
        return $this->belongsTo(Hotel::class);
    }

    public function serviceItems () {
        return $this->hasMany(HotelServicesItems::class);
    }
}
