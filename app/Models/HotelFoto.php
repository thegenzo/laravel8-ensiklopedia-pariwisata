<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelFoto extends Model
{
    use HasFactory;

    protected $table = 'hotel_fotos';

    protected $fillable = ['id_hotel', 'foto'];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'id_hotel');
    }
}
