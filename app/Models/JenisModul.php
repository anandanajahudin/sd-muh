<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisModul extends Model
{
    use HasFactory;

    protected $table = 'jenis_moduls';
    protected $fillable = ['judul'];

    public function modul()
    {
        return $this->hasMany(Modul::class, 'id_jenis', 'id');
    }
}