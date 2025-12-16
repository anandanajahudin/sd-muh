<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Muhasabah extends Model
{
    use HasFactory;

    protected $table = 'muhasabahs';

    protected $fillable = [
        'id_user', 'id_muhasabah', 'tgl_muhasabah',
        'jenis', 'kelas', 'tahun_ajaran', 'status',
        'shalat_dhuha', 'qiyamul_lail',
        'murajaah_juz30', 'tilawah', 'shalat_subuh',
        'shalat_dzuhur', 'shalat_ashar',
        'shalat_maghrib', 'shalat_isya',
        'membantu_orang', 'shadaqah', 'baca_buku',
        'hafidz', 'dzikir'
    ];

    // public function masterMuhasabah()
    // {
    //     return $this->belongsTo(MasterMuhasabah::class, 'id_muhasabah');
    // }

    public function userMuhasabah()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
