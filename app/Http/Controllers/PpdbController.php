<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\KelasSiswa;
use App\Models\Ppdb;
use App\Models\PpdbSiswa;
use App\Models\Pekerjaan;
use App\Models\Siswa;
use App\Models\TkMaster;
use App\Models\User;

class PpdbController extends Controller
{
    public function index()
    {
        $ppdb = Ppdb::orderBy('tahun', 'DESC')->get();
        return view('pages.admin.ppdb.master.index', ['ppdb' => $ppdb]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'tgl_awal' => 'required',
            'tgl_batas' => 'required',
            'tahun_ajaran' => 'required',
            'tahun' => 'required|numeric',
            'deskripsi' => 'nullable',
            'gambar' => 'nullable|mimes:jpeg,png,jpg',
            'file' => 'nullable|mimes:pdf',
            'link' => 'nullable',
        ]);

        Ppdb::create([
            'judul' => $request->judul,
            'tgl_awal' => $request->tgl_awal,
            'tgl_batas' => $request->tgl_batas,
            'tahun_ajaran' => $request->tahun_ajaran,
            'tahun' => $request->tahun,
            'deskripsi' => $request->deskripsi,
            'link' => $request->link,
        ]);

        $kode = Ppdb::latest()->first()->id;
        $tahunIni = Ppdb::where('id', $kode)->first()->tahun;

        if($request->hasFile('gambar')) {
            $namaGambar = 'brosur-ppdb-'.$tahunIni.'.'.$request->gambar->extension();
            $destinationPath = 'repo/ppdb/'.$tahunIni;
            $request->gambar->move($destinationPath, $namaGambar);

            DB::table('ppdbs')
                ->where('id', $kode)
                ->update(['brosur' => $namaGambar]);
        }

        if($request->hasFile('file')) {
            $namaFile = 'brosur-ppdb-'.$tahunIni.'.'.$request->file->extension();
            $destinationPath = 'repo/ppdb/'.$tahunIni;
            $request->file->move($destinationPath, $namaFile);

            DB::table('ppdbs')
                ->where('id', $kode)
                ->update(['file' => $namaFile]);
        }

        return redirect()->route('daftarPpdb')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(Ppdb $ppdb)
    {
        return view('pages.admin.ppdb.master.show', compact('ppdb'));
    }

    public function update(Request $request, Ppdb $ppdb)
    {
        $this->validate($request, [
            'judul' => 'required',
            'tgl_awal' => 'required',
            'tgl_batas' => 'required',
            'tahun_ajaran' => 'required',
            'tahun' => 'required|numeric',
        ]);

        $ppdb->update($request->all());

        return redirect()->route('ppdbMaster')->with(['success' => 'Data berhasil diperbarui']);
    }

    public function updateGambar(Request $request, Ppdb $ppdb)
    {
        $this->validate($request, [
            'brosur' => 'required|mimes:jpeg,png,jpg',
        ]);

        if($request->hasFile('brosur')) {
            $kode = $ppdb->id;
            $tahunIni = Ppdb::where('id', $kode)->first()->tahun;

            $namaFile = 'brosur-ppdb-'.$tahunIni.'.'.$request->brosur->extension();
            $destinationPath = 'repo/ppdb/'.$tahunIni;

            $ppdb->update(['brosur' => $namaFile]);
            $request->brosur->move($destinationPath, $namaFile);

            return redirect()->route('ppdbMaster')->with(['success' => 'Brosur berhasil diupload!']);

        } else {
            return redirect()->back()->with(['error' => 'Gagal, file tidak dapat diupload!']);
        }
    }

    public function updateFile(Request $request, Ppdb $ppdb)
    {
        $this->validate($request, [
            'file' => 'required|mimes:pdf',
        ]);

        if($request->hasFile('file')) {
            $kode = $ppdb->id;
            $tahunIni = Ppdb::where('id', $kode)->first()->tahun;

            $namaFile = 'brosur-ppdb-'.$tahunIni.'.'.$request->file->extension();
            $destinationPath = 'repo/ppdb/'.$tahunIni;

            $ppdb->update(['file' => $namaFile]);
            $request->file->move($destinationPath, $namaFile);

            return redirect()->route('ppdbMaster')->with(['success' => 'Brosur berhasil diupload!']);

        } else {
            return redirect()->back()->with(['error' => 'Gagal, file tidak dapat diupload!']);
        }
    }

