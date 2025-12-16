<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WaliKelasSeeder extends Seeder
{
    public function run()
    {
        // =========
        // Kelas 1
        // -----
        DB::table('kelas_siswas')->insert([
            'id_kelas' => 1,
            'id_pegawai' => 4,
            'tahun_ajaran' => '2023/2024',
            'tahun' => 2023,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('kelas_siswas')->insert([
            'id_kelas' => 2,
            'id_pegawai' => 28,
            'tahun_ajaran' => '2023/2024',
            'tahun' => 2023,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('kelas_siswas')->insert([
            'id_kelas' => 3,
            'id_pegawai' => 27,
            'tahun_ajaran' => '2023/2024',
            'tahun' => 2023,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // =========
        // Kelas 2
        // -----
        DB::table('kelas_siswas')->insert([
            'id_kelas' => 4,
            'id_pegawai' => 32,
            'tahun_ajaran' => '2023/2024',
            'tahun' => 2023,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('kelas_siswas')->insert([
            'id_kelas' => 5,
            'id_pegawai' => 12,
            'tahun_ajaran' => '2023/2024',
            'tahun' => 2023,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('kelas_siswas')->insert([
            'id_kelas' => 6,
            'id_pegawai' => 33,
            'tahun_ajaran' => '2023/2024',
            'tahun' => 2023,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // =========
        // Kelas 3
        // -----
        DB::table('kelas_siswas')->insert([
            'id_kelas' => 7,
            'id_pegawai' => 34,
            'tahun_ajaran' => '2023/2024',
            'tahun' => 2023,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('kelas_siswas')->insert([
            'id_kelas' => 8,
            'id_pegawai' => 24,
            'tahun_ajaran' => '2023/2024',
            'tahun' => 2023,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('kelas_siswas')->insert([
            'id_kelas' => 9,
            'id_pegawai' => 6,
            'tahun_ajaran' => '2023/2024',
            'tahun' => 2023,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // =========
        // Kelas 4
        // -----
        DB::table('kelas_siswas')->insert([
            'id_kelas' => 10,
            'id_pegawai' => 7,
            'tahun_ajaran' => '2023/2024',
            'tahun' => 2023,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('kelas_siswas')->insert([
            'id_kelas' => 11,
            'id_pegawai' => 35,
            'tahun_ajaran' => '2023/2024',
            'tahun' => 2023,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('kelas_siswas')->insert([
            'id_kelas' => 12,
            'id_pegawai' => 25,
            'tahun_ajaran' => '2023/2024',
            'tahun' => 2023,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // =========
        // Kelas 5
        // -----
        DB::table('kelas_siswas')->insert([
            'id_kelas' => 13,
            'id_pegawai' => 26,
            'tahun_ajaran' => '2023/2024',
            'tahun' => 2023,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('kelas_siswas')->insert([
            'id_kelas' => 14,
            'id_pegawai' => 20,
            'tahun_ajaran' => '2023/2024',
            'tahun' => 2023,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('kelas_siswas')->insert([
            'id_kelas' => 15,
            'id_pegawai' => 30,
            'tahun_ajaran' => '2023/2024',
            'tahun' => 2023,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // =========
        // Kelas 6
        // -----
        DB::table('kelas_siswas')->insert([
            'id_kelas' => 16,
            'id_pegawai' => 14,
            'tahun_ajaran' => '2023/2024',
            'tahun' => 2023,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('kelas_siswas')->insert([
            'id_kelas' => 17,
            'id_pegawai' => 11,
            'tahun_ajaran' => '2023/2024',
            'tahun' => 2023,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('kelas_siswas')->insert([
            'id_kelas' => 18,
            'id_pegawai' => 22,
            'tahun_ajaran' => '2023/2024',
            'tahun' => 2023,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
