<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilKeunggulan extends Model
{
    use HasFactory;

    protected $table = 'profil_keunggulans';

    protected $fillable = [
        'judul', 'keterangan', 'deskripsi',
    ];
}