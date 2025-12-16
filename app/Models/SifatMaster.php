<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SifatMaster extends Model
{
    use HasFactory;

    protected $table = 'sifat_masters';

    protected $fillable = ['judul'];

    public function sifat()
    {
        return $this->hasMany(SifatSiswa::class, 'id_sifat', 'id');
    }
}