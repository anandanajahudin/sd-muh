<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KejadianSiswa extends Model
{
    use HasFactory;

    protected $table = 'kejadian_siswas';

    protected $fillable = [
        'id_siswa', 'judul', 'deskripsi',
        'tgl_kejadian', 'id_kelas_siswa'
    ];

    public function siswaKejadian()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }

    public function kelasKejadianSiswa()
    {
        return $this->belongsTo(KelasSiswa::class, 'id_kelas_siswa');
    }
}
