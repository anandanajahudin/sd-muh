<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'jenis',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pegawai()
    {
        return $this->hasOne(Pegawai::class, 'id_user', 'id');
    }

    public function guruGeneral()
    {
        return $this->hasOne(GuruGeneral::class, 'id_user', 'id');
    }

    public function siswaGeneral()
    {
        return $this->hasOne(SiswaGeneral::class, 'id_user', 'id');
    }

    public function siswa()
    {
        return $this->hasOne(Siswa::class, 'id_user', 'id');
    }

    public function users()
    {
        return $this->hasMany(Muhasabah::class, 'id_user', 'id');
    }

    public function waliMurid()
    {
        return $this->hasOne(WaliMurid::class, 'id_user', 'id');
    }

    public function muhasabahku()
    {
        return $this->hasMany(Muhasabahku::class, 'id_user');
    }
}
