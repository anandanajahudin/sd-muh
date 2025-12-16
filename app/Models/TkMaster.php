<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TkMaster extends Model
{
    use HasFactory;

    protected $table = 'tk_masters';

    protected $fillable = [
        'nama', 'kota', 'provinsi'
    ];

    public function ppdbSiswa()
    {
        return $this->hasMany(PpdbSiswa::class, 'tk', 'id');
    }
}