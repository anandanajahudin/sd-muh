<?php

namespace App\Imports;

use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\ToModel;

class PegawaisImport implements ToModel
{
    public function model(array $row)
    {
        return new Pegawai([
            'nama' => $row[0],
            'nip' => $row[1],
            'nik' => $row[2],
            'gender' => $row[3],
            'tempat_lahir' => $row[4],
            'tgl_lahir' => $row[5],
            'no_hp' => $row[6],
            'alamat' => $row[7],
            'tgl_masuk' => $row[8],
            'id_user' => $row[9],
            'status' => $row[10],
        ]);
    }
}
