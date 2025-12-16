<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;

    protected $table = 'pekerjaans';

    protected $fillable = ['judul'];

    public function pekerjaansAyah()
    {
        return $this->hasMany(PpdbSiswa::class, 'pekerjaan_ayah', 'id');
    }

    public function pekerjaansIbu()
    {
        return $this->hasMany(PpdbSiswa::class, 'pekerjaan_ibu', 'id');
    }

    public function pekerjaansWali()
    {
        return $this->hasMany(PpdbSiswa::class, 'pekerjaan_wali', 'id');
    }

    public function testimoni()
    {
        return $this->hasMany(Testimoni::class, 'id_pekerjaan', 'id');
    }
}