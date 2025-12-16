<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SifatMasterSeeder extends Seeder
{
    public function run()
    {
        DB::table('sifat_masters')->insert([
            'judul' => 'Aktif',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('sifat_masters')->insert([
            'judul' => 'Ceria',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('sifat_masters')->insert([
            'judul' => 'Inovatif',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('sifat_masters')->insert([
            'judul' => 'Kreatif',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('sifat_masters')->insert([
            'judul' => 'Pemalu',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('sifat_masters')->insert([
            'judul' => 'Pendiam',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('sifat_masters')->insert([
            'judul' => 'Penakut',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('sifat_masters')->insert([
            'judul' => 'Humoris',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
