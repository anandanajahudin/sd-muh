<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class PegawaisImportNew implements ToModel
{
    public function model(array $row)
    {
        return new Pegawai([
            'nama' => $row[1],
            'nip' => $row[2],
            'gender' => $row[3],
            'id_user' => $row[4],
        ]);
    }
}
