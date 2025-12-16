<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestimoniSeeder extends Seeder
{
    public function run()
    {
        DB::table('testimonis')->insert([
            'nama' => 'Budi Susilo',
            'id_pekerjaan' => 3,
            'nilai' => 5,
            'testimoni' => 'Salah satu sekolah SD di Surabaya dengan fasilitas yang lengkap dan satu satunya sekolah yang menerapkan pembelajaran bilingual',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('testimonis')->insert([
            'nama' => 'Adi Suprapto',
            'id_pekerjaan' => 8,
            'nilai' => 5,
            'testimoni' => 'SD yang sangat bagus dengan metode pembelajaran modern dan islami, serta banyak siswa-siswi berprestasi',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('testimonis')->insert([
            'nama' => 'Bagus Pradana',
            'id_pekerjaan' => 13,
            'nilai' => 5,
            'testimoni' => 'Lingkungan sekolah sangat bersih, fasilitas lengkap dan canggih, dan nyaman untuk para siswa-siswi',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('testimonis')->insert([
            'nama' => 'Hendro Sucipto',
            'id_pekerjaan' => 7,
            'nilai' => 5,
            'testimoni' => 'Metode belajar yang modern dan mengutamakan pendidikan agama, sehingga anak-anak rajin shalat dan mengaji walaupun di rumah',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('testimonis')->insert([
            'nama' => 'Dandi Wijaya',
            'id_pekerjaan' => 2,
            'nilai' => 5,
            'testimoni' => 'Anak-anak semakin rajin belajar sejak mengenal metode belajar di program unggulan sekolah ini, dan memperoleh prestasi di dalam maupun luar sekolah',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('testimonis')->insert([
            'nama' => 'Wali murid',
            'id_pekerjaan' => 3,
            'nilai' => 5,
            'testimoni' => 'Sekolah dengan biaya yang murah, dengan kualitas alumni dan siswa yang berprestasi',
            'link' => 'n6SdjbJS5eI',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