    public function destroy(Ppdb $ppdb)
    {
        $ppdb->delete();
        return redirect()->route('ppdbMaster')->with(['success' => 'Data berhasil dihapus!']);
    }

    public function daftarPpdb()
    {
        $tahunIni = date('Y');
        $ppdb = Ppdb::orderBy('tahun_ajaran', 'DESC')
                ->where('tahun', '>=', $tahunIni)
                ->get();
        return view('pages.admin.ppdb.summary', ['ppdb' => $ppdb]);
    }

    public function showListCalonSiswa($id_ppdb)
    {
        $listPekerjaanAyah = Pekerjaan::orderBy('judul', 'ASC')->where('judul', '<>', 'Ibu Rumah Tangga')->get();
        $listPekerjaanIbu = Pekerjaan::orderBy('judul', 'ASC')->get();
        $listPekerjaanWali = Pekerjaan::orderBy('judul', 'ASC')->get();
        $tk = TkMaster::orderBy('nama', 'ASC')->get();

        $ppdbSiswa = PpdbSiswa::with('ppdb', 'tkSiswa')
                    ->where('id_ppdb', '=', $id_ppdb)->get();

        $tahunAjaran = Ppdb::where('id', '=', $id_ppdb)->first()->tahun_ajaran;

        return view('pages.admin.ppdb.detail.index',
        [
            'listPekerjaanAyah' => $listPekerjaanAyah,
            'listPekerjaanIbu' => $listPekerjaanIbu,
            'listPekerjaanWali' => $listPekerjaanWali,
            'tk' => $tk,
            'id_ppdb' => $id_ppdb,
            'tahunAjaran' => $tahunAjaran,
            'ppdbSiswa' => $ppdbSiswa
        ]);
    }

    public function detailCalonSiswa($id_ppdb)
    {
        $listPekerjaanAyah = Pekerjaan::orderBy('judul', 'ASC')->where('judul', '<>', 'Ibu Rumah Tangga')->get();
        $listPekerjaanIbu = Pekerjaan::orderBy('judul', 'ASC')->get();
        $listPekerjaanWali = Pekerjaan::orderBy('judul', 'ASC')->get();
        $tk = TkMaster::orderBy('nama', 'ASC')->get();

        $ppdbSiswa = PpdbSiswa::with('ppdb', 'tkSiswa')
                    ->where('id_ppdb', '=', $id_ppdb)->get();

        $tahunAjaran = Ppdb::where('id', '=', $id_ppdb)->first()->tahun_ajaran;

        return view('pages.admin.ppdb.detail.detail',
        [
            'listPekerjaanAyah' => $listPekerjaanAyah,
            'listPekerjaanIbu' => $listPekerjaanIbu,
            'listPekerjaanWali' => $listPekerjaanWali,
            'tk' => $tk,
            'id_ppdb' => $id_ppdb,
            'tahunAjaran' => $tahunAjaran,
            'ppdbSiswa' => $ppdbSiswa
        ]);
    }

    public function indexPpdbSiswa()
    {
        $listPekerjaanAyah = Pekerjaan::orderBy('judul', 'ASC')->where('judul', '<>', 'Ibu Rumah Tangga')->get();
        $listPekerjaanIbu = Pekerjaan::orderBy('judul', 'ASC')->get();
        $listPekerjaanWali = Pekerjaan::orderBy('judul', 'ASC')->get();
        $tk = TkMaster::orderBy('nama', 'ASC')->get();
        $ppdb = Ppdb::orderBy('tahun_ajaran', 'DESC')->get();
        // $ppdbSiswa = PpdbSiswa::with('ppdb')->orderBy('tahun_ajaran', 'DESC')->get();
        $ppdbSiswa = PpdbSiswa::with('ppdb', 'tkSiswa')->get();

        return view('pages.admin.ppdb.index',
        [
            'listPekerjaanAyah' => $listPekerjaanAyah,
            'listPekerjaanIbu' => $listPekerjaanIbu,
            'listPekerjaanWali' => $listPekerjaanWali,
            'tk' => $tk,
            'ppdb' => $ppdb,
            'ppdbSiswa' => $ppdbSiswa,
        ]);
    }

