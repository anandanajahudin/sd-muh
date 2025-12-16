<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NilaiSekolahSeeder extends Seeder
{
    public function run()
    {
        DB::table('nilai_sekolahs')->insert([
            'judul' => 'Unggul',
            'deskripsi' => 'Komitmen kami bersama anda untuk mendidik calon penerus bangsa yang bersaing dan cerdas',
            'logo' => 'nilai1.png',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('nilai_sekolahs')->insert([
            'judul' => 'Berkarakter',
            'deskripsi' => 'Mendidik calon penerus bangsa yang berbudi pekerti luhur',
            'logo' => 'nilai2.png',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('nilai_sekolahs')->insert([
            'judul' => 'Berprestasi',
            'deskripsi' => 'Membangun pola pikir calon penerus bangsa yang tidak hanya menjadi lebih baik namun menjadi yang terbaik',
            'logo' => 'nilai3.png',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('nilai_sekolahs')->insert([
            'judul' => 'Mendunia',
            'deskripsi' => 'Harapan kami tidak hanya mengiringi langkah calon penerus bangsa, namun juga membawa mereka menuju tujuan terbaik mereka',
            'logo' => 'nilai4.png',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
