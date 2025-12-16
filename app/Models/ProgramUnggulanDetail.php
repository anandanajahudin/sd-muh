<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramUnggulanDetail extends Model
{
    use HasFactory;

    protected $table = 'program_unggulan_details';

    protected $fillable = [
        'id_program_unggulan', 'judul', 'jenis', 'foto', 'deskripsi'
    ];

    public function programUnggulan()
    {
        return $this->belongsTo(ProgramUnggulan::class, 'id_program_unggulan');
    }
}
