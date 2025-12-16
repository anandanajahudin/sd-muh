<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SifatSiswa extends Model
{
    use HasFactory;

    protected $table = 'sifat_siswas';

    protected $fillable = ['id_siswa', 'id_sifat'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }

    public function sifat()
    {
        return $this->belongsTo(SifatMaster::class, 'id_sifat');
    }
}
