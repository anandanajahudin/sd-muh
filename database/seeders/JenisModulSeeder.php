<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisModulSeeder extends Seeder
{
    public function run()
    {
        DB::table('jenis_moduls')->insert([
            'judul' => 'LKS',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('jenis_moduls')->insert([
            'judul' => 'Paket',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('jenis_moduls')->insert([
            'judul' => 'Kisi-Kisi',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
