<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramUnggulan extends Model
{
    use HasFactory;

    protected $table = 'program_unggulans';

    protected $fillable = [
        'judul', 'deskripsi', 'logo'
    ];

    public function programUnggulanDetail()
    {
        return $this->hasMany(ProgramUnggulanDetail::class, 'id_program_unggulan', 'id');
    }
}
