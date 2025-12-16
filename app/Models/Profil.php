<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;

    protected $table = 'profils';

    protected $fillable = [
        'judul', 'keterangan', 'deskripsi',
        'judul_visi', 'deskripsi_visi', 'alamat',
        'operasional', 'email', 'telp',
        'daycare', 'daycare_img',
        'link_fb', 'link_ig', 'link_twitter', 'link_yutub',
        'banner_primary', 'banner_secondary'
    ];
}
