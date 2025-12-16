<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilSeeder extends Seeder
{
    public function run()
    {
        DB::table('profils')->insert([
            'judul' => 'Membentuk Generasi Berkarakter, Berprestasi, Mendunia',
            'keterangan' => '<p>Merupakan Sekolah Islam Unggulan yang didirikan oleh Muhammadiyah pada 9 Maret tahun 1978. Pendirian SEKOLAH KARAKTER merupakan respon terhadap tantangan generasi masa depan Indonesia yang semakin kompleks, sehingga penting untuk mempersiapkan Generasi Unggul dan terbaik agar dapat menjawab tantangan masa depan.</p><p>Cita-cita kami untuk menjadi Sekolah Unggul yang berprestasi menjadi pijakan SEKOLAH KARAKTER dalam menyelenggarakan, mengembangkan, serta optimalisasi semua potensi yang dimiliki warga sekolah.</p>',
            'deskripsi' => '<p>SEKOLAH KARAKTER SD MUHAMMADIYAH 24 SURABAYA merupakan Sekolah Islam Unggulan yang didirikan oleh Muhammadiyah pada 9 Maret tahun 1978. Pendirian&nbsp;<strong>SEKOLAH KARAKTER</strong>&nbsp;merupakan respon terhadap tantangan generasi masa depan Indonesia yang semakin kompleks, sehingga penting untuk mempersiapkan&nbsp;<strong>Generasi Unggul dan Terbaik</strong>&nbsp;agar dapat menjawab tantangan masa depan.</p><p>Visi Menjadi Sekolah Unggul yang Berkarakter dan Berprestasi menjadi pijakan&nbsp;<strong>SEKOLAH KARAKTER</strong>&nbsp;dalam menyelenggarakan, mengembangkan, serta optimalisasi semua potensi yang dimiliki warga sekolah.</p><p><strong>Pendidikan Karakter yang Kontekstual (Contextual), Menyenangkan (Joyfull) dan Bermakna (Meaningful)</strong>,&nbsp;<strong>SEKOLAH KARAKTER</strong>&nbsp;terus berupaya menanamkan nilai-nilai kehidupan dan optimalisasi potensi anak melalui 5 Pilar DEBEST (Qurani, Saintek, Literasi, Sport &amp; Art dan Social Responcibility) dan Penyemaian 6 Bintang Karakter yang dikemas secara sistematis, metodis dan terukur dalam Kurikulum 24.</p>',
            'judul_visi' => 'Menjadi Sekolah Unggul, Berkarakter dan Berprestasi',
            'deskripsi_visi' => '-',
            'daycare' => '<p><strong>Daycare 24</strong>&nbsp;adalah program fasilitas dari Sekolah Karakter 24 Surabaya agar memudahkan para Pengajar untuk menitipkan putra-putrinya selama kegiatan belajar mengajar, tanpa khawatir putra-putrinya tidak mendapatkan perhatian.</p><p>Pada program&nbsp;<strong>Daycare 24</strong>&nbsp;kami menyediakan pendampingan dan edukasi kepada putra-putri bapak ibu Pengajar untuk bermain, belajar, beribadah seperti shalat, mengaji, serta melatih kreativitas putra-putri dengan melakukan praktek bersama teman-teman dan pendamping Daycare 24.</p>',
            'daycare_img' => 'daycare.jpg',
            'alamat' => 'Jl. Ketintang No.45 Kota Surabaya',
            'operasional' => 'Senin - Sabtu (07:00 - 16:00 WIB)',
            'email' => 'sdmuhammadiyah24sby@gmail.com',
            'telp' => '62318274477',
            'link_fb' => 'https://web.facebook.com/sekolahkarakter24/',
            'link_ig' => 'https://www.instagram.com/sdm24ketintang/?hl=id',
            'link_twitter' => 'https://twitter.com/sdm24ketintang',
            'link_yutub' => 'https://www.youtube.com/@24TVSurabaya',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
