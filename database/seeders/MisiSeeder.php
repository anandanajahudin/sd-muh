<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MisiSeeder extends Seeder
{
    public function run()
    {
        DB::table('misis')->insert([
            'deskripsi' => 'Membangun manajemen sekolah berkelanjutan.',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('misis')->insert([
            'deskripsi' => 'Menyelenggarakan pembelajaran yang efektif, kreatif, dan menyenangkan berbasis potensi siswa.',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('misis')->insert([
            'deskripsi' => 'Meningkatkan kualitas pendidik dan tenaga kependidikan.',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('misis')->insert([
            'deskripsi' => 'Menyiapkan lingkungan sekolah yang islami dan menyenangkan',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('misis')->insert([
            'deskripsi' => 'Meningkatkan semangat berprestasi seluruh warga sekolah sesuai bakat dan minat.',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
