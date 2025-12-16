<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $table = 'kelas';

    protected $fillable = [
        'nama_kelas', 'keterangan', 'id_kelas_master'
    ];

    public function tipeKelas()
    {
        return $this->belongsTo(KelasMaster::class, 'id_kelas_master');
    }

    public function tahunKelas()
    {
        return $this->hasMany(KelasSiswa::class, 'id_kelas', 'id');
    }

    // protected $dates = ['deleted_at'];
}
