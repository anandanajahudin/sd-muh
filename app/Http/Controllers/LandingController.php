<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use App\Models\Berita;
use App\Models\Ekskul;
use App\Models\EkskulDetail;
use App\Models\Misi;
use App\Models\Modul;
use App\Models\NilaiSekolah;
use App\Models\Pesan;
use App\Models\Ppdb;
use App\Models\PpdbSiswa;
use App\Models\Profil;
use App\Models\Pekerjaan;
use App\Models\ProfilKeunggulan;
use App\Models\ProgramUnggulan;
use App\Models\ProgramUnggulanDetail;
use App\Models\KelasMaster;
use App\Models\Kurikulum;
use App\Models\KurikulumDetail;
use App\Models\Testimoni;
use App\Models\TkMaster;

class LandingController extends Controller
{
    public function index()
    {
        // Berita
        $agenda = Berita::with('userPost')
            ->orderBy('id', 'DESC')
            ->whereNotNull('tgl_agenda')
            ->take(3)->get();

        $beritaTv = Berita::with('userPost')
            ->orderBy('id', 'DESC')
            ->whereNotNull('link_vidio')
            ->take(3)->get();

        $berita = Berita::with('userPost')
            ->orderBy('id', 'DESC')
            ->whereNull('link_vidio')
            ->whereNull('tgl_agenda')
            ->take(6)->get();

        $galeri = Berita::with('userPost')
            ->orderBy('id', 'DESC')
            ->whereNull('link_vidio')
            ->whereNull('tgl_agenda')
            ->take(10)->get();

        // Visi Misi
        $keterangan = Profil::where('id', 1)->first()->keterangan;
        $visi = Profil::where('id', 1)->first()->judul_visi;
        $misi = Misi::all();
        $nilaiSekolah = NilaiSekolah::orderBy('id', 'ASC')->get();

        $testimoni = Testimoni::with('pekerjaan')
            ->where('nilai', 5)
            ->whereNull('link')
            ->take(5)
            ->get();

        $testimoniVidio = Testimoni::with('pekerjaan')
            ->where('nilai', 5)
            ->whereNotNull('link')
            ->take(1)
            ->get();

        $bannerPrimary = Profil::where('id', 1)->first()->banner_primary;
        $bannerSecondary = Profil::where('id', 1)->first()->banner_secondary;
        $kelasMaster = KelasMaster::where('kelas', 1)->where('jenis', 'Billingual')->get();

        return view(
            'pages.guest.index',
            [
                'agenda' => $agenda,
                'bannerPrimary' => $bannerPrimary,
                'bannerSecondary' => $bannerSecondary,
                'beritaTv' => $beritaTv,
                'berita' => $berita,
                'galeri' => $galeri,
                'keterangan' => $keterangan,
                'visi' => $visi,
                'misi' => $misi,
                'nilaiSekolah' => $nilaiSekolah,
                'testimoniVidio' => $testimoniVidio,
                'kelasMaster' => $kelasMaster,
                'testimoni' => $testimoni,
            ]
        );
    }

    // ======================
    // PROFIL
    // ======================
    public function profil()
    {
        $profil = Profil::where('id', 1)->get();
        $keterangan = Profil::where('id', 1)->first()->keterangan;
        $deskripsi = Profil::where('id', 1)->first()->deskripsi;
        $visi = Profil::where('id', 1)->first()->judul_visi;
        $misiAtas = Misi::where('id', 1)->orWhere('id', 2)->orWhere('id', 3)->get();
        $misiBawah = Misi::where('id', 4)->orWhere('id', 5)->get();

        return view(
            'pages.guest.profile.index',
            [
                'profil' => $profil,
                'keterangan' => $keterangan,
                'deskripsi' => $deskripsi,
                'visi' => $visi,
                'misiAtas' => $misiAtas,
                'misiBawah' => $misiBawah,
            ]
        );
    }

    public function debest()
    {
        return view('pages.guest.profile.debest');
    }

    public function mengapa()
    {
        return view('pages.guest.profile.mengapa');
    }

    public function visiMisi()
    {
        $visi = Profil::where('id', 1)->first()->judul_visi;
        $misiAtas = Misi::where('id', 1)->orWhere('id', 2)->orWhere('id', 3)->get();
        $misiBawah = Misi::where('id', 4)->orWhere('id', 5)->get();

        return view(
            'pages.guest.profile.visi',
            [
                'visi' => $visi,
                'misiAtas' => $misiAtas,
                'misiBawah' => $misiBawah,
            ]
        );
    }

