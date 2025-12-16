<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EkskulSeeder extends Seeder
{
    public function run()
    {
        // 1
        DB::table('ekskuls')->insert([
            'judul' => 'Hizbul Wathan',
            'jenis' => 'Organisasi',
            'deskripsi' => 'Hizbul Wathan adalah salah satu ekstrakulikuler wajib yang diadakan oleh sekolah untuk melatih kemandirian, ketangkasan, dan kecerdasan bagi para siswa-siswi',
            'logo' => '1_logo.png',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // 2
        DB::table('ekskuls')->insert([
            'judul' => 'Paskibra',
            'jenis' => 'Organisasi',
            'deskripsi' => 'Paskibra adalah salah satu ekstrakulikuler yang bertujuan untuk melatih kedisiplinan, ketangguhan, dan kecerdasan siswa-siswi dengan berlatih baris-berbaris, upacara, dan lainnya.',
            'logo' => '2_logo.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // 3
        DB::table('ekskuls')->insert([
            'judul' => 'Berenang',
            'jenis' => 'Olahraga',
            'deskripsi' => 'Berenang adalah salah satu ekstrakulikuler yang paling diminati oleh para siswa-siswi, karena dapat meningkatkan ketahanan fisik, kecerdasan, dan ketangkasan anak-anak.',
            'logo' => '3_logo.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // 4
        DB::table('ekskuls')->insert([
            'judul' => 'Sepakbola',
            'jenis' => 'Olahraga',
            'deskripsi' => 'Sepakbola adalah salah satu olahraga terfavorit di Indonesia. Dengan menyalurkan bakat anak-anak terhadap sepakbola, sehingga diharapkan dapat menciptakan generasi sepakbola berbakat dan berprestasi',
            'logo' => '4_logo.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // 5
        DB::table('ekskuls')->insert([
            'judul' => 'Tapak Suci',
            'jenis' => 'Olahraga',
            'deskripsi' => 'Tapak Suci adalah salah satu bela diri bagi siswa-siswi untuk melatih kebugaran, ketangkasan, dan seni bela diri bagi siswa-siswi, selain itu Tapak Suci juga sangat ruti mengikuti kejuaraan dan mendapatkan prestasi dalam perlombaan bela diri.',
            'logo' => '5_logo.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // 6
        DB::table('ekskuls')->insert([
            'judul' => 'Tari',
            'jenis' => 'Seni',
            'deskripsi' => 'Seni Tari adalah ekstrakulikuler yang sangat diminari para siswi, ekskul Tari juga sangat sering mengikuti lomba dan memenangkan perlombaan di tingkat kota.',
            'logo' => '6_logo.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // 7
        DB::table('ekskuls')->insert([
            'judul' => 'Panahan',
            'jenis' => 'Olahraga',
            'deskripsi' => 'Panahan adalah cabang olahraga yang sangat dianjurkan dan disunnahkan oleh Rasulullah. Di sekolah kami menyediakan Ekstrakulikuler Panahan dengan harapan siswa-siswi dapat melatih ketangkasan, konsentrasi, fokus, dan bisa berprestasi.',
            'logo' => '7_logo.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        //
        DB::table('ekskuls')->insert([
            'judul' => 'Cooking Class',
            'jenis' => 'Keterampilan',
            'deskripsi' => 'Cooking Class adalah salat satu ekstrakulikuler yang bertujuan untuk melatih keterampilan siswa-siswi dalam memasak.',
            'logo' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('ekskuls')->insert([
            'judul' => 'Art and Craft',
            'jenis' => 'Keterampilan',
            'deskripsi' => 'Art and Craft menyediakan sarana kepada siswa-siswi untuk melatih kreativitasnya dalam menciptakan inovasi berupa keterampilan.',
            'logo' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('ekskuls')->insert([
            'judul' => 'Nasyid',
            'jenis' => 'Keagamaan',
            'deskripsi' => 'Nasyid adalah ekstrakulikuler keagamaan dalam menyalurkan bakat siswa-siswi yang memiliki suara yang indah sehingga dapat memperoleh prestasi.',
            'logo' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('ekskuls')->insert([
            'judul' => 'Komputer',
            'jenis' => 'Pengetahuan',
            'deskripsi' => 'Komputer adalah ekstrakulikuler untuk memberikan sarana kepada siswa-siswi agar dapat mengikuti perkembangan teknologi serta memperoleh prestasi di bidang komputer.',
            'logo' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('ekskuls')->insert([
            'judul' => 'Tahfidz',
            'jenis' => 'Keagamaan',
            'deskripsi' => 'Tahfidz adalah ekstrakulikuler keagamaan yang bertujuan untuk melatih kemampuan siswa-siswi dalam menghafal ayas suci Al-Quran.',
            'logo' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('ekskuls')->insert([
            'judul' => 'Palang Merah Indonesia (PMI)',
            'jenis' => 'Organisasi',
            'deskripsi' => 'PMI adalah ekstrakulikuler organisasi yang bertujuan untuk melatih kemampuan siswa-siswi dalam bidang kesehatan dan kepedulian.',
            'logo' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('ekskuls')->insert([
            'judul' => 'Qiroah',
            'jenis' => 'Keagamaan',
            'deskripsi' => 'Qiroah adalah ekstrakulikuler yang bertujuan untuk melatih siswa-siswi dalam bidang membaca Al-Quran dengan nada dan seni tertentu.',
            'logo' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('ekskuls')->insert([
            'judul' => 'Olahraga Tradisional',
            'jenis' => 'Olahraga',
            'deskripsi' => 'Olahraga tradisional adalah wadah untuk siswa-siswi dalam melestarikan olahraga tradisional.',
            'logo' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('ekskuls')->insert([
            'judul' => 'Floor Ball',
            'jenis' => 'Olahraga',
            'deskripsi' => 'Floor Ball adalah olahraga lantai yang bertujuan untuk melatih kerjasama dan kekuatan bagi siswa-siswi.',
            'logo' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('ekskuls')->insert([
            'judul' => 'Berkisah',
            'jenis' => 'Seni',
            'deskripsi' => 'Berkisah adalah ekstrakulikuler yang memfasilitasi siswa-siswi yang senang bercerita.',
            'logo' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('ekskuls')->insert([
            'judul' => 'English Fun',
            'jenis' => 'Pengetahuan',
            'deskripsi' => 'English Fun bertujuan untuk melatih kemampuan siswa-siswi dalam berbicara, menulis, dan memahami bahasa Inggris.',
            'logo' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('ekskuls')->insert([
            'judul' => 'Science Fun',
            'jenis' => 'Pengetahuan',
            'deskripsi' => 'Science Fun bertujuan untuk melatih kemampuan dan pemahaman siswa-siswi dalam bidang sains.',
            'logo' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

    }
}
