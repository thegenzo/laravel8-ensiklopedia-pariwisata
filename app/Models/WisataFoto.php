<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WisataFoto extends Model
{
    use HasFactory;

    protected $table = 'wisata_fotos';

    protected $fillable = ['id_wisata', 'foto'];

    public function wisata()
    {
        return $this->belongsTo(Wisata::class, 'id_wisata');
    }
}
