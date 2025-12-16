<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterMuhasabah extends Model
{
    use HasFactory;

    protected $table = 'master_muhasabahs';

    protected $fillable = [
        'judul', 'poin'
    ];

    // public function master_muhasabahs()
    // {
    //     return $this->hasMany(Muhasabah::class, 'id_muhasabah', 'id');
    // }
    public function muhasabahDetail()
    {
        return $this->hasMany(MuhasabahkuDetail::class, 'id_master_muhasabah', 'id');
    }
}