    public function daycare()
    {
        $daycare = Profil::where('id', 1)->first()->daycare;
        $daycare_img = Profil::where('id', 1)->first()->daycare_img;

        return view(
            'pages.guest.profile.daycare',
            [
                'daycare' => $daycare,
                'daycare_img' => $daycare_img,
            ]
        );
    }

    public function ekskul()
    {
        $ekskulOlahraga = Ekskul::orderBy('judul', 'ASC')
            ->where('jenis', 'Olahraga')
            ->get();

        $ekskulOrganisasi = Ekskul::orderBy('judul', 'ASC')
            ->where('jenis', 'Organisasi')
            ->get();

        $ekskulSeni = Ekskul::orderBy('judul', 'ASC')
            ->where('jenis', 'Seni')
            ->get();

        return view(
            'pages.guest.profile.ekskul.index',
            [
                'ekskulOlahraga' => $ekskulOlahraga,
                'ekskulOrganisasi' => $ekskulOrganisasi,
                'ekskulSeni' => $ekskulSeni,
            ]
        );
    }

    public function ekskulShow(Ekskul $ekskul)
    {
        $kegiatan = EkskulDetail::orderBy('id', 'ASC')
            ->where('id_ekskul', $ekskul->id)
            ->where('jenis', 'Kegiatan')
            ->get();

        $brosur = EkskulDetail::orderBy('id', 'ASC')
            ->where('id_ekskul', $ekskul->id)
            ->where('jenis', 'Brosur')
            ->get();

        $prestasi = EkskulDetail::orderBy('id', 'ASC')
            ->where('id_ekskul', $ekskul->id)
            ->where('jenis', 'Prestasi')
            ->get();

        return view(
            'pages.guest.profile.ekskul.show',
            [
                'kegiatan' => $kegiatan,
                'brosur' => $brosur,
                'prestasi' => $prestasi,
            ],
            compact('ekskul')
        );
    }

    public function ekskulDetail(EkskulDetail $ekskulDetail)
    {
        return view(
            'pages.guest.profile.ekskul.detail',
            compact('ekskulDetail')
        );
    }

    // PROGRAM UNGGULAN
    public function programUnggulan()
    {
        $programUnggulan = ProgramUnggulan::all();

        return view(
            'pages.guest.profile.programUnggulan.index',
            ['programUnggulan' => $programUnggulan]
        );
    }

    public function programUnggulanShow(ProgramUnggulan $programUnggulan)
    {
        $kegiatan = ProgramUnggulanDetail::orderBy('id', 'ASC')
            ->where('id_program_unggulan', $programUnggulan->id)
            ->where('jenis', 'Kegiatan')
            ->get();

        $brosur = ProgramUnggulanDetail::orderBy('id', 'ASC')
            ->where('id_program_unggulan', $programUnggulan->id)
            ->where('jenis', 'Brosur')
            ->get();

        $prestasi = ProgramUnggulanDetail::orderBy('id', 'ASC')
            ->where('id_program_unggulan', $programUnggulan->id)
            ->where('jenis', 'Prestasi')
            ->get();

        return view(
            'pages.guest.profile.programUnggulan.show',
            [
                'kegiatan' => $kegiatan,
                'brosur' => $brosur,
                'prestasi' => $prestasi,
            ],
            compact('programUnggulan')
        );
    }

    public function programUnggulanDetail(ProgramUnggulanDetail $programUnggulanDetail)
    {
        return view(
            'pages.guest.profile.programUnggulan.detail',
            compact('programUnggulanDetail')
        );
    }

    public function ptk()
    {
        return view('pages.guest.profile.ptk');
    }

    // ======================
    // KURIKULUM
    // ======================
    public function kurikulum()
    {
        $kurikulum = Kurikulum::all();

        return view('pages.guest.curriculum.index',
            [
                'kurikulum' => $kurikulum
            ]
        );
    }

    public function modulKurikulum()
    {
        $kelasMasters = KelasMaster::orderBy('kelas', 'ASC')->get();

        return view('pages.guest.curriculum.curriculum-modul', [
            'kelasMasters' => $kelasMasters
        ]);
    }

    // ======================
    // KONTAK
    // ======================
    public function kontak()
    {
        $profil = Profil::where('id', 1)->get();

        return view('pages.guest.contact.index', ['profil' => $profil]);
    }

