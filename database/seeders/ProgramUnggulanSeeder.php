<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramUnggulanSeeder extends Seeder
{
    public function run()
    {
        // 1
        DB::table('program_unggulans')->insert([
            'judul' => 'Pembelajaran Berbasis Proyek',
            'deskripsi' => 'Pembelajaran Berbasis Proyek adalah dengan menciptakan sebuah produk melalui kegiatan belajar dan praktek bersama.',
            'logo' => '1_logo.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        // 2
        DB::table('program_unggulans')->insert([
            'judul' => 'Semai Bintang Karakter',
            'deskripsi' => 'Semai Bintang Karakter adalah Program Unggulan yang bertujuan untuk memupuk keagamaan kepada para siswa-siswi, sehingga diharapkan siswa-siswi dapat berbakti kepada orangtua, dan taat kepada Allah.',
            'logo' => '2_logo.png',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        // 3
        DB::table('program_unggulans')->insert([
            'judul' => 'Program Tahfidz & Tilawah Pagi',
            'deskripsi' => 'Program Tahfidz & Tilawah Pagi selalu rutin dilaksanakan bersama di pagi hari sebelum memulai kegiatan belajar mengajar',
            'logo' => '3_logo.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        // 4
        DB::table('program_unggulans')->insert([
            'judul' => 'Out Door Class & Outbound',
            'deskripsi' => 'Out Door Class & Outbound bertujuan untuk melatih kemandirian, ketangkasan, dan kreativitas bagi siswa-siswi dengan melakukan kegiatan belajar mengajar di luar sekolah.',
            'logo' => '4_logo.png',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        // 5
        DB::table('program_unggulans')->insert([
            'judul' => 'Pesantren Karakter',
            'deskripsi' => 'Pesantren Karakter adalah kegiatan dari program unggulan untuk melakukan kegiatan pondok pesantren diantaranya mengaji, shalat, dan sebagainya. Kegiatan ini dilakukan pada sore hari.',
            'logo' => '5_logo.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        // 6
        DB::table('program_unggulans')->insert([
            'judul' => 'Super Camp of Character',
            'deskripsi' => 'Super Camp of Character adalah kegiatan perkemahan dengan menjelajahi alam dan lingkungan sekitar, sehingga bertujuan untuk memupuk dan menciptakan rasa kepedulian terhadap lingkungan bagi siswa-siswi.',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'logo' => '6_logo.jpg',
        ]);

        // 7
        DB::table('program_unggulans')->insert([
            'judul' => 'English Club & English Camp',
            'deskripsi' => 'English Club & English Camp adalah kegiatan belajar yang menerapkan bahasa Inggris dalam kesehariannya, seperti percakapan, tanya jawab, dan sebagainya menggunakan bahasa Inggris. Sehingga diharapkan siswa-siswi dapat meningkatkan kemampuan dalam bahasa Inggris.',
            'logo' => '7_logo.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        // 8
        DB::table('program_unggulans')->insert([
            'judul' => 'Business Day',
            'deskripsi' => 'Business Day adalah kegiatan program unggulan yang bertujuan untuk memupuk dan melatih siswa-siswi untuk berwirausaha dengan menciptakan produk, maupun menjual produknya sendiri kepada bapak ibu guru dan teman-temannya.',
            'logo' => '8_logo.png',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        // 9
        DB::table('program_unggulans')->insert([
            'judul' => 'Puncak Tema',
            'deskripsi' => 'Puncak Tema adalah kegiatan program unggulan yang paling akhir yaitu memberikan pembelajaran, pendidikan, dan muhasabah bagi siswa-siswi agar menjadi putra-putri yang shalih dan shalihah. Selain itu bertujuan untuk meningkatkan rasa cinta bagi siswa-siswi dengan bapak ibu guru dan juga wali murid.',
            'logo' => '9_logo.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
