<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasSiswa extends Model
{
    use HasFactory;

    protected $table = 'kelas_siswas';

    protected $fillable = [
        'id_kelas', 'id_pegawai', 'tahun_ajaran', 'tahun'
    ];

    public function siswaKelas()
    {
        return $this->hasMany(Siswa::class, 'id_kelas_siswa', 'id');
    }

    public function prestasiSiswa()
    {
        return $this->hasMany(PrestasiSiswa::class, 'id_kelas_siswa', 'id');
    }

    public function kejadianSiswa()
    {
        return $this->hasMany(KejadianSiswa::class, 'id_kelas_siswa', 'id');
    }

    public function namaKelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function waliKelas()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai');
    }
}
