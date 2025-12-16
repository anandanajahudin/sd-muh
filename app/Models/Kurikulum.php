<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kurikulum extends Model
{
    use HasFactory;

    protected $table = 'kurikulums';

    protected $fillable = [
        'judul', 'deskripsi',
    ];

    public function kurikulum_details()
    {
        return $this->hasMany(KurikulumDetail::class, 'id_kurikulum', 'id');
    }
}
