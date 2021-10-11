<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $table = 'guests';

    protected $fillable = ['id_user', 'nip', 'alamat', 'no_hp'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
