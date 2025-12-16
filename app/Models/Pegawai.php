<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawais';

    protected $fillable = [
        'nama', 'nip', 'nik', 'gender', 'tempat_lahir', 'tgl_lahir',
        'no_hp', 'alamat', 'foto_ktp', 'foto', 'tgl_masuk', 'id_user', 'status'
    ];

    public function userPegawai()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // public function pegawais()
    // {
    //     return $this->hasMany(Muhasabah::class, 'id_pegawai', 'id');
    // }

    public function kelasSiswas()
    {
        return $this->hasMany(KelasSiswa::class, 'id_pegawai', 'id');
    }
}
