<?php

namespace App\Imports;

// use App\Models\User;
// use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\User;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'jenis' => $row[0],
            'name' => $row[1],
            'email' => strtolower(str_replace(' ', '', $row[5])),
            'password' => Hash::make('123'),
        ]);
    }
}
