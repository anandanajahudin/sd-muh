<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kelas;
use App\Models\KelasMaster;
use App\Models\KelasSiswa;
use App\Models\Pekerjaan;
use App\Models\Pegawai;
use App\Models\Ppdb;
use App\Models\SdMutasi;
use App\Models\Siswa;
use App\Models\TkMaster;
use App\Models\User;

class KelasSiswaController extends Controller
{
    public function index()
    {
        $kelasMaster = KelasMaster::all();
        $kelas = Kelas::with('tipeKelas')->orderBy('nama_kelas', 'ASC')->get();

        $kelasSiswa = KelasSiswa::with('namaKelas', 'waliKelas')
                        ->orderBy('id', 'DESC')->get();

        $pegawai = Pegawai::select('pegawais.*')
                    ->join('users', 'users.id', '=', 'pegawais.id_user')
                    ->where('users.jenis', '<>', 'siswa')
                    ->where('users.jenis','LIKE','%Guru%')
                    ->orderBy('pegawais.nama', 'ASC')
                    ->get();

        return view('pages.admin.bank_data.kelas_siswa.index',
        [
            'pegawai' => $pegawai,
            'kelas' => $kelas,
            'kelasMaster' => $kelasMaster,
            'kelasSiswa' => $kelasSiswa,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_kelas' => 'required',
            'tahun_ajaran' => 'required',
            'tahun' => 'required',
            'id_pegawai' => 'required'
        ]);

        KelasSiswa::create([
            'id_kelas' => $request->id_kelas,
            'tahun_ajaran' => $request->tahun_ajaran,
            'tahun' => $request->tahun,
            'id_pegawai' => $request->id_pegawai
        ]);

        return redirect()->route('kelasSiswa')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(KelasSiswa $kelasSiswa)
    {
        $kelas = Kelas::with('tipeKelas')->orderBy('nama_kelas', 'ASC')->get();
        $pegawai = Pegawai::select('pegawais.*')
                    ->join('users', 'users.id', '=', 'pegawais.id_user')
                    ->where('users.jenis', '=', 'guru')
                    ->orderBy('pegawais.nama', 'ASC')
                    ->get();

        return view('pages.admin.bank_data.kelas_siswa.show',
        [
            'kelas' => $kelas,
            'pegawai' => $pegawai
        ], compact('kelasSiswa'));
    }

    public function showListSiswa($id_kelas_siswa)
    {
        $listPekerjaanAyah = Pekerjaan::orderBy('judul', 'ASC')->where('judul', '<>', 'Ibu Rumah Tangga')->get();
        $listPekerjaanIbu = Pekerjaan::orderBy('judul', 'ASC')->get();
        $listPekerjaanWali = Pekerjaan::orderBy('judul', 'ASC')->get();

        $kelasSiswa = KelasSiswa::with('namaKelas', 'waliKelas')
                        ->orderBy('tahun_ajaran', 'ASC')->get();

        $ppdb = Ppdb::orderBy('tahun', 'ASC');
        $kelas = KelasSiswa::with('namaKelas', 'waliKelas')->where('id', $id_kelas_siswa)->get();
        $sdMutasi = SdMutasi::orderBy('kota', 'ASC')->orderBy('nama', 'ASC')->get();
        $tk = TkMaster::orderBy('nama', 'ASC')->get();

        $siswa = Siswa::select('siswas.*')
                    ->join('ppdb_siswas', 'ppdb_siswas.id', '=', 'siswas.id_ppdb_siswa')
                    ->join('kelas_siswas', 'kelas_siswas.id', '=', 'siswas.id_kelas_siswa')
                    ->join('kelas', 'kelas.id', '=', 'kelas_siswas.id_kelas')
                    ->where('siswas.id_kelas_siswa', '=', $id_kelas_siswa)
                    ->orderBy('kelas.nama_kelas', 'ASC')
                    ->orderBy('kelas_siswas.tahun_ajaran', 'ASC')
                    ->get();

        return view('pages.admin.bank_data.kelas_siswa.siswa',
        [
            'listPekerjaanAyah' => $listPekerjaanAyah,
            'listPekerjaanIbu' => $listPekerjaanIbu,
            'listPekerjaanWali' => $listPekerjaanWali,
            'ppdb' => $ppdb,
            'kelasSiswa' => $kelasSiswa,
            'kelas' => $kelas,
            'siswa' => $siswa,
            'tk' => $tk,
            'sdMutasi' => $sdMutasi
        ]);
    }

    public function update(Request $request, KelasSiswa $kelasSiswa)
    {
        $this->validate($request, [
            'id_kelas' => 'required',
            'tahun_ajaran' => 'required',
            'tahun' => 'required',
            'id_pegawai' => 'required'
        ]);

        $kelasSiswa->update($request->all());

        return redirect()->route('kelasSiswa')->with(['success' => 'Data berhasil diperbarui']);
    }

    public function destroy(KelasSiswa $kelasSiswa)
    {
        $kelasSiswa->delete();
        return redirect()->route('kelasSiswa')->with(['success' => 'Data berhasil dihapus!']);
    }

}
