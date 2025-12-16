<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekskul extends Model
{
    use HasFactory;

    protected $table = 'ekskuls';

    protected $fillable = [
        'judul', 'id_jenis_ekskul', 'deskripsi', 'logo'
    ];

    public function jenisEkskul()
    {
        return $this->belongsTo(JenisEkskul::class, 'id_jenis_ekskul');
    }


    public function ekskulDetail()
    {
        return $this->hasMany(EkskulDetail::class, 'id_ekskul', 'id');
    }
}
