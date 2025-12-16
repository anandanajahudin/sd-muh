<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Muhasabahku extends Model
{
    use HasFactory;

    protected $table = 'muhasabahkus';

    protected $fillable = [
        'id_user', 'tgl_muhasabah', 'jenis',
        'kelas', 'tahun_ajaran', 'nilai', 'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function muhasabahkuDetail()
    {
        return $this->hasMany(MuhasabahkuDetail::class, 'id_muhasabah', 'id');
    }
}
