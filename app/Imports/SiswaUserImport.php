<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class SiswaUserImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'jenis' => 'siswa',
            'name' => $row[0],
            'email' => strtolower(str_replace(' ', '', $row[1])),
            'password' => Hash::make('123'),
        ]);
    }
}
