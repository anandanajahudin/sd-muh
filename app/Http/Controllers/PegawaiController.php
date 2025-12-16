<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Imports\UsersImport;
use App\Imports\PegawaisImportNew;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\KelasSiswa;
use App\Models\Pegawai;
use App\Models\User;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::all();
        $jenisPegawai = DB::table('users')
                 ->select('jenis')
                 ->orderBy('jenis', 'ASC')
                 ->groupBy('jenis')
                 ->get();

        return view('pages.admin.bank_data.pegawai.index',
        [
            'pegawai' => $pegawai,
            'jenisPegawai' => $jenisPegawai,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'nip' => 'nullable|numeric|unique:pegawais',
            'nik' => 'required|numeric|unique:pegawais',
            'gender' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'no_hp' => 'required|numeric',
            'alamat' => 'required',
            'name' => 'required',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required',
            'jenis' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'jenis' => $request->jenis,
        ]);

        $idUser = User::latest()->first()->id;

        Pegawai::create([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'nik' => $request->nik,
            'gender' => $request->gender,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'id_user' => $idUser,
        ]);

        return redirect()->route('pegawai')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function storeFoto(Request $request, Pegawai $pegawai)
    {
        $this->validate($request, [
            'id_pegawai' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,|max:2048'
        ]);

        $kode = $request->id_pegawai;
        $imgFotoName = 'foto_'.$kode.'.'.$request->foto->extension();
        $pegawai->update(['foto' => $imgFotoName]);

        $request->foto->storeAs('pegawai/'.$kode, $imgFotoName, 'public');

        return redirect()->route('pegawai')->with(['success' => 'Foto Berhasil Diupload!']);
    }

    public function storeFotoKtp(Request $request, Pegawai $pegawai)
    {
        $this->validate($request, [
            'id_pegawai' => 'required',
            'foto_ktp' => 'required|image|mimes:jpeg,png,jpg,|max:2048'
        ]);

        $kode = $request->id_pegawai;
        $imgFotoName = 'ktp_'.$kode.'.'.$request->foto_ktp->extension();
        $pegawai->update(['foto_ktp' => $imgFotoName]);

        $request->foto_ktp->storeAs('pegawai/'.$kode, $imgFotoName, 'public');

        return redirect()->route('pegawai')->with(['success' => 'Foto KTP Berhasil Diupload!']);
    }

    public function show(Pegawai $pegawai)
    {
        $pegawais = Pegawai::with('userPegawai')->get();
        $users = User::all();
        $kelasSiswa = KelasSiswa::with('namaKelas', 'waliKelas')
                        ->where('id_pegawai', '=', $pegawai->id)
                        ->orderBy('tahun_ajaran', 'ASC')->get();

        return view('pages.admin.bank_data.pegawai.show',
        [
            'users' => $users,
            'kelasSiswa' => $kelasSiswa
        ], compact('pegawai'));
    }

    public function update(Request $request, Pegawai $pegawai)
    {
        $this->validate($request, [
            'nama' => 'required',
            'nip' => 'nullable|numeric',
            'nik' => 'required|numeric',
            'gender' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'no_hp' => 'required|numeric',
            'alamat' => 'required'
        ]);

        $pegawai->update($request->all());

        return redirect()->route('pegawai')->with(['success' => 'Data berhasil diperbarui']);
    }

    public function updatePasswordPegawai(Request $request, User $user)
    {
        $this->validate($request, [
            'password' => 'required'
        ]);

        $user->update(['password' => Hash::make($request->password)]);

        return redirect()->route('pegawai')->with(['success' => 'Password berhasil diperbarui']);
    }

    public function importUser()
    {
        Excel::import(new UsersImport,request()->file('file'));

        return redirect()->route('pegawai')->with(['success' => 'Data User berhasil diimport']);
    }

    public function import()
    {
        Excel::import(new PegawaisImportNew,request()->file('file'));

        return redirect()->route('pegawai')->with(['success' => 'Data berhasil diimport']);
    }

    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect()->route('pegawai')->with(['success' => 'Data berhasil dihapus!']);
    }
}
