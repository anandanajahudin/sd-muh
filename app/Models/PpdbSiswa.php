<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PpdbSiswa extends Model
{
    use HasFactory;

    protected $table = 'ppdb_siswas';

    protected $fillable = [
        'id_ppdb', 'nama', 'gender', 'tempat_lahir', 'tgl_lahir',
        'nohp', 'nohp_ortu', 'email_ortu',
        'nama_ayah', 'pekerjaan_ayah' , 'pendapatan_ayah',
        'nama_ibu', 'pekerjaan_ibu' , 'pendapatan_ibu',
        'nama_wali', 'pekerjaan_wali' , 'pendapatan_wali',
        'alamat', 'tk', 'kategori_kelas', 'file', 'status'
    ];

    public function ppdb()
    {
        return $this->belongsTo(Ppdb::class, 'id_ppdb');
    }

    public function tkSiswa()
    {
        return $this->belongsTo(TkMaster::class, 'tk');
    }

    public function pekerjaanAyah()
    {
        return $this->belongsTo(PpdbSiswa::class, 'pekerjaan_ayah');
    }

    public function pekerjaanIbu()
    {
        return $this->belongsTo(PpdbSiswa::class, 'pekerjaan_ibu');
    }

    public function pekerjaanWali()
    {
        return $this->belongsTo(PpdbSiswa::class, 'pekerjaan_wali');
    }

    public function siswa()
    {
        return $this->hasOne(Siswa::class, 'id_ppdb_siswa', 'id');
    }
}