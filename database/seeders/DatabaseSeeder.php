<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\NilaiSekolah;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            PegawaiSeeder::class,
            PpdbSeeder::class,
            JenisModulSeeder::class,
            ProfilSeeder::class,
            MisiSeeder::class,
            MasterMuhasabahSeeder::class,
            TkMasterSeeder::class,
            PekerjaanSeeder::class,
            SifatMasterSeeder::class,
            EkskulSeeder::class,
            ProgramUnggulanSeeder::class,
            KelasMasterSeeder::class,
            KelasSeeder::class,
            TestimoniSeeder::class,
            WaliKelasSeeder::class,
            NilaiSekolahSeeder::class,
        ]);
    }
}
