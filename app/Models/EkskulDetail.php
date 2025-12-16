<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EkskulDetail extends Model
{
    use HasFactory;

    protected $table = 'ekskul_details';

    protected $fillable = [
        'id_ekskul', 'judul', 'jenis', 'foto', 'deskripsi'
    ];

    public function ekskul()
    {
        return $this->belongsTo(Ekskul::class, 'id_ekskul');
    }
}
