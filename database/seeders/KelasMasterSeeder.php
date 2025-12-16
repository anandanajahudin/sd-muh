<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasMasterSeeder extends Seeder
{
    public function run()
    {
        // =========
        // Kelas 1
        // -----
        // 1
        DB::table('kelas_masters')->insert([
            'judul' => '1 Billingual',
            'jenis' => 'Billingual',
            'kelas' => 1,
            'keterangan' => '<p>25 Siswa/Kelas</p><p>Tipe Kelas 3 Bahasa</p><p>Program Hafidz Quran 3 Juz</p><ul></ul>',
            'deskripsi' => '<p>KELAS BILINGUAL</p>

            <p>Merupakan salah satu program unggulan yang terdapat pada Sekolah Karakter 24 Surabaya. Kami menyediakan berbagai fasilitas dan target program pembelajaran untuk siswa-siswi sehingga siswa-siswi dapat berkembang dan menjadi siswa-siswi yang bermoral tinggi dan berprestasi.</p>

            <p>Target pembelajaran Kelas Bilingual diantaranya :</p>

            <ul>
                <li>Target hafidz Qur&#39;an 3 juz</li>
                <li>Pembelajaran menggunakan 3 bahasa</li>
                <li>Satu kelas didampingi oleh 2 guru</li>
            </ul>

            <p>Program unggulan ini terdiri dari :</p>

            <ul>
                <li>Pembelajaran Berbasis Proyek</li>
                <li>Semai Bintang Karakter</li>
                <li>Program Tahfidz &amp; Tilawah Pagi</li>
                <li>Out Door Class &amp; Outbound</li>
                <li>Pesantren Karakter</li>
                <li>Super Camp of Character</li>
                <li>English Club &amp; English Camp</li>
                <li>Business Day</li>
                <li>Puncak Tema</li>
            </ul>',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 2
        DB::table('kelas_masters')->insert([
            'judul' => '1 Reguler',
            'jenis' => 'Reguler',
            'kelas' => 1,
            'keterangan' => '<p>25-28 Siswa/Kelas</p><p>Tipe Kelas 1 Bahasa</p><p>Program Hafidz Quran 2 Juz</p>',
            'deskripsi' => '<p>KELAS REGULER</p>

            <p>Merupakan salah satu program reguler yang terdapat pada Sekolah Karakter 24 Surabaya. Kami menyediakan berbagai target program pembelajaran untuk siswa-siswi sehingga siswa-siswi dapat berkembang dan menjadi siswa-siswi yang bermoral tinggi dan berprestasi.</p>

            <p>Target pembelajaran Kelas Reguler diantaranya :</p>

            <ul>
                <li>Target hafidz Qur&#39;an 2&nbsp;juz</li>
                <li>Jumlah siswa per kelas 25 siswa</li>
            </ul>',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // =========
        // Kelas 2
        // -----
        // 3
        DB::table('kelas_masters')->insert([
            'judul' => '2 Billingual',
            'jenis' => 'Billingual',
            'kelas' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 4
        DB::table('kelas_masters')->insert([
            'judul' => '2 Reguler',
            'jenis' => 'Reguler',
            'kelas' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // =========
        // Kelas 3
        // -----
        // 5
        DB::table('kelas_masters')->insert([
            'judul' => '3 Billingual',
            'jenis' => 'Billingual',
            'kelas' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 6
        DB::table('kelas_masters')->insert([
            'judul' => '3 Reguler',
            'jenis' => 'Reguler',
            'kelas' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // =========
        // Kelas 4
        // -----
        // 7
        DB::table('kelas_masters')->insert([
            'judul' => '4 Billingual',
            'jenis' => 'Billingual',
            'kelas' => 4,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 8
        DB::table('kelas_masters')->insert([
            'judul' => '4 Reguler',
            'jenis' => 'Reguler',
            'kelas' => 4,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // =========
        // Kelas 5
        // -----
        // 9
        DB::table('kelas_masters')->insert([
            'judul' => '5 Billingual',
            'jenis' => 'Billingual',
            'kelas' => 5,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 10
        DB::table('kelas_masters')->insert([
            'judul' => '5 Reguler',
            'jenis' => 'Reguler',
            'kelas' => 5,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // =========
        // Kelas 6
        // -----
        // 11
        DB::table('kelas_masters')->insert([
            'judul' => '6 Billingual',
            'jenis' => 'Billingual',
            'kelas' => 6,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 12
        DB::table('kelas_masters')->insert([
            'judul' => '6 Reguler',
            'jenis' => 'Reguler',
            'kelas' => 6,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

    }
}
