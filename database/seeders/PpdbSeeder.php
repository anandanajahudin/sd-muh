<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PpdbSeeder extends Seeder
{
    public function run()
    {
        $tahunIni = Carbon::now()->format('Y');
        $tahunDepan = date('Y', strtotime('+1 year', strtotime($tahunIni)) );
        $tglAwal = date('Y-m-01');
        $tglAkhir = date('Y-m-t');
        $tahunAjaran = $tahunIni.'/'.$tahunDepan;

        DB::table('ppdbs')->insert([
            'judul' => 'PPDB '. $tahunAjaran,
            'tgl_awal' => $tglAwal,
            'tgl_batas' => $tglAkhir,
            'tahun_ajaran' => $tahunAjaran,
            'tahun' => $tahunIni,
            'link' => 'OEycjwiXYgA',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('ppdbs')->insert([
            'judul' => 'PPDB 2024/2025',
            'tgl_awal' => '2024-04-01',
            'tgl_batas' => '2024-07-01',
            'tahun_ajaran' => '2024/2025',
            'tahun' => '2024',
            'link' => 'OEycjwiXYgA',
            'file' => 'brosur-ppdb-2024.pdf',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
