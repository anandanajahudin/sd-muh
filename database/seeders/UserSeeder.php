<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'superadmin',
            'email' => 'superadmin@youthms.id',
            'password' => Hash::make('d4itb2017'),
            'jenis' => 'admin',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@youthms.id',
            'password' => Hash::make('d4itb2017'),
            'jenis' => 'admin',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        // Pegawai & Guru
        DB::table('users')->insert([
            'name' => 'Norma',
            'email' => 'normasetyaningrum@sekolahkaraktersdm24.sch.id',
            'password' => Hash::make('123'),
            'jenis' => 'Kepala Sekolah',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Siti Alfiyah, S.Ag',
            'email' => 'sitialfiyah@sekolahkaraktersdm24.sch.id',
            'password' => Hash::make('123'),
            'jenis' => 'Guru kelas I',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Rohma Inda Wahyu Wigati, S.Pd',
            'email' => 'rohmaindawahyuwigati@sekolahkaraktersdm24.sch.id',
            'password' => Hash::make('123'),
            'jenis' => 'Kaur sarpras',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Wiwik Purwati, S.Pd',
            'email' => 'wiwikpurwati@sekolahkaraktersdm24.sch.id',
            'password' => Hash::make('123'),
            'jenis' => 'Guru kelas III',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Neneng Sulian, S.Pd',
            'email' => 'nenengsulian@sekolahkaraktersdm24.sch.id',
            'password' => Hash::make('123'),
            'jenis' => 'Guru kelas IV',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Irmatun Nadhifah, S.Pd',
            'email' => 'irmatunnadhifah@sekolahkaraktersdm24.sch.id',
            'password' => Hash::make('123'),
            'jenis' => 'Waka Kurikulum',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Salman Alfarisi Boy Muslimun Romli, S.HI',
            'email' => 'salmanalfarisiboymuslimunromli@sekolahkaraktersdm24.sch.id',
            'password' => Hash::make('123'),
            'jenis' => 'Kaur Humas',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Achmad Zainuri Arif, S.Pd',
            'email' => 'achmadzainuriarif@sekolahkaraktersdm24.sch.id',
            'password' => Hash::make('123'),
            'jenis' => 'KS SDM 7',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Zuli Aisatul Umro, S.Pd',
            'email' => 'zuliaisatulumro@sekolahkaraktersdm24.sch.id',
            'password' => Hash::make('123'),
            'jenis' => 'Kaur Kepegawaian',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Diyan Sawiti, S.E',
            'email' => 'diyansawiti@sekolahkaraktersdm24.sch.id',
            'password' => Hash::make('123'),
            'jenis' => 'Guru kelas III',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Rizqy',
            'email' => 'rizqysamsulabidin@sekolahkaraktersdm24.sch.id',
            'password' => Hash::make('123'),
            'jenis' => 'admin',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Dwi Wulandari. S.Pd',
            'email' => 'dwiwulandari@sekolahkaraktersdm24.sch.id',
            'password' => Hash::make('123'),
            'jenis' => 'Guru kelas VI',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Sofia Dwi Alfianti, SPd',
            'email' => 'sofiadwialfianti@sekolahkaraktersdm24.sch.id',
            'password' => Hash::make('123'),
            'jenis' => 'Guru English',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Muhammad Assyifa',
            'email' => 'ahmadmuhammadassyifa@sekolahkaraktersdm24.sch.id',
            'password' => Hash::make('123'),
            'jenis' => 'Ka TU',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Arista Laili, S.Si',
            'email' => 'aristalaili@sekolahkaraktersdm24.sch.id',
            'password' => Hash::make('123'),
            'jenis' => 'Bendahara',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Nida Afifah, S.Pi',
            'email' => 'nidaafifah@sekolahkaraktersdm24.sch.id',
            'password' => Hash::make('123'),
            'jenis' => 'TU',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Wahyu Puspitasari, S.Pd',
            'email' => 'wahyupuspitasari@sekolahkaraktersdm24.sch.id',
            'password' => Hash::make('123'),
            'jenis' => 'Pendamping Biling',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Dewi Suwaibah, S.Pd',
            'email' => 'dewisuwaibah@sekolahkaraktersdm24.sch.id',
            'password' => Hash::make('123'),
            'jenis' => 'Guru kelas V',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Uswatun Hasanah',
            'email' => 'uswatunhasanah@sekolahkaraktersdm24.sch.id',
            'password' => Hash::make('123'),
            'jenis' => 'Pendamping Biling',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Syahri Nur Rahmadani Purnamawati, S.Pd',
            'email' => 'syahrinurrahmadanipurnamawati@sekolahkaraktersdm24.sch.id',
            'password' => Hash::make('123'),
            'jenis' => 'Guru kelas V',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Moch. Syamsul Arifien, S.Hum',
            'email' => 'mochsyamsularifien@sekolahkaraktersdm24.sch.id',
            'password' => Hash::make('123'),
            'jenis' => 'Guru Bhs. Arab',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Silvia Novianty, S.Pd',
            'email' => 'silvianovianty@sekolahkaraktersdm24.sch.id',
            'password' => Hash::make('123'),
            'jenis' => 'Guru kelas III',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Lelly Oktafiana, S.Pd',
            'email' => 'lellyoktafiana@sekolahkaraktersdm24.sch.id',
            'password' => Hash::make('123'),
            'jenis' => 'Guru kelas IV',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'M. Rohman Galih Tri',
            'email' => 'mrohmangalihtri@sekolahkaraktersdm24.sch.id',
            'password' => Hash::make('123'),
            'jenis' => 'Guru kelas V',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Ella Mafruchani, S.Pd',
            'email' => 'ellamafruchani@sekolahkaraktersdm24.sch.id',
            'password' => Hash::make('123'),
            'jenis' => 'Guru kelas bilingual',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Elvira Nur Ardelia, S.Pd',
            'email' => 'elviranurardelia@sekolahkaraktersdm24.sch.id',
            'password' => Hash::make('123'),
            'jenis' => 'Guru kelas 1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Nadya Anisaprilian, S.Pd',
            'email' => 'nadyaanisaprilian@sekolahkaraktersdm24.sch.id',
            'password' => Hash::make('123'),
            'jenis' => 'Guru OR',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Roisyatul Izza, S.Pd',
            'email' => 'roisyatulizza@sekolahkaraktersdm24.sch.id',
            'password' => Hash::make('123'),
            'jenis' => 'Guru kelas I',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Sri Rezeki Handayani',
            'email' => 'srirezekihandayani@sekolahkaraktersdm24.sch.id',
            'password' => Hash::make('123'),
            'jenis' => 'Guru seni rupa',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Anjar Ayu Utami Ningsih, S.Pd',
            'email' => 'anjarayuutaminingsih@sekolahkaraktersdm24.sch.id',
            'password' => Hash::make('123'),
            'jenis' => 'Guru kelas II',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Nindya Agustina, S.Pd',
            'email' => 'nindyaagustina@sekolahkaraktersdm24.sch.id',
            'password' => Hash::make('123'),
            'jenis' => 'Guru kelas bilingual',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Yunita Zulviati, S.Pd',
            'email' => 'yunitazulviati@sekolahkaraktersdm24.sch.id',
            'password' => Hash::make('123'),
            'jenis' => 'Guru kelas III',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Kadarwati, S.Pd',
            'email' => 'kadarwati@sekolahkaraktersdm24.sch.id',
            'password' => Hash::make('123'),
            'jenis' => 'Guru kelas IV',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Nurul Kurnia Anggraeni',
            'email' => 'nurulkurniaanggraeni@sekolahkaraktersdm24.sch.id',
            'password' => Hash::make('123'),
            'jenis' => 'Shadow',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Refilani Indah Kusuma',
            'email' => 'refilaniindahkusuma@sekolahkaraktersdm24.sch.id',
            'password' => Hash::make('123'),
            'jenis' => 'Shadow',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Frida Hidayati Subarto',
            'email' => 'fridahidayatisubarto@sekolahkaraktersdm24.sch.id',
            'password' => Hash::make('123'),
            'jenis' => 'Shadow',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Martini Kusumawati',
            'email' => 'martinikusumawati@sekolahkaraktersdm24.sch.id',
            'password' => Hash::make('123'),
            'jenis' => 'Shadow',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Nurul Sucahyo',
            'email' => 'nurulsucahyo@sekolahkaraktersdm24.sch.id',
            'password' => Hash::make('123'),
            'jenis' => 'Keamanan 1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Muhamad Agus Rianto',
            'email' => 'muhamadagusrianto@sekolahkaraktersdm24.sch.id',
            'password' => Hash::make('123'),
            'jenis' => 'Keamanan 2',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Julio Raditiyo Prambadi',
            'email' => 'julioraditiyoprambadi@sekolahkaraktersdm24.sch.id',
            'password' => Hash::make('123'),
            'jenis' => 'TU',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Amalia Widyasari Aziz',
            'email' => 'amaliawidyasariaziz@sekolahkaraktersdm24.sch.id',
            'password' => Hash::make('123'),
            'jenis' => 'TU',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Anita Rahmawati',
            'email' => 'anitarahmawati@sekolahkaraktersdm24.sch.id',
            'password' => Hash::make('123'),
            'jenis' => 'Guru Sains',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Nabighah Syakura Imanellya',
            'email' => 'nabighahsyakuraimanellya@sekolahkaraktersdm24.sch.id',
            'password' => Hash::make('123'),
            'jenis' => 'Guru Kelas 2 Tertib Bilingual',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Quni Masruroh',
            'email' => 'qunimasruroh@sekolahkaraktersdm24.sch.id',
            'password' => Hash::make('123'),
            'jenis' => 'Guru Kelas 2 Tertib Bilingual',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
