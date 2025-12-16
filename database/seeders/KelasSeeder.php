<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    public function run()
    {
        // =========
        // Kelas 1
        // -----
        // 1
        DB::table('kelas')->insert([
            'nama_kelas' => '1 DISIPLIN',
            'keterangan' => '1 DISIPLIN',
            'id_kelas_master' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 2
        DB::table('kelas')->insert([
            'nama_kelas' => '1 TANGGUNG JAWAB',
            'keterangan' => '1 TANGGUNG JAWAB',
            'id_kelas_master' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 3
        DB::table('kelas')->insert([
            'nama_kelas' => '1 MANDIRI',
            'keterangan' => '1 MANDIRI',
            'id_kelas_master' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // =========
        // Kelas 2
        // -----
        // 4
        DB::table('kelas')->insert([
            'nama_kelas' => '2 SOPAN',
            'keterangan' => '2 SOPAN',
            'id_kelas_master' => 4,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 5
        DB::table('kelas')->insert([
            'nama_kelas' => '2 SANTUN',
            'keterangan' => '2 SANTUN',
            'id_kelas_master' => 4,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 6
        DB::table('kelas')->insert([
            'nama_kelas' => '2 TERTIB',
            'keterangan' => '2 TERTIB BILINGUAL',
            'id_kelas_master' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // =========
        // Kelas 3
        // -----
        // 7
        DB::table('kelas')->insert([
            'nama_kelas' => '3 AMANAH',
            'keterangan' => '3 AMANAH',
            'id_kelas_master' => 6,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 8
        DB::table('kelas')->insert([
            'nama_kelas' => '3 BIJAKSANA',
            'keterangan' => '3 BIJAKSANA',
            'id_kelas_master' => 6,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 9
        DB::table('kelas')->insert([
            'nama_kelas' => '3 JUJUR',
            'keterangan' => '3 JUJUR',
            'id_kelas_master' => 6,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // =========
        // Kelas 4
        // -----
        // 10
        DB::table('kelas')->insert([
            'nama_kelas' => '4 KREATIF',
            'keterangan' => '4 KREATIF',
            'id_kelas_master' => 4,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 11
        DB::table('kelas')->insert([
            'nama_kelas' => '4 P.DIRI',
            'keterangan' => '4 PERCAYA DIRI',
            'id_kelas_master' => 4,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 12
        DB::table('kelas')->insert([
            'nama_kelas' => '4 TANGGUH',
            'keterangan' => '4 TANGGUH',
            'id_kelas_master' => 4,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // =========
        // Kelas 5
        // -----
        // 13
        DB::table('kelas')->insert([
            'nama_kelas' => '5 DERMAWAN',
            'keterangan' => '5 DERMAWAN',
            'id_kelas_master' => 5,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 14
        DB::table('kelas')->insert([
            'nama_kelas' => '5 FILANTROPI',
            'keterangan' => '5 FILANTROPI',
            'id_kelas_master' => 5,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 15
        DB::table('kelas')->insert([
            'nama_kelas' => '5 PEDULI',
            'keterangan' => '5 PEDULI',
            'id_kelas_master' => 5,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // =========
        // Kelas 6
        // -----
        // 16
        DB::table('kelas')->insert([
            'nama_kelas' => '6 CENDEKIA',
            'keterangan' => '6 CENDEKIA',
            'id_kelas_master' => 6,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 17
        DB::table('kelas')->insert([
            'nama_kelas' => '6 CERDAS',
            'keterangan' => '6 CERDAS',
            'id_kelas_master' => 6,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 18
        DB::table('kelas')->insert([
            'nama_kelas' => '6 GENIUS',
            'keterangan' => '6 GENIUS',
            'id_kelas_master' => 6,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
