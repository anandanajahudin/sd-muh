<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PpdbPoster extends Model
{
    use HasFactory;

    protected $table = 'ppdb_posters';

    protected $fillable = [
        'id_ppdb', 'judul', 'poster', 'jenis', 'deskripsi'
    ];

    public function ppdb()
    {
        return $this->belongsTo(Ppdb::class, 'id_ppdb');
    }
}
