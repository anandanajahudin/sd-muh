<?php

namespace App\Imports;

use App\Models\Siswa;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class SiswaImport implements ToModel
{
    public function model(array $row)
    {
        return new Siswa([
            'id_user' => $row[2],
            'id_ppdb_siswa' => $row[3],
            'id_kelas_siswa' => $row[4],
        ]);
    }
}