    public function storePpdbSiswa(Request $request)
    {
        $this->validate($request, [
            'id_ppdb' => 'required',
            'nama' => 'required',
            'gender' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'nohp' => 'nullable|numeric',
            'nohp_ortu' => 'required|numeric',
            'email_ortu' => 'nullable|email:dns',
            'nama_ayah' => 'nullable',
            'pekerjaan_ayah' => 'nullable',
            'kerjalain_ayah' => 'nullable',
            'pendapatan_ayah' => 'nullable',
            'nama_ibu' => 'nullable',
            'pekerjaan_ibu' => 'nullable',
            'kerjalain_ibu' => 'nullable',
            'pendapatan_ibu' => 'nullable',
            'nama_wali' => 'nullable',
            'pekerjaan_wali' => 'nullable',
            'kerjalain_wali' => 'nullable',
            'pendapatan_wali' => 'nullable',
            'alamat' => 'required',
            'tk' => 'required',
            'kategori_kelas' => 'required',
            'file' => 'required|mimes:pdf,jpeg,png,jpg|max:2048',
        ]);

        if($request->hasFile('file')) {
            $kerjaAyah = 0;
            $kerjaIbu = 0;
            $kerjaWali = 0;

            if ($request->pekerjaan_ayah == 'Lainnya') {
                Pekerjaan::create(['judul' => $request->kerjalain_ayah]);
                $kerjaLainAyah = Pekerjaan::latest()->first()->id;
                $kerjaAyah = $kerjaLainAyah;
            } else {
                $kerjaAyah = $request->pekerjaan_ayah;
            }

            if ($request->pekerjaan_ibu == 'Lainnya') {
                Pekerjaan::create(['judul' => $request->kerjalain_ibu]);
                $kerjaLainIbu = Pekerjaan::latest()->first()->id;
                $kerjaIbu = $kerjaLainIbu;
            } else {
                $kerjaIbu = $request->pekerjaan_ibu;
            }

            if ($request->pekerjaan_wali == 'Lainnya') {
                Pekerjaan::create(['judul' => $request->kerjalain_wali]);
                $kerjaLainWali = Pekerjaan::latest()->first()->id;
                $kerjaWali = $kerjaLainWali;
            } else {
                $kerjaWali = $request->pekerjaan_wali;
            }

            PpdbSiswa::create([
                'id_ppdb' => $request->id_ppdb,
                'nama' => $request->nama,
                'gender' => $request->gender,
                'tempat_lahir' => $request->tempat_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'nohp' => $request->nohp,
                'nohp_ortu' => $request->nohp_ortu,
                'email_ortu' => $request->email_ortu,
                'nama_ayah' => $request->nama_ayah,
                'pekerjaan_ayah' => $kerjaAyah,
                'pendapatan_ayah' => $request->pendapatan_ayah,
                'nama_ibu' => $request->nama_ibu,
                'pekerjaan_ibu' => $kerjaIbu,
                'pendapatan_ibu' => $request->pendapatan_ibu,
                'nama_wali' => $request->nama_wali,
                'pekerjaan_wali' => $kerjaWali,
                'pendapatan_wali' => $request->pendapatan_wali,
                'alamat' => $request->alamat,
                'tk' => $request->tk,
                'kategori_kelas' => $request->kategori_kelas,
            ]);

            $kode = PpdbSiswa::latest()->first()->id;
            $tahunIni = Ppdb::where('id', $request->id_ppdb)->first()->tahun;

            $namaFile = $kode.'.'.$request->file->extension();
            $destinationPath = 'repo/ppdb/'.$tahunIni.'/'.$request->kategori_kelas;
            $request->file->move($destinationPath, $namaFile);
            // $request->file->storeAs('ppdb/'.$tahunIni.'/'.$request->kategori_kelas, $namaFile, 'public');

            DB::table('ppdb_siswas')
                ->where('id', $kode)
                ->update(['file' => $namaFile]);

            return redirect()->route('ppdbSiswa.daftarCalonSiswa', $request->id_ppdb)->with(['success' => 'Data Calon Siswa/Siswi berhasil disimpan']);

        } else {
            return redirect()->back()->with(['error' => 'Gagal, file tidak dapat diupload!']);
        }
    }

