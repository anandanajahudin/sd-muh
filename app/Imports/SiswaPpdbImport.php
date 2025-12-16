<?php

namespace App\Imports;

use App\Models\PpdbSiswa;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class SiswaPpdbImport implements ToModel
{
    public function model(array $row)
    {
        return new PpdbSiswa([
            'nama' => $row[0],
        ]);
    }
}
