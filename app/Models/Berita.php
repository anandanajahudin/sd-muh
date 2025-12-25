<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'beritas';

    protected $fillable = [
        'judul', 'slug', 'jenis', 'link_vidio',
        'deskripsi', 'gambar', 'keterangan_img',
        'tgl_agenda', 'id_user'
    ];

    public function userPost()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($berita) {
            $berita->generateSlug();
        });
    }

    /**
     * Generate slug otomatis jika belum ada
     */
    public function generateSlug()
    {
        // Jika slug sudah ada → tidak diubah
        if (!empty($this->slug)) {
            return;
        }

        $baseSlug = Str::slug($this->judul);
        $slug = $baseSlug;
        $counter = 1;

        // Cek slug unik
        while (
            self::where('slug', $slug)
                ->where('id', '!=', $this->id ?? 0)
                ->exists()
        ) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        $this->slug = $slug;
    }

    public function landingUrl(): string
    {
        $param = $this->slug ?: $this->id;

        switch ($this->jenis) {
            case 'berita':
                return $this->slug
                    ? route('newsDetailSlug', $param)
                    : route('newsDetail', $param);

            case 'agenda':
                return $this->slug
                    ? route('agendaDetailSlug', $param)
                    : route('agendaDetail', $param);

            case 'opini':
                return $this->slug
                    ? route('opiniDetailSlug', $param)
                    : route('opiniDetail', $param);

            default: // tv
                return $this->slug
                    ? route('tvDetailSlug', $param)
                    : route('tvDetail', $param);
        }
    }
}
