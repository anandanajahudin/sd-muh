<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MuhasabahkuDetail extends Model
{
    use HasFactory;

    protected $table = 'muhasabahku_details';

    protected $fillable = [
        'id_muhasabah', 'id_master_muhasabah', 'poin'
    ];

    public function muhasabahku()
    {
        return $this->belongsTo(Muhasabahku::class, 'id_muhasabah');
    }

    public function masterMuhasabah()
    {
        return $this->belongsTo(MasterMuhasabah::class, 'id_master_muhasabah');
    }
}
