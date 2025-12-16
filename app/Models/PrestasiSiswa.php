<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestasiSiswa extends Model
{
    use HasFactory;

    protected $table = 'prestasi_siswas';

    protected $fillable = [
        'id_siswa', 'judul', 'juara', 'tempat_kompetisi',
        'tgl_kompetisi', 'kategori', 'deskripsi', 'foto',
        'id_kelas_siswa'
    ];

    public function siswaPrestasi()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }

    public function kelasPrestasiSiswa()
    {
        return $this->belongsTo(KelasSiswa::class, 'id_kelas_siswa');
    }
}
