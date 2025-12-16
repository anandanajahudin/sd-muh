<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswas';

    protected $fillable = [
        'nis', 'nisn', 'foto',
        'tgl_masuk', 'id_ppdb_siswa', 'id_user',
        'id_kelas_siswa', 'id_mutasi', 'status'
    ];

    public function prestasiSiswa()
    {
        return $this->hasMany(PrestasiSiswa::class, 'id_siswa', 'id');
    }

    public function sifatSiswa()
    {
        return $this->hasMany(SifatSiswa::class, 'id_siswa', 'id');
    }

    public function userSiswa()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function ppdbSiswa()
    {
        return $this->belongsTo(PpdbSiswa::class, 'id_ppdb_siswa');
    }

    public function kelasSiswa()
    {
        return $this->belongsTo(KelasSiswa::class, 'id_kelas_siswa');
    }

    public function mutasi()
    {
        return $this->belongsTo(SdMutasi::class, 'id_mutasi');
    }
}