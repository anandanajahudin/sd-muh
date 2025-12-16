<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Berita;
use App\Models\Ekskul;
use App\Models\GuruGeneral;
use App\Models\Kelas;
use App\Models\KelasMaster;
use App\Models\KelasSiswa;
use App\Models\Muhasabah;
use App\Models\Muhasabahku;
use App\Models\Modul;
use App\Models\KejadianSiswa;
use App\Models\PrestasiSiswa;
use App\Models\Pegawai;
use App\Models\Pekerjaan;
use App\Models\Ppdb;
use App\Models\ProgramUnggulan;
// use App\Models\SifatMaster;
// use App\Models\SifatSiswa;
use App\Models\Siswa;
use App\Models\SiswaGeneral;
use App\Models\SifatMaster;
use App\Models\SdMutasi;
use App\Models\TkMaster;
use App\Models\User;
use App\Models\WaliMurid;

class DataController extends Controller
{

    public function dashboard()
    {
        $muhasabah = Muhasabahku::all();
        $jumlahMuhasabah = $muhasabah->count();

        // $muhasabahku = Muhasabah::select('muhasabahs.*')
        // ->join('master_muhasabahs', 'master_muhasabahs.id', '=', 'muhasabahs.id_muhasabah')
        // ->join('users', 'users.id', '=', 'muhasabahs.id_user')
        // ->where('users.id', '=', auth()->user()->id)
        // ->get();

        $muhasabahku = Muhasabahku::where('id_user', '=', auth()->user()->id);
        $jumlahMuhasabahku = $muhasabahku->count();

        $kelas = Kelas::all();
        $jumlahKelas = $kelas->count();

        $guru = Pegawai::with('userPegawai')->get();
        $jumlahGuru = $guru->count();

        // $siswa = Siswa::with('userSiswa')->get();
        // $jumlahSiswa = $siswa->count();

        $jumlahSiswa = SiswaGeneral::with('user')->count();

        $totalBankData = $jumlahGuru + $jumlahSiswa + $jumlahKelas;

        $berita = Berita::where('jenis', 'berita');
        $jumlahBerita = $berita->count();

        $beritaTv = Berita::where('jenis', 'tv');
        $jumlahBeritaTv = $beritaTv->count();
        $totalBerita = $jumlahBerita + $jumlahBeritaTv;

        $agenda = Berita::where('jenis', 'agenda');
        $jumlahAgenda = $agenda->count();

        $jumlahModul = 0;
        $kelasUser = 0;

        if (auth()->user()->jenis == 'siswageneral' || auth()->user()->jenis == 'gurugeneral' || auth()->user()->jenis == 'walimurid') {

            if (auth()->user()->jenis == 'siswageneral') {
                $kelasUser = auth()->user()->siswaGeneral->kelas;
            } else if (auth()->user()->jenis == 'gurugeneral') {
                $kelasUser = auth()->user()->guruGeneral->kelas;
            } else if (auth()->user()->jenis == 'walimurid') {
                $kelasUser = auth()->user()->waliMurid->kelas;
            } else {
                return redirect()->back()->with('error', 'Kelas tidak ditemukan!');
            }

            // Ambil data kelas master
            $kelas = KelasMaster::where('kelas', $kelasUser)->first();
            if (!$kelas) {
                return redirect()->back()->with('error', 'Kelas tidak ditemukan!');
            }

            // Dapatkan nilai kelas (misal: 1, 2, 3...)
            $kelasNumber = $kelas->kelas;

            // Ambil semua id kelas master yang memiliki nomor kelas yang sama
            $kelasMasterIds = KelasMaster::where('kelas', $kelasNumber)->pluck('id');

            // Ambil modul terkait semua kelas dengan nomor kelas yang sama
            $jumlahModul = Modul::with(['jenisModul', 'modulKelas'])
                ->whereIn('id_kelas_master', $kelasMasterIds)
                ->orderBy('judul', 'ASC')
                ->count();

        }

        return view('pages.admin.dashboard',
        [
            'jumlahMuhasabah' => $jumlahMuhasabah,
            'jumlahMuhasabahku' => $jumlahMuhasabahku,
            'totalBankData' => $totalBankData,
            'totalBerita' => $totalBerita,
            'jumlahAgenda' => $jumlahAgenda,
            'jumlahModul' => $jumlahModul,
            'kelasUser' => $kelasUser,
        ]);
    }

