<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    use HasFactory;

    protected $table = 'moduls';

    protected $fillable = [
        'judul', 'id_jenis', 'deskripsi', 'gambar', 'file', 'ukuran_file', 'id_kelas_master'
    ];

    public function jenisModul()
    {
        return $this->belongsTo(JenisModul::class, 'id_jenis');
    }

    public function modulKelas()
    {
        return $this->belongsTo(KelasMaster::class, 'id_kelas_master');
    }
}