    public function showPpdbSiswa(PpdbSiswa $ppdbSiswa)
    {
        $listPekerjaanAyah = Pekerjaan::orderBy('judul', 'ASC')->where('judul', '<>', 'Ibu Rumah Tangga')->get();
        $listPekerjaanIbu = Pekerjaan::orderBy('judul', 'ASC')->get();
        $listPekerjaanWali = Pekerjaan::orderBy('judul', 'ASC')->get();
        $tk = TkMaster::orderBy('nama', 'ASC')->get();

        $kelasSiswa = KelasSiswa::with('namaKelas', 'waliKelas')
                        ->orderBy('tahun_ajaran', 'ASC')->get();

        $ppdb = Ppdb::orderBy('tahun_ajaran', 'DESC')->get();

        return view('pages.admin.ppdb.show',
        [
            'listPekerjaanAyah' => $listPekerjaanAyah,
            'listPekerjaanIbu' => $listPekerjaanIbu,
            'listPekerjaanWali' => $listPekerjaanWali,
            'tk' => $tk,
            'kelasSiswa' => $kelasSiswa,
            'ppdb' => $ppdb,
        ], compact('ppdbSiswa'));
    }

    public function uploadBuktiPembayaran(Request $request, PpdbSiswa $ppdbSiswa)
    {
        $this->validate($request, [
            'id_ppdb_siswa' => 'required',
            'file' => 'required|mimes:pdf,jpeg,png,jpg|max:2048',
        ]);

        if($request->hasFile('file')) {
            $kode = $request->id_ppdb_siswa;
            $kategoriKelas = PpdbSiswa::where('id', $kode)->first()->kategori_kelas;
            $idPpdb = PpdbSiswa::where('id', $kode)->first()->id_ppdb;
            $tahunIni = Ppdb::where('id', $idPpdb)->first()->tahun;

            $namaFile = $kode.'.'.$request->file->extension();
            $destinationPath = 'repo/ppdb/'.$tahunIni.'/'.$kategoriKelas;

            $ppdbSiswa->update(['file' => $namaFile]);
            $request->file->move($destinationPath, $namaFile);

            return redirect()->route('ppdbSiswa')->with(['success' => 'Bukti Pembayaran berhasil diupload!']);

        } else {
            return redirect()->back()->with(['error' => 'Gagal, file tidak dapat diupload!']);
        }
    }

    public function diterima(Request $request)
    {
        $this->validate($request, [
            'tgl_masuk' => 'required',
            'id_ppdb_siswa' => 'required',
            'id_kelas_siswa' => 'required',
            'name' => 'required',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required',
            'nis' => 'nullable|numeric',
            'nisn' => 'nullable|numeric',
        ]);

        DB::table('ppdb_siswas')
                ->where('id', $request->id_ppdb_siswa)
                ->update(['status' => 1]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'jenis' => 'siswa',
        ]);

        $idUser = User::latest()->first()->id;
        $idPpdb = PpdbSiswa::where('id', $request->id_ppdb_siswa)->first()->id_ppdb;

        Siswa::create([
            'id_ppdb_siswa' => $request->id_ppdb_siswa,
            'id_kelas_siswa' => $request->id_kelas_siswa,
            'id_user' => $idUser,
            'nis' => $request->nis,
            'nisn' => $request->nisn,
            'tgl_masuk' => $request->tgl_masuk,
        ]);

