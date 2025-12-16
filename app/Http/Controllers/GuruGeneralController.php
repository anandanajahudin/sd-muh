<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\GuruGeneral;
use Illuminate\Http\Request;

class GuruGeneralController extends Controller
{
    public function index()
    {
        $guru = GuruGeneral::with('user')->latest()->get();
        return view('pages.admin.bank_data.guru_general.index', compact('guru'));
    }

    public function create()
    {
        $users = User::all();
        return view('pages.admin.bank_data.guru_general.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'  => 'required|string|max:100',
            'kelas' => 'nullable|integer'
        ]);

        // 1. Generate Email dari Nama
        $namaLower = strtolower($request->nama);
        $emailUser = preg_replace('/[^a-z0-9]/', '', str_replace(' ', '', $namaLower));
        $email = $emailUser . '@sekolahkaraktersdm24.sch.id';

        // Jika email sudah dipakai, tambahkan angka
        $counter = 1;
        $originalEmail = $email;

        while (User::where('email', $email)->exists()) {
            $email = $emailUser . $counter . '@sekolahkaraktersdm24.sch.id';
            $counter++;
        }

        // 2. Generate Password (bisa diubah)
        $password = bcrypt('123'); // default password

        // 3. Create User untuk Login
        $user = User::create([
            'name'     => $emailUser,
            'email'    => $email,
            'password' => $password,
            'jenis'     => 'gurugeneral',     // jika ada kolom role
        ]);

        // 4. Simpan Data Guru
        GuruGeneral::create([
            'id_user' => $user->id,
            'nama'    => $request->nama,
            'kelas'   => $request->kelas
        ]);

        return redirect()->route('guruGeneral.dashboard.index')
                        ->with('success', 'Data Guru berhasil ditambahkan! Email login: '.$email);
    }


    public function edit($id)
    {
        $guru = GuruGeneral::findOrFail($id);
        $users = User::all();

        return view('pages.admin.bank_data.guru_general.edit', compact('guru', 'users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'  => 'required|string|max:100',
            'kelas' => 'nullable|integer'
        ]);

        // Ambil data guru
        $guru = GuruGeneral::findOrFail($id);

        // Ambil user terkait
        $user = User::findOrFail($guru->id_user);

        $namaLower = strtolower($request->nama);
        $emailUser = preg_replace('/[^a-z0-9]/', '', str_replace(' ', '', $namaLower));

        // Cek apakah nama berubah
        if ($user->name !== $request->nama) {

            // 1. Generate email baru dari nama
            $email = $emailUser . '@sekolahkaraktersdm24.sch.id';

            $counter = 1;
            $original = $email;

            while (User::where('email', $email)->where('id', '!=', $user->id)->exists()) {
                $email = $emailUser . $counter . '@sekolahkaraktersdm24.sch.id';
                $counter++;
            }

            // 2. Update user
            $user->update([
                'name'  => $emailUser,
                'email' => $email,
            ]);
        } else {
            // Kalau nama tidak berubah → tetap update name saja
            $user->update([
                'name' => $emailUser,
            ]);
        }

        // 3. Update data guru
        $guru->update([
            'nama'  => $request->nama,
            'kelas' => $request->kelas
        ]);

        return redirect()->route('guruGeneral.dashboard.index')
                        ->with('success', 'Data Guru berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $guru = GuruGeneral::findOrFail($id);
        $guru->delete();

        return redirect()->route('guruGeneral.dashboard.index')
                         ->with('success', 'Data Guru berhasil dihapus!');
    }
}
