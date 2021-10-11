<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuliner extends Model
{
    use HasFactory;

    protected $table = 'kuliners';

    protected $fillable = ['sampul_kuliner', 'nama_kuliner', 'deskripsi', 'harga'];

    public function kuliner_foto()
    {
        return $this->hasMany(KulinerFoto::class, 'id_kuliner');
    }
}