    // ======================
    // KUMPULAN BERITA
    // ======================
    // AGENDA
    // ======================
    public function agenda()
    {
        $agenda = Berita::with('userPost')
            ->orderBy('id', 'DESC')
            ->whereNotNull('tgl_agenda')
            ->get();

        return view('pages.guest.agenda.agenda',
            [
                'agenda' => $agenda
            ]
        );
    }

    public function agendaDetail(Berita $agenda)
    {
        return view('pages.guest.agenda.agenda_lengkap', compact('agenda'));
    }

    // ======================
    // NEWS
    // ======================
    public function berita()
    {
        $beritaLast = Berita::with('userPost')
            ->orderBy('id', 'DESC')
            ->whereNull('link_vidio')
            ->whereNull('tgl_agenda')
            ->take(1)->get();

        $agenda = Berita::with('userPost')
            ->orderBy('id', 'DESC')
            ->whereNotNull('tgl_agenda')
            ->take(3)->get();

        $berita = Berita::with('userPost')
            ->orderBy('id', 'DESC')
            ->whereNull('link_vidio')
            ->whereNull('tgl_agenda')
            ->get();

        $opini = Berita::with('userPost')
            ->orderBy('id', 'DESC')
            ->whereNull('link_vidio')
            ->whereNull('tgl_agenda')
            ->get();

        $beritaTv = Berita::with('userPost')
            ->orderBy('id', 'DESC')
            ->whereNotNull('link_vidio')
            ->take(3)->get();

        return view('pages.guest.news.berita',
            [
                'beritaLast' => $beritaLast,
                'agenda' => $agenda,
                'berita' => $berita,
                'opini' => $opini,
                'beritaTv' => $beritaTv
            ]
        );
    }

    public function news()
    {
        $berita = Berita::with('userPost')
            ->orderBy('id', 'DESC')
            ->whereNull('link_vidio')
            ->whereNull('tgl_agenda')
            ->get();

        return view('pages.guest.news.news', ['berita' => $berita]);
    }

    public function newsDetail(Berita $berita)
    {
        return view('pages.guest.news.news_detail', compact('berita'));
    }

    public function opini()
    {
        $berita = Berita::with('userPost')
            ->where('jenis', 'opini')
            ->orderBy('id', 'DESC')
            ->get();

        return view('pages.guest.opini.opini', ['berita' => $berita]);
    }

    public function opiniDetail(Berita $berita)
    {
        return view('pages.guest.opini.opini_detail', compact('berita'));
    }

    public function tv()
    {
        $beritaTv = Berita::with('userPost')->whereNotNull('link_vidio')->get();

        return view('pages.guest.tv.tv',
            [
                'beritaTv' => $beritaTv
            ]
        );
    }

    public function tvDetail(Berita $berita)
    {
        return view('pages.guest.tv.tv_lengkap', compact('berita'));
    }

    // ======================
    // PPDB
    // ======================
    public function ppdb()
    {
        $kelasMaster = KelasMaster::where('kelas', 1)->get();
        // $tahunIni = date('Y');
        $tahunIni = 2026;
        $ppdbTahunIni = Ppdb::where('tahun', $tahunIni)->first()->tahun_ajaran;
        $ppdbDeskripsi = Ppdb::where('tahun', $tahunIni)->first()->deskripsi;
        $ppdbVidio = Ppdb::where('tahun', $tahunIni)->first()->link;
        $ppdbFile = Ppdb::where('tahun', $tahunIni)->first()->file;

        return view('pages.guest.ppdb.ppdb',
            [
                'tahunIni' => $tahunIni,
                'ppdbTahunIni' => $ppdbTahunIni,
                'ppdbDeskripsi' => $ppdbDeskripsi,
                'ppdbVidio' => $ppdbVidio,
                'ppdbFile' => $ppdbFile,
                'kelasMaster' => $kelasMaster
            ]
        );
    }

