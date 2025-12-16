<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PegawaiSeeder extends Seeder
{
    public function run()
    {
        // 1
        DB::table('pegawais')->insert([
            'nama' => 'Super Admin',
            'nip' => '12345',
            'nik' => '12345',
            'gender' => 'L',
            'no_hp' => '08123456789',
            'alamat' => 'Pasuruan',
            'foto_ktp' => '',
            'foto' => 'logo.png',
            'id_user' => '2',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // 2
        DB::table('pegawais')->insert([
            'nama' => 'Admin',
            'nip' => '11223344',
            'nik' => '11223344',
            'gender' => 'L',
            'no_hp' => '085746763262',
            'alamat' => 'Pasuruan',
            'foto_ktp' => '',
            'foto' => 'logo.png',
            'id_user' => '1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Guru & Pegawai
        // 1
        // 3
        DB::table('pegawais')->insert([
            'nama' => 'Norma Setyaningrum, M.Pd',
            'nip' => '1032277',
            'gender' => 'P',
            'id_user' => '3',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 4
        DB::table('pegawais')->insert([
            'nama' => 'Siti Alfiyah, S.Ag',
            'nip' => '1325649',
            'gender' => 'P',
            'id_user' => '3',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 5
        DB::table('pegawais')->insert([
            'nama' => 'Rohma Inda Wahyu Wigati, S.Pd',
            'nip' => '912439',
            'gender' => 'P',
            'id_user' => '5',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 6
        DB::table('pegawais')->insert([
            'nama' => 'Wiwik Purwati, S.Pd',
            'nip' => '912435',
            'gender' => 'P',
            'id_user' => '6',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 7
        DB::table('pegawais')->insert([
            'nama' => 'Neneng Sulian, S.Pd',
            'nip' => '1284044',
            'gender' => 'P',
            'id_user' => '7',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 8
        DB::table('pegawais')->insert([
            'nama' => 'Irmatun Nadhifah, S.Pd',
            'nip' => '1284047',
            'gender' => 'P',
            'id_user' => '8',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 9
        DB::table('pegawais')->insert([
            'nama' => 'Salman Alfarisi Boy Muslimun Romli, S.HI',
            'nip' => '1100130',
            'gender' => 'L',
            'id_user' => '9',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 10
        DB::table('pegawais')->insert([
            'nama' => 'Achmad Zainuri Arif, S.Pd',
            'nip' => '1176176',
            'gender' => 'L',
            'id_user' => '10',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 11
        DB::table('pegawais')->insert([
            'nama' => 'Zuli Aisatul Umro, S.Pd',
            'nip' => '1140428',
            'gender' => 'P',
            'id_user' => '11',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 12
        DB::table('pegawais')->insert([
            'nama' => 'Diyan Sawiti, S.E',
            'nip' => '1284046',
            'gender' => 'P',
            'id_user' => '12',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // 11
        // 13
        DB::table('pegawais')->insert([
            'nama' => 'Rizqy Samsul Abidin, S.Or',
            'nip' => '1325651',
            'gender' => 'L',
            'id_user' => '13',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 14
        DB::table('pegawais')->insert([
            'nama' => 'Dwi Wulandari. S.Pd',
            'gender' => 'P',
            'id_user' => '14',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 15
        DB::table('pegawais')->insert([
            'nama' => 'Sofia Dwi Alfianti, SPd',
            'gender' => 'P',
            'id_user' => '15',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 16
        DB::table('pegawais')->insert([
            'nama' => 'Ahmad Muhammad Assyifa',
            'nip' => '1242411',
            'gender' => 'L',
            'id_user' => '16',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 17
        DB::table('pegawais')->insert([
            'nama' => 'Arista Laili, S.Si',
            'nip' => '1284042',
            'gender' => 'P',
            'id_user' => '17',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 18
        DB::table('pegawais')->insert([
            'nama' => 'Nida Afifah, S.Pi',
            'nip' => '1224571',
            'gender' => 'P',
            'id_user' => '18',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 19
        DB::table('pegawais')->insert([
            'nama' => 'Wahyu Puspitasari, S.Pd',
            'gender' => 'P',
            'id_user' => '19',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 20
        DB::table('pegawais')->insert([
            'nama' => 'Dewi Suwaibah, S.Pd',
            'gender' => 'P',
            'id_user' => '20',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 21
        DB::table('pegawais')->insert([
            'nama' => 'Uswatun Hasanah',
            'gender' => 'P',
            'id_user' => '21',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 22
        DB::table('pegawais')->insert([
            'nama' => 'Syahri Nur Rahmadani Purnamawati, S.Pd',
            'gender' => 'L',
            'id_user' => '22',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // 21
        // 23
        DB::table('pegawais')->insert([
            'nama' => 'Moch. Syamsul Arifien, S.Hum',
            'gender' => 'L',
            'id_user' => '23',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 24
        DB::table('pegawais')->insert([
            'nama' => 'Silvia Novianty, S.Pd',
            'gender' => 'P',
            'id_user' => '24',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 25
        DB::table('pegawais')->insert([
            'nama' => 'Lelly Oktafiana, S.Pd',
            'gender' => 'P',
            'id_user' => '25',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 26
        DB::table('pegawais')->insert([
            'nama' => 'M. Rohman Galih Tri',
            'gender' => 'L',
            'id_user' => '26',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 27
        DB::table('pegawais')->insert([
            'nama' => 'Ella Mafruchani, S.Pd',
            'gender' => 'P',
            'id_user' => '27',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 28
        DB::table('pegawais')->insert([
            'nama' => 'Elvira Nur Ardelia, S.Pd',
            'gender' => 'P',
            'id_user' => '28',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 29
        DB::table('pegawais')->insert([
            'nama' => 'Nadya Anisaprilian, S.Pd',
            'gender' => 'P',
            'id_user' => '29',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 30
        DB::table('pegawais')->insert([
            'nama' => 'Roisyatul Izza, S.Pd',
            'gender' => 'P',
            'id_user' => '30',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 31
        DB::table('pegawais')->insert([
            'nama' => 'Sri Rezeki Handayani',
            'gender' => 'P',
            'id_user' => '31',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 32
        DB::table('pegawais')->insert([
            'nama' => 'Anjar Ayu Utami Ningsih, S.Pd',
            'gender' => 'P',
            'id_user' => '32',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // 31
        // 33
        DB::table('pegawais')->insert([
            'nama' => 'Nindya Agustina, S.Pd',
            'gender' => 'P',
            'id_user' => '33',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 34
        DB::table('pegawais')->insert([
            'nama' => 'Yunita Zulviati, S.Pd',
            'gender' => 'P',
            'id_user' => '34',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 35
        DB::table('pegawais')->insert([
            'nama' => 'Kadarwati, S.Pd',
            'gender' => 'P',
            'id_user' => '35',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 36
        DB::table('pegawais')->insert([
            'nama' => 'Nurul Kurnia Anggraeni',
            'gender' => 'P',
            'id_user' => '36',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 37
        DB::table('pegawais')->insert([
            'nama' => 'Refilani Indah Kusuma',
            'gender' => 'P',
            'id_user' => '37',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 38
        DB::table('pegawais')->insert([
            'nama' => 'Frida Hidayati Subarto',
            'gender' => 'P',
            'id_user' => '38',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 39
        DB::table('pegawais')->insert([
            'nama' => 'Martini Kusumawati',
            'gender' => 'P',
            'id_user' => '39',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 40
        DB::table('pegawais')->insert([
            'nama' => 'Nurul Sucahyo',
            'gender' => 'L',
            'id_user' => '40',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 41
        DB::table('pegawais')->insert([
            'nama' => 'Muhamad Agus Rianto',
            'gender' => 'L',
            'id_user' => '41',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // 42
        DB::table('pegawais')->insert([
            'nama' => 'Julio Raditiyo Prambadi',
            'gender' => 'L',
            'id_user' => '42',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('pegawais')->insert([
            'nama' => 'Amalia Widyasari Aziz',
            'gender' => 'P',
            'id_user' => '43',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('pegawais')->insert([
            'nama' => 'Anita Rahmawati',
            'gender' => 'P',
            'id_user' => '44',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('pegawais')->insert([
            'nama' => 'Nabighah Syakura Imanellya',
            'gender' => 'P',
            'id_user' => '45',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('pegawais')->insert([
            'nama' => 'Quni Masruroh',
            'gender' => 'P',
            'id_user' => '46',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
