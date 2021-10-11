<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $table = 'hotels';

    protected $fillable = ['sampul_hotel', 'nama_hotel', 'deskripsi', 'harga_rata', 'latitude', 'longitude'];

    public function hotel_foto()
    {
        return $this->hasMany(HotelFoto::class, 'id_hotel');
    }
}
