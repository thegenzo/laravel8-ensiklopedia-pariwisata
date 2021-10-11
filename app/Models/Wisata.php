<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;

    protected $table = 'wisatas';

    protected $fillable = ['sampul_wisata', 'nama_wisata', 'deskripsi', 'latitude', 'longitude'];

    public function wisata_foto()
    {
        return $this->hasMany(WisataFoto::class, 'id_wisata');
    }
}
