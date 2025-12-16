<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterMuhasabahSeeder extends Seeder
{
    public function run()
    {
        DB::table('master_muhasabahs')->insert([
            'judul' => 'Shalat Dhuha',
            'poin' => 10,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('master_muhasabahs')->insert([
            'judul' => 'Qiyamul Lail',
            'poin' => 10,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('master_muhasabahs')->insert([
            'judul' => 'Murajaah (Juz 30)',
            'poin' => 10,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('master_muhasabahs')->insert([
            'judul' => 'Tilawah',
            'poin' => 10,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('master_muhasabahs')->insert([
            'judul' => 'Shalat Subuh',
            'poin' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('master_muhasabahs')->insert([
            'judul' => 'Shalat Dzuhur',
            'poin' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('master_muhasabahs')->insert([
            'judul' => 'Shalat Ashar',
            'poin' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('master_muhasabahs')->insert([
            'judul' => 'Shalat Maghrib',
            'poin' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('master_muhasabahs')->insert([
            'judul' => 'Shalat Isya',
            'poin' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('master_muhasabahs')->insert([
            'judul' => 'Membantu Orang lain',
            'poin' => 10,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('master_muhasabahs')->insert([
            'judul' => 'Shadaqah',
            'poin' => 10,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('master_muhasabahs')->insert([
            'judul' => 'Membaca Buku',
            'poin' => 10,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('master_muhasabahs')->insert([
            'judul' => 'Hafidz - Menambah hafalan',
            'poin' => 10,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('master_muhasabahs')->insert([
            'judul' => 'Dzikir',
            'poin' => 10,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
