<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Muhasabah extends Model
{
    use HasFactory;

    protected $table = 'muhasabahs';

    protected $fillable = [
        'id_user', 'id_muhasabah', 'tgl_muhasabah', 'jenis', 'kelas', 'tahun_ajaran', 'status'
    ];

    public function masterMuhasabah()
    {
        return $this->belongsTo(MasterMuhasabah::class, 'id_muhasabah');
    }

    public function userMuhasabah()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
