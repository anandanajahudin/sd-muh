<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WaliMurid extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'wali_murids';

    protected $fillable = [
        'nama', 'kelas', 'id_user'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

}
