<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PekerjaanSeeder extends Seeder
{
    public function run()
    {
        // 1
        DB::table('pekerjaans')->insert([
            'judul' => 'Bidan',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 2
        DB::table('pekerjaans')->insert([
            'judul' => 'Dokter',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 3
        DB::table('pekerjaans')->insert([
            'judul' => 'Guru',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 4
        DB::table('pekerjaans')->insert([
            'judul' => 'Petani',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 5
        DB::table('pekerjaans')->insert([
            'judul' => 'Nelayan',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 6
        DB::table('pekerjaans')->insert([
            'judul' => 'POLRI',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 7
        DB::table('pekerjaans')->insert([
            'judul' => 'TNI',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 8
        DB::table('pekerjaans')->insert([
            'judul' => 'Pengusaha',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 9
        DB::table('pekerjaans')->insert([
            'judul' => 'Ibu Rumah Tangga',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 10
        DB::table('pekerjaans')->insert([
            'judul' => 'Tidak Bekerja',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 11
        DB::table('pekerjaans')->insert([
            'judul' => 'Masinis',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 12
        DB::table('pekerjaans')->insert([
            'judul' => 'Pilot',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 13
        DB::table('pekerjaans')->insert([
            'judul' => 'Satpam',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
