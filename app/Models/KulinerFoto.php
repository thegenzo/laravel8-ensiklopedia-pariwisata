<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KulinerFoto extends Model
{
    use HasFactory;

    protected $table = 'kuliner_fotos';

    protected $fillable = ['id_kuliner', 'foto'];

    public function kuliner()
    {
        return $this->belongsTo(Kuliner::class, 'id_kuliner');
    }
}
