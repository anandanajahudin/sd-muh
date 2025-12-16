<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Imports\SiswaUserImport;
use App\Imports\SiswaPpdbImport;
use App\Imports\SiswaImport;
use App\Models\Pegawai;
use App\Models\SdMutasi;
use App\Models\SifatMaster;
use App\Models\SifatSiswa;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\KelasSiswa;
use App\Models\KejadianSiswa;
use App\Models\Pekerjaan;
use App\Models\Ppdb;
use App\Models\PpdbSiswa;
use App\Models\PrestasiSiswa;
use App\Models\TkMaster;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{
    public function index()
    {
        $listPekerjaanAyah = Pekerjaan::orderBy('judul', 'ASC')->where('judul', '<>', 'Ibu Rumah Tangga')->get();
        $listPekerjaanIbu = Pekerjaan::orderBy('judul', 'ASC')->get();
        $listPekerjaanWali = Pekerjaan::orderBy('judul', 'ASC')->get();
        $sdMutasi = SdMutasi::orderBy('kota', 'ASC')->orderBy('nama', 'ASC')->get();
        $tk = TkMaster::orderBy('nama', 'ASC')->get();
        $ppdb = Ppdb::orderBy('tahun_ajaran', 'DESC')->get();

        $kelasSiswa = KelasSiswa::with('namaKelas', 'waliKelas')
                        ->orderBy('tahun_ajaran', 'ASC')->get();

        $siswa = Siswa::with('kelasSiswa', 'mutasi', 'userSiswa', 'ppdbSiswa')->get();
        // $siswa = Siswa::select('siswas.*')
        //             ->join('ppdb_siswas', 'ppdb_siswas.id', '=', 'siswas.id_ppdb_siswa')
        //             // ->join('sd_mutasis', 'sd_mutasis.id', '=', 'siswas.id_mutasi')
        //             ->join('kelas_siswas', 'kelas_siswas.id', '=', 'siswas.id_kelas_siswa')
        //             ->join('kelas', 'kelas.id', '=', 'kelas_siswas.id_kelas')
        //             ->orderBy('kelas.nama_kelas', 'ASC')
        //             ->orderBy('kelas_siswas.tahun_ajaran', 'ASC')
        //             ->get();

        return view('pages.admin.bank_data.siswa.index',
        [
            'listPekerjaanAyah' => $listPekerjaanAyah,
            'listPekerjaanIbu' => $listPekerjaanIbu,
            'listPekerjaanWali' => $listPekerjaanWali,
            'kelasSiswa' => $kelasSiswa,
            'ppdb' => $ppdb,
            'sdMutasi' => $sdMutasi,
            'siswa' => $siswa,
            'tk' => $tk,
        ]);
    }

    public function store(Request $request)
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
            'tgl_masuk' => 'nullable',
            'nis' => 'nullable|numeric',
            'nisn' => 'nullable|numeric',
            'tk' => 'required',
            'nama_tk_lain' => 'nullable',
            'kota_tk_lain' => 'nullable',
            'id_mutasi' => 'nullable',
            'nama_sd_lain' => 'nullable',
            'kota_sd_lain' => 'nullable',
            'id_kelas_siswa' => 'required',
            'kategori_kelas' => 'required',
            'file' => 'required|mimes:pdf,jpeg,png,jpg|max:2048',
        ]);

        if($request->hasFile('file')) {
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

            // SD Lainnya
            if ($request->id_mutasi == 'Lainnya') {
                SdMutasi::create([
                    'nama' => $request->nama_sd_lain,
                    'kota' => $request->kota_sd_lain,
                ]);
                $sdLainSiswa = SdMutasi::latest()->first()->id;
                $sdSiswa = $sdLainSiswa;
            } else {
                $sdSiswa = $request->id_mutasi;
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
                'tk' => $tkSiswa,
                'kategori_kelas' => $request->kategori_kelas,
            ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'jenis' => 'siswa',
            ]);

            $idUser = User::latest()->first()->id;

            $kode = PpdbSiswa::latest()->first()->id;
            $idPpdb = PpdbSiswa::where('id', $kode)->first()->id_ppdb;
            $tahunIni = Ppdb::where('id', $idPpdb)->first()->tahun;

            $namaFile = $kode.'.'.$request->file->extension();
            $destinationPath = 'repo/ppdb/'.$tahunIni.'/'.$request->kategori_kelas;
            $request->file->move($destinationPath, $namaFile);

            DB::table('ppdb_siswas')
                ->where('id', $kode)
                ->update(['file' => $namaFile]);

            Siswa::create([
                'nis' => $request->nis,
                'nisn' => $request->nisn,
                'id_ppdb_siswa' => $kode,
                'id_kelas_siswa' => $request->id_kelas_siswa,
                'tgl_masuk' => $request->tgl_masuk,
                'id_mutasi' => $sdSiswa,
                'id_user' => $idUser,
            ]);

            return redirect()->route('siswa')->with(['success' => 'Data Siswa/Siswi berhasil disimpan']);

        } else {
            return redirect()->back()->with(['error' => 'Gagal, file tidak dapat diupload!']);
        }
    }

    public function storeFoto(Request $request, Siswa $siswa)
    {
        $this->validate($request, [
            'id_siswa' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,|max:2048'
        ]);

        $kode = $request->id_siswa;
        $imgFotoName = $kode.'.'.$request->foto->extension();
        $siswa->update(['foto' => $imgFotoName]);

        $request->foto->storeAs('siswa/'.$kode, $imgFotoName, 'public');

        return redirect()->route('siswa')->with(['success' => 'Foto Berhasil Diupload!']);
    }

    public function show(Siswa $siswa)
    {
        $prestasiSiswas = PrestasiSiswa::with('siswaPrestasi')
            ->where('id_siswa', '=', $siswa->id)->get();

        $sifatSiswas = SifatSiswa::with('siswa', 'sifat')
            ->where('id_siswa', '=', $siswa->id)->get();

        $kelasSiswa = KelasSiswa::with('namaKelas', 'waliKelas')
                        ->orderBy('tahun_ajaran', 'ASC')->get();

        $users = User::all();

        $listPekerjaanAyah = Pekerjaan::orderBy('judul', 'ASC')->where('judul', '<>', 'Ibu Rumah Tangga')->get();
        $listPekerjaanIbu = Pekerjaan::orderBy('judul', 'ASC')->get();
        $listPekerjaanWali = Pekerjaan::orderBy('judul', 'ASC')->get();
        $sdMutasi = SdMutasi::orderBy('kota', 'ASC')->orderBy('nama', 'ASC')->get();
        $tk = TkMaster::orderBy('nama', 'ASC')->get();
        $ppdb = Ppdb::orderBy('tahun_ajaran', 'DESC')->get();

        return view('pages.admin.bank_data.siswa.show',
        [
            'users' => $users,
            'prestasiSiswas' => $prestasiSiswas,
            'sifatSiswas' => $sifatSiswas,
            'kelasSiswa' => $kelasSiswa,
            'listPekerjaanAyah' => $listPekerjaanAyah,
            'listPekerjaanIbu' => $listPekerjaanIbu,
            'listPekerjaanWali' => $listPekerjaanWali,
            'sdMutasi' => $sdMutasi,
            'tk' => $tk,
            'ppdb' => $ppdb,
        ], compact('siswa'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        $this->validate($request, [
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
            'tgl_masuk' => 'nullable',
            'nis' => 'nullable|numeric',
            'nisn' => 'nullable|numeric',
            'tk' => 'required',
            'nama_tk_lain' => 'nullable',
            'kota_tk_lain' => 'nullable',
            'id_mutasi' => 'nullable',
            'nama_sd_lain' => 'nullable',
            'kota_sd_lain' => 'nullable',
            'id_kelas_siswa' => 'required',
            'name' => 'required',
            'email' => 'required',
        ]);

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

        // SD Lainnya
        if ($request->id_mutasi == 'Lainnya') {
            SdMutasi::create([
                'nama' => $request->nama_sd_lain,
                'kota' => $request->kota_sd_lain,
            ]);
            $sdLainSiswa = SdMutasi::latest()->first()->id;
            $sdSiswa = $sdLainSiswa;
        } else {
            $sdSiswa = $request->id_mutasi;
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
            ->where('id', $siswa->id_ppdb_siswa)
            ->update([
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

        DB::table('siswas')
            ->where('id', $siswa->id)
            ->update([
                'nis' => $request->nis,
                'nisn' => $request->nisn,
                'id_kelas_siswa' => $request->id_kelas_siswa,
                'tgl_masuk' => $request->tgl_masuk,
                'id_mutasi' => $sdSiswa,
        ]);

        DB::table('users')
            ->where('id', $siswa->id_user)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
        ]);

        return redirect()->route('siswa')->with(['success' => 'Data berhasil diperbarui']);
    }

    public function updatePasswordSiswa(Request $request, User $user)
    {
        $this->validate($request, [
            'password' => 'required'
        ]);

        $user->update(['password' => Hash::make($request->password)]);

        return redirect()->route('siswa')->with(['success' => 'Password berhasil diperbarui']);
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return redirect()->route('siswa')->with(['success' => 'Data berhasil dihapus!']);
    }

    public function importUserSiswa()
    {
        Excel::import(new SiswaUserImport,request()->file('file'));

        return redirect()->route('siswa')->with(['success' => 'Data User Siswa berhasil diimport']);
    }

    public function importPpdbSiswa()
    {
        Excel::import(new SiswaPpdbImport,request()->file('file'));

        return redirect()->route('siswa')->with(['success' => 'Data Ppdb Siswa berhasil diimport']);
    }

    public function importSiswa()
    {
        Excel::import(new SiswaImport,request()->file('file'));

        return redirect()->route('siswa')->with(['success' => 'Data Siswa berhasil diimport']);
    }

    public function showListPrestasi($id_siswa)
    {
        $prestasiSiswa = PrestasiSiswa::with('siswaPrestasi')
            ->where('id_siswa', '=', $id_siswa)->get();

        $siswa = Siswa::all();

        $idPpdbSiswa = Siswa::with('userSiswa')
            ->where('id', '=', $id_siswa)->first()->id_ppdb_siswa;

        $idKelasSiswa = Siswa::where('id', '=', $id_siswa)->first()->id_kelas_siswa;
        $kelasTahunAjaran = KelasSiswa::where('id', '=', $idKelasSiswa)->first()->tahun_ajaran;
        $idKelas = KelasSiswa::where('id', '=', $idKelasSiswa)->first()->id_kelas;
        $kelasSiswa = Kelas::where('id', '=', $idKelas)->first()->kelas;
        $namaKelasSiswa = Kelas::where('id', '=', $idKelas)->first()->nama_kelas;
        $namaSiswa = PpdbSiswa::where('id', $idPpdbSiswa)->first()->nama;

        return view('pages.admin.bank_data.siswa.prestasi.index',
        [
            'id_siswa' => $id_siswa,
            'namaSiswa' => $namaSiswa,
            'kelasTahunAjaran' => $kelasTahunAjaran,
            'kelasSiswa' => $kelasSiswa,
            'namaKelasSiswa' => $namaKelasSiswa,
            'namaSiswa' => $namaSiswa,
            'siswa' => $siswa,
            'prestasiSiswa' => $prestasiSiswa
        ]);
    }

    public function indexPrestasiSiswa()
    {
        $prestasiSiswa = PrestasiSiswa::with('siswaPrestasi')->orderBy('id', 'DESC')->get();
        $ppdb = Ppdb::orderBy('tahun', 'DESC')->get();
        $kelasSiswa = KelasSiswa::orderBy('tahun', 'DESC')->get();
        $siswa = Siswa::all();

        return view('pages.admin.bank_data.prestasi.index',
        [
            'ppdb' => $ppdb,
            'kelasSiswa' => $kelasSiswa,
            'siswa' => $siswa,
            'prestasiSiswa' => $prestasiSiswa
        ]);
    }

    public function getClassesByYear(Request $request)
    {
        $tahunAjaran = $request->tahun_ajaran;
        $classes = KelasSiswa::where('tahun_ajaran', $tahunAjaran)->with('namaKelas')->get();

        // Transform the classes to include 'nama_kelas'
        $classes = $classes->map(function ($class) {
            return [
                'id' => $class->id,
                'nama_kelas' => $class->namaKelas->nama_kelas,
                'tahun_ajaran' => $class->tahun_ajaran,
            ];
        });

        return response()->json(['classes' => $classes]);
    }

    public function getStudentsByClassAndYear(Request $request)
    {
        $kelasId = $request->kelas_id;

        $students = PpdbSiswa::whereHas('siswa', function ($query) use ($kelasId) {
            $query->where('id_kelas_siswa', $kelasId);
        })->get();

        return response()->json(['students' => $students]);
    }

    public function storePrestasiSiswa(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'juara' => 'required|numeric',
            'tempat_kompetisi' => 'required',
            'tgl_kompetisi' => 'required',
            'kategori' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,|max:2048',
            'deskripsi' => 'required',
            'id_siswa' => 'required',
        ]);

        $id_kelas_siswa = Siswa::where('id', '=', $request->id_siswa)->first()->id_kelas_siswa;

        $prestasi = PrestasiSiswa::create([
            'judul' => $request->judul,
            'juara' => $request->juara,
            'tempat_kompetisi' => $request->tempat_kompetisi,
            'tgl_kompetisi' => $request->tgl_kompetisi,
            'kategori' => $request->kategori,
            'foto' => '',
            'deskripsi' => $request->deskripsi,
            'id_siswa' => $request->id_siswa,
            'id_kelas_siswa' => $id_kelas_siswa,
        ]);

        $kode = $prestasi->id;
        $tglKompetisi = $request->tgl_kompetisi;
        $tahunKompetisi = date('Y', strtotime($tglKompetisi));

        $imgFotoName = $kode.'.'.$request->foto->extension();
        $destinationPath = 'repo/prestasi/'.$tahunKompetisi;
        // $request->foto->storeAs('siswa/'.$request->id_siswa.'/prestasi', $imgFotoName, 'public');

        DB::table('prestasi_siswas')
            ->where('id', $kode)
            ->update(['foto' => $imgFotoName]);

        $request->foto->move($destinationPath, $imgFotoName);

        return redirect()->route('prestasiSiswa')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function storeFotoPrestasiSiswa(Request $request, PrestasiSiswa $prestasiSiswa)
    {
        $this->validate($request, [
            'foto' => 'required|image|mimes:jpeg,png,jpg,|max:2048'
        ]);

        $kode = $prestasiSiswa->id;
        $imgFotoName = $kode.'.'.$request->foto->extension();
        $prestasiSiswa->update(['foto' => $imgFotoName]);

        $tglKompetisi = $prestasiSiswa->tgl_kompetisi;
        $tahunKompetisi = date('Y', strtotime($tglKompetisi));

        $destinationPath = 'repo/prestasi/'.$tahunKompetisi;
        $request->foto->move($destinationPath, $imgFotoName);
        // $request->foto->storeAs('siswa/'.$kode.'/prestasi', $imgFotoName, 'public');

        return redirect()->route('prestasiSiswa')->with(['success' => 'Foto Berhasil Diupload!']);
    }

    public function showPrestasiSiswa(PrestasiSiswa $prestasiSiswa)
    {
        $siswa = Siswa::all();

        return view('pages.admin.bank_data.prestasi.show',
            ['siswa' => $siswa], compact('prestasiSiswa')
        );
    }

    public function updatePrestasiSiswa(Request $request, PrestasiSiswa $prestasiSiswa)
    {
        $this->validate($request, [
            'judul' => 'required',
            'juara' => 'required|numeric',
            'tempat_kompetisi' => 'required',
            'tgl_kompetisi' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
        ]);

        $prestasiSiswa->update($request->all());

        return redirect()->route('prestasiSiswa')->with(['success' => 'Data berhasil diperbarui']);
    }

    public function destroyPrestasiSiswa(PrestasiSiswa $prestasiSiswa)
    {
        $cekFile = Storage::disk('public')->exists('siswa/'.$prestasiSiswa->id_siswa.'/prestasi'.'/'.$prestasiSiswa->file);

        if ($prestasiSiswa->file == null && $cekFile == false) {
            $prestasiSiswa->delete();
            return redirect()->route('prestasiSiswa')->with(['success' => 'Data berhasil dihapus!']);

        } else if ($cekFile == true) {
            unlink('storage/siswa/'.$prestasiSiswa->id_siswa.'/prestasi'.'/'.$prestasiSiswa->file);
            $prestasiSiswa->delete();
            return redirect()->route('prestasiSiswa')->with(['success' => 'Data berhasil dihapus!']);

        } else {
            $prestasiSiswa->delete();
            return redirect()->route('prestasiSiswa')->with(['success' => 'Data berhasil dihapus!']);
        }
    }

    public function indexKejadianSiswa()
    {
        $kejadianSiswa = KejadianSiswa::with('siswaKejadian')->get();
        $ppdb = Ppdb::orderBy('tahun', 'DESC')->get();
        $kelasSiswa = KelasSiswa::orderBy('tahun', 'DESC')->get();
        $siswa = Siswa::select('siswas.*')
                    ->join('kelas_siswas', 'kelas_siswas.id', '=', 'siswas.id_kelas_siswa')
                    ->join('kelas', 'kelas.id', '=', 'kelas_siswas.id_kelas')
                    ->orderBy('kelas.nama_kelas', 'ASC')
                    ->orderBy('kelas_siswas.tahun_ajaran', 'ASC')
                    ->get();

        return view('pages.admin.bank_data.kejadian.index',
        [
            'ppdb' => $ppdb,
            'kelasSiswa' => $kelasSiswa,
            'siswa' => $siswa,
            'kejadianSiswa' => $kejadianSiswa
        ]);
    }

    public function storeKejadianSiswa(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'tgl_kejadian' => 'required',
            'deskripsi' => 'required',
            'id_siswa' => 'required',
        ]);

        $id_kelas_siswa = Siswa::where('id', '=', $request->id_siswa)->first()->id_kelas_siswa;

        KejadianSiswa::create([
            'judul' => $request->judul,
            'tgl_kejadian' => $request->tgl_kejadian,
            'deskripsi' => $request->deskripsi,
            'id_siswa' => $request->id_siswa,
            'id_kelas_siswa' => $id_kelas_siswa,
        ]);

        return redirect()->route('kejadianSiswa')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function showKejadianSiswa(KejadianSiswa $kejadianSiswa)
    {
        // $kejadianSiswas = KejadianSiswa::with('siswaKejadian')->get();

        $siswa = Siswa::select('siswas.*')
                    ->join('kelas_siswas', 'kelas_siswas.id', '=', 'siswas.id_kelas_siswa')
                    ->join('kelas', 'kelas.id', '=', 'kelas_siswas.id_kelas')
                    ->orderBy('kelas.nama_kelas', 'ASC')
                    ->orderBy('kelas_siswas.tahun_ajaran', 'ASC')
                    ->get();

        return view('pages.admin.bank_data.kejadian.show',
            ['siswa' => $siswa], compact('kejadianSiswa')
        );
    }

    public function updateKejadianSiswa(Request $request, KejadianSiswa $kejadianSiswa)
    {
        $this->validate($request, [
            'judul' => 'required',
            'tgl_kejadian' => 'required',
            'deskripsi' => 'required',
        ]);

        $kejadianSiswa->update($request->all());

        return redirect()->route('kejadianSiswa')->with(['success' => 'Data berhasil diperbarui']);
    }

    public function destroyKejadianSiswa(KejadianSiswa $kejadianSiswa)
    {
        $kejadianSiswa->delete();
        return redirect()->route('kejadianSiswa')->with(['success' => 'Data berhasil dihapus!']);
    }

    public function indexSifatSiswa()
    {
        $sifatMaster = SifatMaster::orderBy('judul', 'ASC')->get();
        // $sifatSiswa = SifatSiswa::with('siswa', 'sifat')->groupBy('id_siswa')->get();

        // GroupBy Siswa
        // $sifatSiswa = SifatSiswa::with('siswa', 'sifat')->groupBy('id_siswa')->get();

        $sifatSiswa = Siswa::select('siswas.*')
                    ->join('ppdb_siswas', 'ppdb_siswas.id', '=', 'siswas.id_ppdb_siswa')
                    ->join('kelas_siswas', 'kelas_siswas.id', '=', 'siswas.id_kelas_siswa')
                    ->join('kelas', 'kelas.id', '=', 'kelas_siswas.id_kelas')
                    ->orderBy('kelas_siswas.tahun_ajaran', 'ASC')
                    ->orderBy('kelas.nama_kelas', 'ASC')
                    ->get();

        $siswa = Siswa::select('siswas.*')
                    ->join('ppdb_siswas', 'ppdb_siswas.id', '=', 'siswas.id_ppdb_siswa')
                    ->join('kelas_siswas', 'kelas_siswas.id', '=', 'siswas.id_kelas_siswa')
                    ->join('kelas', 'kelas.id', '=', 'kelas_siswas.id_kelas')
                    ->orderBy('kelas.nama_kelas', 'ASC')
                    ->orderBy('kelas_siswas.tahun_ajaran', 'ASC')
                    ->get();

        return view('pages.admin.bank_data.sifat_siswa.index',
        [
            'sifatMaster' => $sifatMaster,
            'siswa' => $siswa,
            'sifatSiswa' => $sifatSiswa
        ]);
    }

    public function storeSifatSiswa(Request $request)
    {
        $this->validate($request, [
            'id_siswa' => 'required',
            'id_sifat' => 'nullable',
        ]);

        $sifatTerpilih = $request->input('id_sifat');

        foreach($sifatTerpilih as $sifatTerpilih){
            SifatSiswa::create([
                'id_siswa' => $request->id_siswa,
                'id_sifat' => $sifatTerpilih
            ]);
        }

        // $id_kelas_siswa = Siswa::where('id', '=', $request->id_siswa)->first()->id_kelas_siswa;
        // $id_kelas = KelasSiswa::where('id', '=', $id_kelas_siswa)->first()->id_kelas;
        // $tahun_ajaran = KelasSiswa::where('id', '=', $id_kelas)->first()->tahun_ajaran;
        // $nama_kelas = Kelas::where('id', '=', $id_kelas)->first()->nama_kelas;

        // SifatSiswa::create([
        //     'id_siswa' => $request->id_siswa,
        //     'id_sifat' => $request->id_sifat,
        //     'kelas' => $nama_kelas,
        //     'tahun_ajaran' => $tahun_ajaran,
        // ]);

        return redirect()->route('sifatSiswa')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function showSifatSiswa($id_siswa)
    {
        $sifatMaster = SifatMaster::orderBy('judul', 'ASC')->get();
        $nis = Siswa::where('id', $id_siswa)->first()->nis;
        $idPpdbSiswa = Siswa::where('id', $id_siswa)->first()->id_ppdb_siswa;

        $nama = PpdbSiswa::where('id', $idPpdbSiswa)->first()->nama;
        $idKelasSiswa = Siswa::where('id', $id_siswa)->first()->id_kelas_siswa;
        $tahunAjaran = KelasSiswa::where('id', $idKelasSiswa)->first()->tahun_ajaran;

        $idKelas = KelasSiswa::where('id', $idKelasSiswa)->first()->id_kelas;
        $namaKelas = Kelas::where('id', $idKelas)->first()->nama_kelas;

        $sifatTerpilih = SifatSiswa::with('siswa', 'sifat')
            ->where('id_siswa', '=', $id_siswa)->get();

        $sifatTerpilih2 = SifatSiswa::with('siswa', 'sifat')
            ->where('id_siswa', '=', $id_siswa)->get();

        // $sifatTerpilih = SifatSiswa::with('siswa', 'sifat')->where('id_siswa', $id_siswa)->get();
        // $sifatTerpilih = SifatSiswa::select('sifat_siswas.*')
        //             ->join('siswas', 'siswas.id', '=', 'sifat_siswas.id_siswa')
        //             ->join('sifat_masters', 'sifat_masters.id', '=', 'sifat_siswas.id_sifat')
        //             ->orderBy('sifat_masters.judul', 'ASC')
        //             ->where('sifat_siswas.id_siswa', $id_siswa)
        //             ->get();

        $siswa = Siswa::select('siswas.*')
                    ->join('kelas_siswas', 'kelas_siswas.id', '=', 'siswas.id_kelas_siswa')
                    ->join('kelas', 'kelas.id', '=', 'kelas_siswas.id_kelas')
                    ->orderBy('kelas.nama_kelas', 'ASC')
                    ->orderBy('kelas_siswas.tahun_ajaran', 'ASC')
                    ->get();

        return view('pages.admin.bank_data.sifat_siswa.show',
        [
            'id_siswa' => $id_siswa,
            'nis' => $nis,
            'nama' => $nama,
            'tahunAjaran' => $tahunAjaran,
            'namaKelas' => $namaKelas,
            'sifatMaster' => $sifatMaster,
            'sifatTerpilih' => $sifatTerpilih,
            'sifatTerpilih2' => $sifatTerpilih2,
            'siswa' => $siswa,
        ]);
    }

    // public function updateSifatSiswa(Request $request, SifatSiswa $sifatSiswa)
    // {
    //     $this->validate($request, [
    //         'id_siswa' => 'required',
    //         'id_sifat' => 'nullable',
    //     ]);

    //     $sifatTerpilih = $request->input('id_sifat');

    //     foreach($sifatTerpilih as $sifatTerpilih){
    //         SifatSiswa::create([
    //             'id_siswa' => $request->id_siswa,
    //             'id_sifat' => $sifatTerpilih
    //         ]);
    //     }
    //     // $this->validate($request, [
    //     //     'id_siswa' => 'required',
    //     //     'id_sifat' => 'required',
    //     //     'kelas' => 'required',
    //     //     'tahun_ajaran' => 'required',
    //     // ]);

    //     // $sifatSiswa->update($request->all());

    //     return redirect()->route('sifatSiswa')->with(['success' => 'Data berhasil diperbarui']);
    // }

    public function destroySifatSiswa(SifatSiswa $sifatSiswa)
    {
        $sifatSiswa->delete();
        return redirect()->route('sifatSiswa')->with(['success' => 'Data berhasil dihapus!']);
    }

    // MASTER TK
    public function indexTk()
    {
        $tk = TkMaster::orderBy('nama', 'ASC')->get();
        return view('pages.admin.bank_data.tk.index', ['tk' => $tk]);
    }

    public function storeTk(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'kota' => 'required',
        ]);

        TkMaster::create([
            'nama' => $request->nama,
            'kota' => $request->kota,
        ]);

        return redirect()->route('dataTk')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function showTk(TkMaster $tk)
    {
        return view('pages.admin.bank_data.tk.show', compact('tk'));
    }

    public function updateTk(Request $request, TkMaster $tk)
    {
        $this->validate($request, [
            'nama' => 'required',
            'kota' => 'required',
        ]);

        $tk->update($request->all());

        return redirect()->route('dataTk')->with(['success' => 'Data berhasil diperbarui']);
    }

    public function destroyTk(TkMaster $tk)
    {
        $tk->delete();
        return redirect()->route('dataTk')->with(['success' => 'Data berhasil dihapus!']);
    }
}
