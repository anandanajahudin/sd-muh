<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KurikulumDetail extends Model
{
    use HasFactory;
    protected $table = 'kurikulum_details';

    protected $fillable = [
        'id_kurikulum', 'judul', 'deskripsi'
    ];

    public function masterKurikulum()
    {
        return $this->belongsTo(Kurikulum::class, 'id_kurikulum');
    }
}