    public function ppdbKelas($id_kelas)
    {
        $kelasMaster = KelasMaster::where('kelas', 1)->where('id', $id_kelas)->get();
        $jenisKelas = KelasMaster::where('id', $id_kelas)->first()->jenis;
        $tahunIni = date('Y');
        $ppdbTahunIni = Ppdb::where('tahun', $tahunIni)->first()->tahun_ajaran;
        $ppdbDeskripsi = Ppdb::where('tahun', $tahunIni)->first()->deskripsi;
        $ppdbVidio = Ppdb::where('tahun', $tahunIni)->first()->link;
        $ppdbFile = Ppdb::where('tahun', $tahunIni)->first()->file;

        return view('pages.guest.ppdb.ppdbDetail',
            [
                'kelasMaster' => $kelasMaster,
                'jenisKelas' => $jenisKelas,
                'tahunIni' => $tahunIni,
                'ppdbTahunIni' => $ppdbTahunIni,
                'ppdbDeskripsi' => $ppdbDeskripsi,
                'ppdbVidio' => $ppdbVidio,
                'ppdbFile' => $ppdbFile,
            ]
        );
    }

    public function formulirPpdb()
    {
        $pekerjaanAyah = Pekerjaan::orderBy('judul', 'ASC')->where('judul', '<>', 'Ibu Rumah Tangga')->get();
        $pekerjaanIbu = Pekerjaan::orderBy('judul', 'ASC')->get();
        $pekerjaanWali = Pekerjaan::orderBy('judul', 'ASC')->get();
        $tk = TkMaster::orderBy('nama', 'ASC')->get();
        $tkKota = DB::table('tk_masters')
            ->select('kota')
            ->orderBy('kota', 'ASC')
            ->groupBy('kota')
            ->get();

        return view('pages.guest.ppdb.formulir',
            [
                'pekerjaanAyah' => $pekerjaanAyah,
                'pekerjaanIbu' => $pekerjaanIbu,
                'pekerjaanWali' => $pekerjaanWali,
                'tk' => $tk,
                'tkKota' => $tkKota,
            ]
        );
    }

    public function ppdbStore(Request $request)
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
            'tk' => 'required',
            'nama_tk_lain' => 'nullable',
            'kota_tk_lain' => 'nullable',
            'kategori_kelas' => 'required',
            'file' => 'required|mimes:pdf,jpeg,png,jpg|max:2048',
        ]);

        // $idPpdb = Ppdb::latest()->first()->id;
        // $tahunIni = date('Y');
        $tahunIni = 2024;
        $ppdbTahunIni = Ppdb::where('tahun', $tahunIni)->first()->id;

        if ($request->hasFile('file')) {
            $tkSiswa = 0;
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

            PpdbSiswa::create([
                'id_ppdb' => $ppdbTahunIni,
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

            $kode = PpdbSiswa::latest()->first()->id;

            $namaFile = $kode . '.' . $request->file->extension();
            $destinationPath = 'repo/ppdb/' . $tahunIni . '/' . $request->kategori_kelas;
            $request->file->move($destinationPath, $namaFile);
            // $request->file->storeAs('ppdb/'.$tahunIni.'/'.$request->kategori_kelas, $namaFile, 'public');

            DB::table('ppdb_siswas')
                ->where('id', $kode)
                ->update(['file' => $namaFile]);

            return redirect()->route('ppdb')->with(['success' => 'Terimakasih Pendaftaran Sedang Diproses']);
        } else {
            return redirect()->back()->with(['error' => 'Gagal, file tidak dapat diupload!']);
        }
    }

    // ======================
    // PESAN
    // ======================
    public function storePesanHome(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'telp' => 'required',
            'email' => 'nullable|email:dns',
            'pesan' => 'required',
        ]);

        Pesan::create([
            'nama' => $request->nama,
            'telp' => $request->telp,
            'email' => $request->email,
            'pesan' => $request->pesan,
        ]);

        return redirect()->route('index')->with(['success' => 'Terimakasih, pesan berhasil terkirim!']);
    }

    public function storePesanKontak(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'telp' => 'required',
            'email' => 'nullable|email:dns',
            'pesan' => 'required',
        ]);

        Pesan::create([
            'nama' => $request->nama,
            'telp' => $request->telp,
            'email' => $request->email,
            'pesan' => $request->pesan,
        ]);

        return redirect()->route('kontak')->with(['success' => 'Terimakasih, pesan berhasil terkirim!']);
    }

    public function download()
    {
        $path = storage_path('app/sekolah_karakter.apk'); // Replace 'your_app_name.apk' with the actual name of your APK file

        if (!Storage::exists($path)) {
            abort(404);
        }

        $file = Storage::get($path);

        $response = Response::make($file, 200);
        $response->header('Content-Type', 'application/vnd.android.package-archive');

        return $response;
    }
}
