<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ppdb extends Model
{
    use HasFactory;

    protected $table = 'ppdbs';

    protected $fillable = [
        'judul', 'tgl_awal', 'tgl_batas', 'tahun_ajaran', 'tahun',
        'deskripsi', 'brosur', 'file', 'link'
    ];

    public function ppdbSiswa()
    {
        return $this->hasMany(PpdbSiswa::class, 'id_ppdb', 'id');
    }

}