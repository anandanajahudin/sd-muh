<?php

namespace App\Imports;

use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PegawaisImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Pegawai([
            'nama' => $row['nama'],
            'nip' => $row['nip'],
            'nik' => $row['nik'],
            'gender' => $row['gender'],
            'tempat_lahir' => $row['tempat_lahir'],
            'tgl_lahir' => $row['tgl_lahir'],
            'no_hp' => $row['no_hp'],
            'alamat' => $row['alamat'],
            'tgl_masuk' => $row['tgl_masuk'],
            'id_user' => $row['id_user'],
            'status' => $row['status'],
        ]);
    }
}
