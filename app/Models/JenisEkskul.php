<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisEkskul extends Model
{
    use HasFactory;

    protected $table = 'jenis_ekskuls';

    protected $fillable = [
        'judul'
    ];

    public function ekskuls()
    {
        return $this->hasMany(Ekskul::class, 'id_jenis_ekskul', 'id');
    }
}
