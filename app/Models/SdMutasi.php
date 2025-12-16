<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SdMutasi extends Model
{
    use HasFactory;

    protected $table = 'sd_mutasis';

    protected $fillable = ['nama', 'kota', 'provinsi'];


    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'id_mutasi', 'id');
    }
}