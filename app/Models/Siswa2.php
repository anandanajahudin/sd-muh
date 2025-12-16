<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswas';

    protected $fillable = [
        'nama', 'nis', 'nisn', 'gender', 'tempat_lahir', 'tgl_lahir',
        'nohp', 'nohp_ortu', 'email_ortu', 'nama_ayah', 'nama_ibu',
        'nama_wali', 'alamat', 'id_sifat', 'foto', 'kategori_kelas', 'tgl_masuk',
        'id_user', 'id_kelas_siswa', 'status'
    ];

    public function userSiswa()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // public function siswas()
    // {
    //     return $this->hasMany(Muhasabah::class, 'id_siswa', 'id');
    // }

    public function prestasiSiswa()
    {
        return $this->hasMany(PrestasiSiswa::class, 'id_siswa', 'id');
    }

    public function kelasSiswa()
    {
        return $this->belongsTo(KelasSiswa::class, 'id_kelas_siswa');
    }

    public function sifatSiswa()
    {
        return $this->belongsTo(SifatMaster::class, 'id_sifat');
    }
}