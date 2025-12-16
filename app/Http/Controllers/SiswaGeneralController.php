<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SiswaGeneral;
use Illuminate\Http\Request;

class SiswaGeneralController extends Controller
{
    public function index()
    {
        $siswa = SiswaGeneral::with('user')->latest()->get();
        return view('pages.admin.bank_data.siswa_general.index', compact('siswa'));
    }

    public function create()
    {
        $users = User::all();
        return view('pages.admin.bank_data.siswa_general.create', compact('users'));
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
            'jenis'     => 'siswageneral',     // jika ada kolom role
        ]);

        // 4. Simpan Data Siswa
        SiswaGeneral::create([
            'id_user' => $user->id,
            'nama'    => $request->nama,
            'kelas'   => $request->kelas
        ]);

        return redirect()->route('siswaGeneral.dashboard.index')
                        ->with('success', 'Data Siswa berhasil ditambahkan! Email login: '.$email);
    }


    public function edit($id)
    {
        $siswa = SiswaGeneral::findOrFail($id);
        $users = User::all();

        return view('pages.admin.bank_data.siswa_general.edit', compact('siswa', 'users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'  => 'required|string|max:100',
            'kelas' => 'nullable|integer'
        ]);

        // Ambil data siswa
        $siswa = SiswaGeneral::findOrFail($id);

        // Ambil user terkait
        $user = User::findOrFail($siswa->id_user);

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

        // 3. Update data siswa
        $siswa->update([
            'nama'  => $request->nama,
            'kelas' => $request->kelas
        ]);

        return redirect()->route('siswaGeneral.dashboard.index')
                        ->with('success', 'Data Siswa berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $siswa = SiswaGeneral::findOrFail($id);
        $siswa->delete();

        return redirect()->route('siswaGeneral.dashboard.index')
                         ->with('success', 'Data Siswa berhasil dihapus!');
    }
}
