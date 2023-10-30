<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hotel;

class City extends Model
{
    public function hotels () {
        return $this->hasMany(Hotel::class, 'city_id', 'id');
    }
    use HasFactory;

    protected $tabale = 'cities';
    protected $fillable = [
        'id',
        'city_name',
    ];
}