    public function bankData()
    {
        $kelas = Kelas::all();
        $jumlahKelas = $kelas->count();

        $kelasSiswa = KelasSiswa::all();
        $jumlahKelasSiswa = $kelasSiswa->count();

        $modul = Modul::all();
        $jumlahModul = $modul->count();

        $prestasiSiswa = PrestasiSiswa::all();
        $jumlahPrestasi = $prestasiSiswa->count();

        $kejadianSiswa = KejadianSiswa::all();
        $jumlahKejadian = $kejadianSiswa->count();

        $ppdbMaster = Ppdb::all();
        $jumlahPpdb = $ppdbMaster->count();

        $guru = Pegawai::with('userPegawai')->get();
        $jumlahGuru = $guru->count();

        // $siswa = Siswa::with('userSiswa')->get();
        // $jumlahSiswa = $siswa->count();

        $jumlahSiswa = SiswaGeneral::with('user')->count();
        $jumlahGuru = GuruGeneral::with('user')->count();
        $jumlahWaliMurid = WaliMurid::with('user')->count();

        return view('pages.admin.bank_data.index',
        [
            'jumlahKelas' => $jumlahKelas,
            'jumlahKelasSiswa' => $jumlahKelasSiswa,
            'jumlahModul' => $jumlahModul,
            'jumlahPrestasi' => $jumlahPrestasi,
            'jumlahKejadian' => $jumlahKejadian,
            'jumlahPpdb' => $jumlahPpdb,
            'jumlahGuru' => $jumlahGuru,
            'jumlahSiswa' => $jumlahSiswa,
            'jumlahWaliMurid' => $jumlahWaliMurid,
        ]);
    }

    public function summaryKelas()
    {
        $kelas = Kelas::all();
        $jumlahKelas = $kelas->count();

        $kelasMaster = KelasMaster::all();
        $jumlahKelasMaster = $kelasMaster->count();

        return view('pages.admin.bank_data.kelas.summary',
        [
            'jumlahKelas' => $jumlahKelas,
            'jumlahKelasMaster' => $jumlahKelasMaster,
        ]);
    }

    public function profilku($user)
    {
        $roleUser = User::where('id', $user)->first()->jenis;

        if($roleUser == 'siswa') {
            $dataProfil = Siswa::with('userSiswa')->where('id_user', '=', $user)->get();

            return view('pages.admin.profil.siswa.index', ['dataProfil' => $dataProfil]);

        } else if ($roleUser == 'walimurid') {
            $dataProfil = WaliMurid::with('user')->where('id_user', '=', $user)->get();

            return view('pages.admin.profil.walimurid.index', ['dataProfil' => $dataProfil]);

        } else if ($roleUser == 'gurugeneral') {
            $dataProfil = GuruGeneral::with('user')->where('id_user', '=', $user)->get();

            return view('pages.admin.profil.gurugeneral.index', ['dataProfil' => $dataProfil]);

        } else if ($roleUser == 'siswageneral') {
            $dataProfil = SiswaGeneral::with('user')->where('id_user', '=', $user)->get();

            return view('pages.admin.profil.siswageneral.index', ['dataProfil' => $dataProfil]);

        } else {
            $dataProfil = Pegawai::with('userPegawai')->where('id_user', '=', $user)->get();

            return view('pages.admin.profil.pegawai.index', ['dataProfil' => $dataProfil]);
        }
    }

    public function updateProfilPegawai(Request $request, Pegawai $pegawai)
    {
        $this->validate($request, [
            'nama' => 'required',
            'nip' => 'required|numeric',
            'nik' => 'required|numeric',
            'gender' => 'required',
            'no_hp' => 'required|numeric',
            'alamat' => 'required'
        ]);

        $pegawai->update($request->all());

        return redirect()->route('dashboard')->with(['success' => 'Data berhasil diperbarui']);
    }

    public function updatePasswordProfilPegawai(Request $request, User $user)
    {
        $this->validate($request, [
            'password' => 'required'
        ]);

        $user->update(['password' => Hash::make($request->password)]);

        return redirect()->route('dashboard')->with(['success' => 'Password berhasil diperbarui']);
    }

