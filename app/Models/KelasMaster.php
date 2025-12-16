<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasMaster extends Model
{
    use HasFactory;

    protected $table = 'kelas_masters';

    protected $fillable = [
        'judul', 'jenis', 'kelas', 'biaya_daful', 'spp', 'keterangan', 'deskripsi'
    ];

    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'id_kelas_master', 'id');
    }

    public function modul()
    {
        return $this->hasMany(Modul::class, 'id_kelas_master', 'id');
    }
}