        return redirect()->route('ppdbSiswa.daftarCalonSiswa', $idPpdb)->with(['success' => 'Siswa/siswi telah diterima!']);
    }

    public function updatePpdbSiswa(Request $request, PpdbSiswa $ppdbSiswa)
    {
        $this->validate($request, [
            'id_ppdb' => 'required',
            'nama' => 'required',
            'gender' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'nohp' => 'nullable|numeric',
            'nohp_ortu' => 'required|numeric',
            'email_ortu' => 'nullable|email:dns',
            'nama_ayah' => 'nullable',
            'pekerjaan_ayah' => 'nullable',
            'kerjalain_ayah' => 'nullable',
            'pendapatan_ayah' => 'nullable',
            'nama_ibu' => 'nullable',
            'pekerjaan_ibu' => 'nullable',
            'kerjalain_ibu' => 'nullable',
            'pendapatan_ibu' => 'nullable',
            'nama_wali' => 'nullable',
            'pekerjaan_wali' => 'nullable',
            'kerjalain_wali' => 'nullable',
            'pendapatan_wali' => 'nullable',
            'alamat' => 'required',
            'tk' => 'required',
            'nama_tk_lain' => 'nullable',
            'kota_tk_lain' => 'nullable',
        ]);

        // $ppdbSiswa->update($request->all());

        $tkSiswa = 0;
        $sdSiswa = 0;
        $kerjaAyah = 0;
        $kerjaIbu = 0;
        $kerjaWali = 0;

        // TK Lainnya
        if ($request->tk == 'Lainnya') {
            TkMaster::create([
                'nama' => $request->nama_tk_lain,
                'kota' => $request->kota_tk_lain,
            ]);
            $tkLainSiswa = TkMaster::latest()->first()->id;
            $tkSiswa = $tkLainSiswa;
        } else {
            $tkSiswa = $request->tk;
        }

        // Pekerjaan Lainnya
        if ($request->pekerjaan_ayah == 'Lainnya') {
            Pekerjaan::create(['judul' => $request->kerjalain_ayah]);
            $kerjaLainAyah = Pekerjaan::latest()->first()->id;
            $kerjaAyah = $kerjaLainAyah;
        } else {
            $kerjaAyah = $request->pekerjaan_ayah;
        }

        if ($request->pekerjaan_ibu == 'Lainnya') {
            Pekerjaan::create(['judul' => $request->kerjalain_ibu]);
            $kerjaLainIbu = Pekerjaan::latest()->first()->id;
            $kerjaIbu = $kerjaLainIbu;
        } else {
            $kerjaIbu = $request->pekerjaan_ibu;
        }

        if ($request->pekerjaan_wali == 'Lainnya') {
            Pekerjaan::create(['judul' => $request->kerjalain_wali]);
            $kerjaLainWali = Pekerjaan::latest()->first()->id;
            $kerjaWali = $kerjaLainWali;
        } else {
            $kerjaWali = $request->pekerjaan_wali;
        }

        // $siswa->update($request->all());
        DB::table('ppdb_siswas')
            ->where('id', $ppdbSiswa->id)
            ->update([
                'id_ppdb' => $request->id_ppdb,
                'nama' => $request->nama,
                'gender' => $request->gender,
                'tempat_lahir' => $request->tempat_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'nohp' => $request->nohp,
                'nohp_ortu' => $request->nohp_ortu,
                'email_ortu' => $request->email_ortu,
                'nama_ayah' => $request->nama_ayah,
                'pekerjaan_ayah' => $kerjaAyah,
                'pendapatan_ayah' => $request->pendapatan_ayah,
                'nama_ibu' => $request->nama_ibu,
                'pekerjaan_ibu' => $kerjaIbu,
                'pendapatan_ibu' => $request->pendapatan_ibu,
                'nama_wali' => $request->nama_wali,
                'pekerjaan_wali' => $kerjaWali,
                'pendapatan_wali' => $request->pendapatan_wali,
                'alamat' => $request->alamat,
                'tk' => $tkSiswa,
        ]);

        return redirect()->route('ppdbSiswa')->with(['success' => 'Data berhasil diperbarui']);
    }

    public function destroyPpdbSiswa(PpdbSiswa $ppdbSiswa)
    {
        $ppdbSiswa->delete();
        return redirect()->route('daftarPpdb')->with(['success' => 'Data berhasil dihapus!']);
    }
}