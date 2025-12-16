<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'beritas';

    protected $fillable = [
        'judul', 'jenis', 'link_vidio',
        'deskripsi', 'gambar', 'keterangan_img',
        'tgl_agenda', 'id_user'
    ];

    public function userPost()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