    public function updateProfilSiswa(Request $request, Siswa $siswa)
    {
        $this->validate($request, [
            'nama' => 'required',
            'nis' => 'required|numeric',
            'nisn' => 'required|numeric',
            'gender' => 'required',
            'nohp' => 'sometimes|numeric',
            'nohp_ortu' => 'required|numeric',
            'email_ortu' => 'required|email:dns',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'nama_wali' => 'sometimes',
            'alamat' => 'required',
            'sifat' => 'required',
        ]);

        $siswa->update($request->all());

        return redirect()->route('dashboard')->with(['success' => 'Data berhasil diperbarui']);
    }

    public function updatePasswordProfilSiswa(Request $request, User $user)
    {
        $this->validate($request, [
            'password' => 'required'
        ]);

        $user->update(['password' => Hash::make($request->password)]);

        return redirect()->route('dashboard')->with(['success' => 'Password berhasil diperbarui']);
    }

    // =======================
    // MASTER DATA
    // =======================

    public function masterData()
    {
        $ekskul = Ekskul::all();
        $jumlahEkskul = $ekskul->count();

        $pekerjaan = Pekerjaan::all();
        $jumlahPekerjaan = $pekerjaan->count();

        $sdMutasi = SdMutasi::all();
        $jumlahSdMutasi = $sdMutasi->count();

        $sifatMaster = SifatMaster::all();
        $jumlahSifatMaster = $sifatMaster->count();

        $tk = TkMaster::all();
        $jumlahTk = $tk->count();

        $programUnggulan = ProgramUnggulan::all();
        $jumlahProgramUnggulan = $programUnggulan->count();

        return view('pages.admin.master_data.index',
        [
            'jumlahEkskul' => $jumlahEkskul,
            'jumlahPekerjaan' => $jumlahPekerjaan,
            'jumlahSdMutasi' => $jumlahSdMutasi,
            'jumlahSifatMaster' => $jumlahSifatMaster,
            'jumlahProgramUnggulan' => $jumlahProgramUnggulan,
            'jumlahTk' => $jumlahTk,
        ]);
    }

    // MASTER PEKERJAAN
    public function indexPekerjaan()
    {
        $pekerjaan = Pekerjaan::orderBy('judul', 'ASC')->get();
        return view('pages.admin.bank_data.pekerjaan.index', ['pekerjaan' => $pekerjaan]);
    }

    public function storePekerjaan(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
        ]);

        Pekerjaan::create([
            'judul' => $request->judul,
        ]);

        return redirect()->route('pekerjaan')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function showPekerjaan(Pekerjaan $pekerjaan)
    {
        return view('pages.admin.bank_data.pekerjaan.show', compact('pekerjaan'));
    }

    public function updatePekerjaan(Request $request, Pekerjaan $pekerjaan)
    {
        $this->validate($request, [
            'judul' => 'required'
        ]);

        $pekerjaan->update($request->all());

        return redirect()->route('pekerjaan')->with(['success' => 'Data berhasil diperbarui']);
    }

    public function destroyPekerjaan(Pekerjaan $pekerjaan)
    {
        $pekerjaan->delete();
        return redirect()->route('dataSifat')->with(['success' => 'Data berhasil dihapus!']);
    }

    // MASTER SIFAT
    public function indexSifat()
    {
        $sifat = SifatMaster::orderBy('judul', 'ASC')->get();
        return view('pages.admin.master_data.sifat.index', ['sifat' => $sifat]);
    }

    public function storeSifat(Request $request)
    {
        $this->validate($request, ['judul' => 'required']);

        SifatMaster::create(['judul' => $request->judul]);

        return redirect()->route('sifat')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function showSifat(SifatMaster $sifat)
    {
        return view('pages.admin.master_data.sifat.show', compact('sifat'));
    }

    public function updateSifat(Request $request, SifatMaster $sifat)
    {
        $this->validate($request, [
            'judul' => 'required'
        ]);

        $sifat->update($request->all());

        return redirect()->route('sifat')->with(['success' => 'Data berhasil diperbarui']);
    }

    public function destroySifat(SifatMaster $sifat)
    {
        $sifat->delete();
        return redirect()->route('sifat')->with(['success' => 'Data berhasil dihapus!']);
    }

}
