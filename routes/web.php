<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\GuruGeneralController;
use App\Http\Controllers\JenisEkskulController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KelasMasterController;
use App\Http\Controllers\KelasSiswaController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MasterMuhasabahController;
use App\Http\Controllers\MuhasabahController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\NilaiSekolahController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\PpdbController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ProgramUnggulanController;
use App\Http\Controllers\SdMutasiController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SiswaGeneralController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\WaliMuridController;

// ======================
// ROLE USER
// ======================
Route::get('/', [LandingController::class, 'index'])->name('index');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');

// Profil
Route::get('/profil', [LandingController::class, 'profil'])->name('profil');
Route::get('/debest', [LandingController::class, 'debest'])->name('debest');
Route::get('/visi-misi', [LandingController::class, 'visiMisi'])->name('visiMisi');
Route::get('/mengapa-24', [LandingController::class, 'mengapa'])->name('mengapa');
Route::get('/ptk-24', [LandingController::class, 'ptk'])->name('ptk');

Route::get('/daycare', [LandingController::class, 'daycare'])->name('daycare');
Route::get('/ekskul', [LandingController::class, 'ekskul'])->name('ekskul');
Route::get('/ekskul/{ekskul}', [LandingController::class, 'ekskulShow'])->name('ekskul.show');
Route::get('/ekskul/detail/{ekskulDetail}', [LandingController::class, 'ekskulDetail'])->name('ekskulDetail.show');

Route::get('/program-unggulan', [LandingController::class, 'programUnggulan'])->name('programUnggulan');
Route::get('/program-unggulan/{programUnggulan}', [LandingController::class, 'programUnggulanShow'])->name('programUnggulan.show');
Route::get('/program-unggulan/detail/{programUnggulanDetail}', [LandingController::class, 'programUnggulanDetail'])->name('programUnggulanDetail.show');

// Kontak
Route::get('/kontak', [LandingController::class, 'kontak'])->name('kontak');

// Kurikulum
Route::get('/kurikulum', [LandingController::class, 'kurikulum'])->name('kurikulum');
Route::get('/modul-pembelajaran', [LandingController::class, 'modulKurikulum'])->name('modulPembelajaran');

// News
Route::get('/agenda', [LandingController::class, 'agenda'])->name('agenda');
Route::get('/agenda/{agenda}', [LandingController::class, 'agendaDetail'])->name('agendaDetail');

Route::get('/berita', [LandingController::class, 'berita'])->name('berita');
Route::get('/24-news', [LandingController::class, 'news'])->name('news');
Route::get('/24-news/{berita}', [LandingController::class, 'newsDetail'])->name('newsDetail');

Route::get('/24-opini', [LandingController::class, 'opini'])->name('opini');
Route::get('/24-opini/{berita}', [LandingController::class, 'opiniDetail'])->name('opiniDetail');

Route::get('/24-tv', [LandingController::class, 'tv'])->name('tv');
Route::get('/24-tv/{berita}', [LandingController::class, 'tvDetail'])->name('tvDetail');

// PPDB
Route::get('/ppdb', [LandingController::class, 'ppdb'])->name('ppdb');
// Route::get('/ppdb', [LandingController::class, 'ppdbKelas'])->name('ppdbKelas');
Route::get('/ppdb/detail-kelas/{kelas}', [LandingController::class, 'ppdbKelas'])->name('ppdb.detail');
Route::post('/pendaftaran-ppdb/store', [LandingController::class, 'ppdbStore'])->name('ppdb.store');
Route::get('/formulir-ppdb', [LandingController::class, 'formulirPpdb'])->name('formulir');

// PESAN
Route::post('/index/kirim-pesan', [LandingController::class, 'storePesanHome'])->name('index.storePesanHome');
Route::post('/kontak/kirim-pesan', [LandingController::class, 'storePesanKontak'])->name('kontak.storePesanKontak');

// Route::get('/download', function () {
//     $path = public_path('apps/sekolah.apk');

//     if (!Storage::exists($path)) {
//         abort(404);
//     }

//     // Log information for debugging
//     \Log::info('APK file exists at: ' . $path);

//     $file = Storage::get($path);

//     $response = \Response::make($file, 200);
//     $response->header('Content-Type', 'application/vnd.android.package-archive');

//     return $response;
// });

// ======================
// ROLE ADMIN / GURU
// ======================
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DataController::class, 'dashboard'])->name('dashboard');
    Route::get('/bank-data', [DataController::class, 'bankData'])->name('bankData');
    Route::get('/master-data', [DataController::class, 'masterData'])->name('masterData');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/profilku/{user}', [DataController::class, 'profilku'])->name('profilku');
    // edit profil pegawai
    Route::put('/profilku/updateProfilPegawai/{pegawai}', [DataController::class, 'updateProfilPegawai'])->name('profilku.updateProfilPegawai');
    Route::put('/user/updatePasswordProfilPegawai/{user}', [DataController::class, 'updatePasswordProfilPegawai'])->name('profilku.updatePasswordProfilPegawai');
    // edit profil siswa
    Route::put('/profilku/updateProfilSiswa/{siswa}', [DataController::class, 'updateProfilSiswa'])->name('profilku.updateProfilSiswa');
    Route::put('/user/updatePasswordProfilSiswa/{user}', [DataController::class, 'updatePasswordProfilSiswa'])->name('profilku.updatePasswordProfilSiswa');

    // =====================
    // MUHASABAH
    // =====================

    // MASTER MUHASABAH
    Route::get('/master_muhasabah', [MasterMuhasabahController::class, 'index'])->name('master_muhasabah');
    Route::post('/master_muhasabah/store', [MasterMuhasabahController::class, 'store'])->name('master_muhasabah.store');
    Route::get('/master_muhasabah/{master_muhasabah}', [MasterMuhasabahController::class, 'show']);
    Route::put('/master_muhasabah/{master_muhasabah}', [MasterMuhasabahController::class, 'update'])->name('master_muhasabah.update');
    Route::delete('/master_muhasabah/{master_muhasabah}', [MasterMuhasabahController::class, 'destroy'])->name('master_muhasabah.destroy');

    // MUHASABAH
    Route::get('/muhasabah', [MuhasabahController::class, 'index'])->name('muhasabah');
    Route::get('/muhasabah/show/{muhasabah}', [MuhasabahController::class, 'show']);
    Route::put('/muhasabah/update/{muhasabah}', [MuhasabahController::class, 'update'])->name('muhasabah.update');
    Route::delete('/muhasabah/delete/{muhasabah}', [MuhasabahController::class, 'destroy'])->name('muhasabah.destroy');

    Route::get('/muhasabah/siswa', [MuhasabahController::class, 'muhasabahSiswa'])->name('muhasabahSiswa');
    Route::get('/muhasabah/guru', [MuhasabahController::class, 'muhasabahGuru'])->name('muhasabahGuru');
    Route::get('/muhasabah/daftarMuhasabah/{user}', [MuhasabahController::class, 'showListMuhasabah'])->name('daftarMuhasabah');
    Route::get('/muhasabah/muhasabahHarianku/{user}', [MuhasabahController::class, 'muhasabahHarianku'])->name('muhasabahHarianku');
    Route::get('/muhasabah/showMuhasabahku/{muhasabahku}', [MuhasabahController::class, 'showMuhasabahku'])->name('showMuhasabahku');
    Route::post('/muhasabah/storeHarianku', [MuhasabahController::class, 'storeHarianku'])->name('muhasabah.storeHarianku');
    Route::put('/muhasabah/updateHarianku/{muhasabahku}', [MuhasabahController::class, 'updateHarianku'])->name('muhasabah.updateHarianku');

    // KELAS MASTER
    Route::get('/summaryKelas', [DataController::class, 'summaryKelas'])->name('summaryKelas');
    Route::get('/kelasMaster', [KelasMasterController::class, 'index'])->name('kelasMaster');
    Route::post('/kelasMaster/store', [KelasMasterController::class, 'store'])->name('kelasMaster.store');
    Route::get('/kelasMaster/{kelasMaster}', [KelasMasterController::class, 'show']);
    Route::put('/kelasMaster/{kelasMaster}', [KelasMasterController::class, 'update'])->name('kelasMaster.update');
    Route::delete('/kelasMaster/{kelasMaster}', [KelasMasterController::class, 'destroy'])->name('kelasMaster.destroy');

    // KELAS
    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas');
    Route::post('/kelas/store', [KelasController::class, 'store'])->name('kelas.store');
    Route::get('/kelas/{kelas}', [KelasController::class, 'show']);
    Route::put('/kelas/{kelas}', [KelasController::class, 'update'])->name('kelas.update');
    Route::delete('/kelas/{kelas}', [KelasController::class, 'destroy'])->name('kelas.destroy');

    Route::get('/kelasSiswa', [KelasSiswaController::class, 'index'])->name('kelasSiswa');
    Route::post('/kelasSiswa/store', [KelasSiswaController::class, 'store'])->name('kelasSiswa.store');
    Route::get('/kelasSiswa/{kelasSiswa}', [KelasSiswaController::class, 'show']);
    Route::put('/kelasSiswa/{kelasSiswa}', [KelasSiswaController::class, 'update'])->name('kelasSiswa.update');
    Route::delete('/kelasSiswa/{kelasSiswa}', [KelasSiswaController::class, 'destroy'])->name('kelasSiswa.destroy');
    Route::get('/kelasSiswa/daftarSiswa/{kelasSiswa}', [KelasSiswaController::class, 'showListSiswa'])->name('kelasSiswa.daftarSiswa');

    // Route::get('/kelas/trash', [KelasController::class, 'trash'])->name('kelas.trash');
    // Route::post('/kelas/{kelas}/pulihkan', [KelasController::class, 'pulihkan'])->name('kelas.pulihkan');
    // Route::post('/kelas/pulihkanSemua', [KelasController::class, 'pulihkanSemua'])->name('kelas.pulihkanSemua');
    // Route::delete('/kelas/{kelas}/hapusPermanen', [KelasController::class, 'hapusPermanen'])->name('kelas.hapusPermanen');
    // Route::delete('/kelas/hapusPermanenSemua', [KelasController::class, 'hapusPermanenSemua'])->name('kelas.hapusPermanenSemua');

    // JENIS MODUL PEMBELAJARAN
    Route::get('/jenisModul', [ModulController::class, 'indexJenis'])->name('jenisModul');
    Route::post('/jenisModul/store', [ModulController::class, 'storeJenis'])->name('jenisModul.store');
    Route::get('/jenisModul/{jenisModul}', [ModulController::class, 'showJenis']);
    Route::put('/jenisModul/{jenisModul}', [ModulController::class, 'updateJenis'])->name('jenisModul.update');
    Route::delete('/jenisModul/{jenisModul}', [ModulController::class, 'destroyJenis'])->name('jenisModul.destroy');

    // MODUL PEMBELAJARAN
    Route::get('/modul-kelas', [ModulController::class, 'summaryModul'])->name('summaryModul');
    Route::get('/modul-kelas/{kelas}', [ModulController::class, 'showSummaryModul'])->name('summaryModul.show');
    Route::get('/dataModul', [ModulController::class, 'index'])->name('dataModul');
    Route::post('/dataModul/store', [ModulController::class, 'store'])->name('dataModul.store');
    Route::get('/dataModul/{dataModul}', [ModulController::class, 'show']);
    Route::put('/dataModul/{dataModul}', [ModulController::class, 'update'])->name('dataModul.update');
    Route::put('/dataModul/updateFile/{dataModul}', [ModulController::class, 'updateFile'])->name('dataModul.updateFile');
    Route::delete('/dataModul/{dataModul}', [ModulController::class, 'destroy'])->name('dataModul.destroy');

    // PEGAWAI
    Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai');
    Route::post('/pegawai/store', [PegawaiController::class, 'store'])->name('pegawai.store');
    Route::post('/pegawai/importUser', [PegawaiController::class, 'importUser'])->name('pegawai.importUser');
    Route::post('/pegawai/import', [PegawaiController::class, 'import'])->name('pegawai.import');
    Route::get('/pegawai/{pegawai}', [PegawaiController::class, 'show']);
    Route::put('/pegawai/{pegawai}', [PegawaiController::class, 'update'])->name('pegawai.update');
    Route::put('/pegawai/storeFoto/{pegawai}', [PegawaiController::class, 'storeFoto'])->name('pegawai.storeFoto');
    Route::put('/pegawai/storeFotoKtp/{pegawai}', [PegawaiController::class, 'storeFotoKtp'])->name('pegawai.storeFotoKtp');
    Route::delete('/pegawai/{pegawai}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');
    Route::put('/user/updatePasswordPegawai/{user}', [PegawaiController::class, 'updatePasswordPegawai'])->name('user.updatePasswordPegawai');

    // PPDB
    Route::get('/daftar-ppdb', [PpdbController::class, 'daftarPpdb'])->name('daftarPpdb');
    Route::get('/ppdbMaster', [PpdbController::class, 'index'])->name('ppdbMaster');
    Route::post('/ppdbMaster/store', [PpdbController::class, 'store'])->name('ppdbMaster.store');
    Route::get('/ppdbMaster/{ppdb}', [PpdbController::class, 'show']);
    Route::put('/ppdbMaster/{ppdb}', [PpdbController::class, 'update'])->name('ppdbMaster.update');
    Route::put('/ppdbMaster/updateGambar/{ppdb}', [PpdbController::class, 'updateGambar'])->name('ppdbMaster.updateGambar');
    Route::put('/ppdbMaster/updateFile/{ppdb}', [PpdbController::class, 'updateFile'])->name('ppdbMaster.updateFile');
    Route::delete('/ppdbMaster/{ppdb}', [PpdbController::class, 'destroy'])->name('ppdbMaster.destroy');

    // PPDB SISWA
    Route::get('/ppdbSiswa', [PpdbController::class, 'indexPpdbSiswa'])->name('ppdbSiswa');
    Route::post('/ppdbSiswa/store', [PpdbController::class, 'storePpdbSiswa'])->name('ppdbSiswa.store');
    Route::get('/ppdbSiswa/{ppdbSiswa}', [PpdbController::class, 'showPpdbSiswa']);
    Route::put('/ppdbSiswa/{ppdbSiswa}', [PpdbController::class, 'updatePpdbSiswa'])->name('ppdbSiswa.update');
    Route::delete('/ppdbSiswa/{ppdbSiswa}', [PpdbController::class, 'destroyPpdbSiswa'])->name('ppdbSiswa.destroy');
    Route::get('/ppdbSiswa/daftarCalonSiswa/{ppdb}', [PpdbController::class, 'showListCalonSiswa'])->name('ppdbSiswa.daftarCalonSiswa');
    Route::get('/ppdbSiswa/detailCalonSiswa/{ppdb}', [PpdbController::class, 'detailCalonSiswa'])->name('ppdbSiswa.detailCalonSiswa');
    Route::put('/ppdbSiswa/uploadBuktiPembayaran/{ppdbSiswa}', [PpdbController::class, 'uploadBuktiPembayaran'])->name('ppdbSiswa.uploadBuktiPembayaran');
    Route::post('/ppdbSiswa/diterima', [PpdbController::class, 'diterima'])->name('siswa.diterima');

    // SISWA
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa');
    Route::post('/siswa/store', [SiswaController::class, 'store'])->name('siswa.store');
    Route::get('/siswa/{siswa}', [SiswaController::class, 'show']);
    Route::put('/siswa/{siswa}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::put('/siswa/storeFoto/{siswa}', [SiswaController::class, 'storeFoto'])->name('siswa.storeFoto');
    Route::delete('/siswa/{siswa}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
    Route::put('/user/updatePasswordSiswa/{user}', [SiswaController::class, 'updatePasswordSiswa'])->name('user.updatePasswordSiswa');
    Route::get('/siswa/daftarPrestasi/{siswa}', [SiswaController::class, 'showListPrestasi'])->name('siswa.daftarPrestasi');
    Route::post('/siswa/importUser', [SiswaController::class, 'importUserSiswa'])->name('siswa.importUserSiswa');
    Route::post('/siswa/importPpdbSiswa', [SiswaController::class, 'importPpdbSiswa'])->name('siswa.importPpdbSiswa');
    Route::post('/siswa/importSiswa', [SiswaController::class, 'importSiswa'])->name('siswa.importSiswa');
    Route::get('/get-classes-by-year', [SiswaController::class, 'getClassesByYear'])->name('getClassesByYear');
    Route::get('/get-students-by-class-and-year', [SiswaController::class, 'getStudentsByClassAndYear'])->name('getStudentsByClassAndYear');

    // PRESTASI SISWA
    Route::get('/prestasiSiswa', [SiswaController::class, 'indexPrestasiSiswa'])->name('prestasiSiswa');
    Route::post('/prestasiSiswa/store', [SiswaController::class, 'storePrestasiSiswa'])->name('prestasiSiswa.store');
    Route::get('/prestasiSiswa/{prestasiSiswa}', [SiswaController::class, 'showPrestasiSiswa']);
    Route::put('/prestasiSiswa/{prestasiSiswa}', [SiswaController::class, 'updatePrestasiSiswa'])->name('prestasiSiswa.update');
    Route::put('/prestasiSiswa/storeFoto/{prestasiSiswa}', [SiswaController::class, 'storeFotoPrestasiSiswa'])->name('prestasiSiswa.storeFoto');
    Route::delete('/prestasiSiswa/{prestasiSiswa}', [SiswaController::class, 'destroyPrestasiSiswa'])->name('prestasiSiswa.destroy');

    // KEJADIAN SISWA
    Route::get('/kejadianSiswa', [SiswaController::class, 'indexKejadianSiswa'])->name('kejadianSiswa');
    Route::post('/kejadianSiswa/store', [SiswaController::class, 'storeKejadianSiswa'])->name('kejadianSiswa.store');
    Route::get('/kejadianSiswa/{kejadianSiswa}', [SiswaController::class, 'showKejadianSiswa']);
    Route::put('/kejadianSiswa/{kejadianSiswa}', [SiswaController::class, 'updateKejadianSiswa'])->name('kejadianSiswa.update');
    Route::delete('/kejadianSiswa/{kejadianSiswa}', [SiswaController::class, 'destroyKejadianSiswa'])->name('kejadianSiswa.destroy');

    // SIFAT SISWA
    Route::get('/sifatSiswa', [SiswaController::class, 'indexSifatSiswa'])->name('sifatSiswa');
    Route::post('/sifatSiswa/store', [SiswaController::class, 'storeSifatSiswa'])->name('sifatSiswa.store');
    Route::get('/sifatSiswa/{siswa}', [SiswaController::class, 'showSifatSiswa']);
    // Route::put('/sifatSiswa/{siswa}', [SiswaController::class, 'updateSifatSiswa'])->name('sifatSiswa.update');
    Route::delete('/sifatSiswa/{sifatSiswa}', [SiswaController::class, 'destroySifatSiswa'])->name('sifatSiswa.destroy');

    // ===================
    // MASTER DATA
    // ===================

    // MASTER TK
    Route::get('/dataTk', [SiswaController::class, 'indexTk'])->name('dataTk');
    Route::post('/dataTk/store', [SiswaController::class, 'storeTk'])->name('dataTk.store');
    Route::get('/dataTk/{tk}', [SiswaController::class, 'showTk']);
    Route::put('/dataTk/{tk}', [SiswaController::class, 'updateTk'])->name('dataTk.update');
    Route::delete('/dataTk/{tk}', [SiswaController::class, 'destroyTk'])->name('dataTk.destroy');

    // MASTER SD MUTASI
    Route::get('/sdMutasi', [SdMutasiController::class, 'index'])->name('sdMutasi');
    Route::post('/sdMutasi/store', [SdMutasiController::class, 'store'])->name('sdMutasi.store');
    Route::get('/sdMutasi/{sdMutasi}', [SdMutasiController::class, 'show']);
    Route::put('/sdMutasi/{sdMutasi}', [SdMutasiController::class, 'update'])->name('sdMutasi.update');
    Route::delete('/sdMutasi/{sdMutasi}', [SdMutasiController::class, 'destroy'])->name('sdMutasi.destroy');

    // MASTER SIFAT
    Route::get('/sifat', [DataController::class, 'indexSifat'])->name('sifat');
    Route::post('/sifat/store', [DataController::class, 'storeSifat'])->name('sifat.store');
    Route::get('/sifat/{sifat}', [DataController::class, 'showSifat']);
    Route::put('/sifat/{sifat}', [DataController::class, 'updateSifat'])->name('sifat.update');
    Route::delete('/sifat/{sifat}', [DataController::class, 'destroySifat'])->name('sifat.destroy');

    // MASTER PEKERJAAN
    Route::get('/pekerjaan', [DataController::class, 'indexPekerjaan'])->name('pekerjaan');
    Route::post('/pekerjaan/store', [DataController::class, 'storePekerjaan'])->name('pekerjaan.store');
    Route::get('/pekerjaan/{pekerjaan}', [DataController::class, 'showPekerjaan']);
    Route::put('/pekerjaan/{pekerjaan}', [DataController::class, 'updatePekerjaan'])->name('pekerjaan.update');
    Route::delete('/pekerjaan/{pekerjaan}', [DataController::class, 'destroyPekerjaan'])->name('pekerjaan.destroy');

    // =====================
    // BERITA SEKOLAH
    // =====================

    // DATA AGENDA
    Route::get('/dataAgenda', [BeritaController::class, 'dataAgenda'])->name('dataAgenda');
    Route::get('/addAgenda', [BeritaController::class, 'addAgenda'])->name('addAgenda');
    Route::post('/dataAgenda/store', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/dataAgenda/{berita}', [BeritaController::class, 'show']);
    Route::put('/dataAgenda/{berita}', [BeritaController::class, 'update'])->name('berita.update');
    Route::put('/dataAgenda/updateGambar/{berita}', [BeritaController::class, 'updateGambar'])->name('berita.updateGambar');
    Route::delete('/dataAgenda/{berita}', [BeritaController::class, 'destroy'])->name('berita.destroy');

    // DATA BERITA
    Route::get('/dataBerita', [BeritaController::class, 'dataBerita'])->name('dataBerita');
    Route::get('/addBerita', [BeritaController::class, 'addBerita'])->name('addBerita');
    Route::post('/dataBerita/store', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/dataBerita/{berita}', [BeritaController::class, 'show']);
    Route::put('/dataBerita/{berita}', [BeritaController::class, 'update'])->name('berita.update');
    Route::put('/dataBerita/updateGambar/{berita}', [BeritaController::class, 'updateGambar'])->name('berita.updateGambar');
    Route::delete('/dataBerita/{berita}', [BeritaController::class, 'destroy'])->name('berita.destroy');

    // DATA OPINI
    Route::get('/dataOpini', [BeritaController::class, 'dataOpini'])->name('dataOpini');
    Route::get('/addOpini', [BeritaController::class, 'addOpini'])->name('addOpini');
    Route::post('/dataOpini/store', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/dataOpini/{berita}', [BeritaController::class, 'show']);
    Route::put('/dataOpini/{berita}', [BeritaController::class, 'update'])->name('berita.update');
    Route::put('/dataOpini/updateGambar/{berita}', [BeritaController::class, 'updateGambar'])->name('berita.updateGambar');
    Route::delete('/dataOpini/{berita}', [BeritaController::class, 'destroy'])->name('berita.destroy');

    // DATA BERITA TV
    Route::get('/dataTv', [BeritaController::class, 'dataTv'])->name('dataTv');
    Route::get('/addTv', [BeritaController::class, 'addTv'])->name('addTv');
    Route::post('/dataTv/store', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/dataTv/{berita}', [BeritaController::class, 'show']);
    Route::put('/dataTv/{berita}', [BeritaController::class, 'update'])->name('berita.update');
    Route::put('/dataTv/updateGambar/{berita}', [BeritaController::class, 'updateGambar'])->name('berita.updateGambar');
    Route::delete('/dataTv/{berita}', [BeritaController::class, 'destroy'])->name('berita.destroy');


    // ===========================
    // LANDING PAGE MANAGEMENT
    // ===========================
    // PROFIL
    Route::get('/dataProfil', [ProfilController::class, 'index'])->name('dataProfil');
    Route::post('/dataProfil/store', [ProfilController::class, 'store'])->name('dataProfil.store');
    Route::put('/dataProfil/{profil}', [ProfilController::class, 'update'])->name('dataProfil.update');
    Route::put('/dataProfil/updateBannerPrimary/{id}', [ProfilController::class, 'updateBannerPrimary'])->name('dataProfil.updateBannerPrimary');
    Route::put('/dataProfil/updateBannerSecondary/{id}', [ProfilController::class, 'updateBannerSecondary'])->name('dataProfil.updateBannerSecondary');
    Route::delete('/dataProfil/{profil}', [ProfilController::class, 'destroy'])->name('dataProfil.destroy');

    Route::get('/dataMisi', [ProfilController::class, 'indexMisi'])->name('dataMisi');
    Route::post('/dataMisi/store', [ProfilController::class, 'storeMisi'])->name('dataMisi.store');
    Route::get('/dataMisi/{misi}', [ProfilController::class, 'showMisi']);
    Route::put('/dataMisi/{misi}', [ProfilController::class, 'updateMisi'])->name('dataMisi.update');
    Route::delete('/dataMisi/{misi}', [ProfilController::class, 'destroyMisi'])->name('dataMisi.destroy');

    Route::get('/dataKurikulum', [KurikulumController::class, 'index'])->name('dataKurikulum');
    Route::post('/dataKurikulum/store', [KurikulumController::class, 'store'])->name('dataKurikulum.store');
    Route::get('/dataKurikulum/{kurikulum}', [KurikulumController::class, 'show']);
    Route::put('/dataKurikulum/{kurikulum}', [KurikulumController::class, 'update'])->name('dataKurikulum.update');
    Route::delete('/dataKurikulum/{kurikulum}', [KurikulumController::class, 'destroy'])->name('dataKurikulum.destroy');

    Route::get('/dataDetailKurikulum', [KurikulumController::class, 'indexDetailKurikulum'])->name('dataDetailKurikulum');
    Route::post('/dataDetailKurikulum/store', [KurikulumController::class, 'storeDetailKurikulum'])->name('dataDetailKurikulum.store');
    Route::get('/dataDetailKurikulum/{detailKurikulum}', [KurikulumController::class, 'showDetailKurikulum']);
    Route::put('/dataDetailKurikulum/{detailKurikulum}', [KurikulumController::class, 'updateDetailKurikulum'])->name('dataDetailKurikulum.update');
    Route::delete('/dataDetailKurikulum/{detailKurikulum}', [KurikulumController::class, 'destroyDetailKurikulum'])->name('dataDetailKurikulum.destroy');

    Route::get('/dataKeunggulan', [ProfilController::class, 'indexKeunggulan'])->name('dataKeunggulan');
    Route::post('/dataKeunggulan/store', [ProfilController::class, 'storeKeunggulan'])->name('dataKeunggulan.store');
    Route::get('/dataKeunggulan/{keunggulan}', [ProfilController::class, 'showKeunggulan']);
    Route::put('/dataKeunggulan/{keunggulan}', [ProfilController::class, 'updateKeunggulan'])->name('dataKeunggulan.update');
    Route::delete('/dataKeunggulan/{keunggulan}', [ProfilController::class, 'destroyKeunggulan'])->name('dataKeunggulan.destroy');

    // JENIS EKSKUL
    Route::prefix('jenis-ekskul')->name('jenisEkskul.dashboard.')->group(function () {
        Route::get('/', [JenisEkskulController::class, 'index'])->name('index');
        Route::get('/create', [JenisEkskulController::class, 'create'])->name('create');
        Route::post('/', [JenisEkskulController::class, 'store'])->name('store');
        Route::get('/{id}/show', [JenisEkskulController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [JenisEkskulController::class, 'edit'])->name('edit');
        Route::put('/{id}', [JenisEkskulController::class, 'update'])->name('update');
        Route::delete('/{id}', [JenisEkskulController::class, 'destroy'])->name('destroy');
    });

    // EKSKUL
    Route::get('/dataEkskul', [EkskulController::class, 'index'])->name('dataEkskul');
    Route::post('/dataEkskul/store', [EkskulController::class, 'store'])->name('dataEkskul.store');
    Route::get('/dataEkskul/{dataEkskul}', [EkskulController::class, 'show']);
    Route::put('/dataEkskul/{dataEkskul}', [EkskulController::class, 'update'])->name('dataEkskul.update');
    Route::put('/dataEkskul/updateFile/{dataEkskul}', [EkskulController::class, 'updateFile'])->name('dataEkskul.updateFile');
    Route::delete('/dataEkskul/{dataEkskul}', [EkskulController::class, 'destroy'])->name('dataEkskul.destroy');
    Route::get('/dataEkskul/detail/{dataEkskul}', [EkskulController::class, 'detailEkskul'])->name('dataEkskul.detail');

    // DETAIL EKSKUL
    Route::get('/detailEkskul', [EkskulController::class, 'indexDetailEkskul'])->name('detailEkskul');
    Route::post('/detailEkskul/store', [EkskulController::class, 'storeDetailEkskul'])->name('detailEkskul.store');
    Route::get('/detailEkskul/{detailEkskul}', [EkskulController::class, 'showDetailEkskul']);
    Route::put('/detailEkskul/{detailEkskul}', [EkskulController::class, 'updateDetailEkskul'])->name('detailEkskul.update');
    Route::put('/detailEkskul/updateFile/{detailEkskul}', [EkskulController::class, 'updateFileDetailEkskul'])->name('detailEkskul.updateFile');
    Route::delete('/detailEkskul/{detailEkskul}', [EkskulController::class, 'destroyDetailEkskul'])->name('detailEkskul.destroy');


    // Route::prefix('cost-type')->name('costType.dashboard.')->group(function () {
    //     Route::get('/', [CostTypeController::class, 'index'])->name('index');
    //     Route::get('/create', [CostTypeController::class, 'create'])->name('create');
    //     Route::post('/', [CostTypeController::class, 'store'])->name('store');
    //     Route::get('/{id}/edit', [CostTypeController::class, 'edit'])->name('edit');
    //     Route::put('/{id}', [CostTypeController::class, 'update'])->name('update');
    //     Route::delete('/{id}', [CostTypeController::class, 'destroy'])->name('destroy');
    // });

    // PROGRAM UNGGULAN
    Route::get('/dataProgramUnggulan', [ProgramUnggulanController::class, 'index'])->name('dataProgramUnggulan');
    Route::post('/dataProgramUnggulan/store', [ProgramUnggulanController::class, 'store'])->name('dataProgramUnggulan.store');
    Route::get('/dataProgramUnggulan/{dataProgramUnggulan}', [ProgramUnggulanController::class, 'show']);
    Route::put('/dataProgramUnggulan/{dataProgramUnggulan}', [ProgramUnggulanController::class, 'update'])->name('dataProgramUnggulan.update');
    Route::put('/dataProgramUnggulan/updateFile/{dataProgramUnggulan}', [ProgramUnggulanController::class, 'updateFile'])->name('dataProgramUnggulan.updateFile');
    Route::delete('/dataProgramUnggulan/{dataProgramUnggulan}', [ProgramUnggulanController::class, 'destroy'])->name('dataProgramUnggulan.destroy');
    Route::get('/dataProgramUnggulan/detail/{dataProgramUnggulan}', [ProgramUnggulanController::class, 'detailProgramUnggulan'])->name('dataProgramUnggulan.detail');

    // DETAIL PROGRAM UNGGULAN
    Route::get('/detailProgramUnggulan', [ProgramUnggulanController::class, 'indexDetailProgramUnggulan'])->name('detailProgramUnggulan');
    Route::post('/detailProgramUnggulan/store', [ProgramUnggulanController::class, 'storeDetailProgramUnggulan'])->name('detailProgramUnggulan.store');
    Route::get('/detailProgramUnggulan/{detailProgramUnggulan}', [ProgramUnggulanController::class, 'showDetailProgramUnggulan']);
    Route::put('/detailProgramUnggulan/{detailProgramUnggulan}', [ProgramUnggulanController::class, 'updateDetailProgramUnggulan'])->name('detailProgramUnggulan.update');
    Route::put('/detailProgramUnggulan/updateFile/{detailProgramUnggulan}', [ProgramUnggulanController::class, 'updateFileDetailProgramUnggulan'])->name('detailProgramUnggulan.updateFile');
    Route::delete('/detailProgramUnggulan/{detailProgramUnggulan}', [ProgramUnggulanController::class, 'destroyDetailProgramUnggulan'])->name('detailProgramUnggulan.destroy');

    // PESAN
    Route::get('/dataPesan', [PesanController::class, 'index'])->name('dataPesan');
    Route::post('/dataPesan/store', [PesanController::class, 'store'])->name('dataPesan.store');
    Route::get('/dataPesan/{pesan}', [PesanController::class, 'show']);
    Route::put('/dataPesan/{pesan}', [PesanController::class, 'update'])->name('dataPesan.update');
    Route::delete('/dataPesan/{pesan}', [PesanController::class, 'destroy'])->name('dataPesan.destroy');

    // TESTIMONI
    Route::get('/dataTestimoni', [TestimoniController::class, 'index'])->name('dataTestimoni');
    Route::post('/dataTestimoni/store', [TestimoniController::class, 'store'])->name('dataTestimoni.store');
    Route::get('/dataTestimoni/{testimoni}', [TestimoniController::class, 'show']);
    Route::put('/dataTestimoni/{testimoni}', [TestimoniController::class, 'update'])->name('dataTestimoni.update');
    Route::put('/dataTestimoni/updateGambar/{testimoni}', [TestimoniController::class, 'updateGambar'])->name('dataTestimoni.updateGambar');
    Route::delete('/dataTestimoni/{testimoni}', [TestimoniController::class, 'destroy'])->name('dataTestimoni.destroy');

    Route::get('/dataDaycare', [ProfilController::class, 'index'])->name('dataDaycare');
    Route::put('/dataDaycare/update/{id}', [ProfilController::class, 'updateDaycare'])->name('dataDaycare.update');
    Route::put('/dataDaycare/updateGambar/{id}', [ProfilController::class, 'updateDaycareGambar'])->name('dataDaycare.updateGambar');

    Route::prefix('dataNilaiSekolah')->group(function () {
        Route::get('', [NilaiSekolahController::class, 'index'])->name('dataNilaiSekolah.index');
        Route::post('/store', [NilaiSekolahController::class, 'store'])->name('dataNilaiSekolah.store');
        Route::get('/show/{id}', [NilaiSekolahController::class, 'show'])->name('dataNilaiSekolah.show');
        Route::get('/edit/{id}', [NilaiSekolahController::class, 'edit'])->name('dataNilaiSekolah.edit');
        Route::put('/update/{id}', [NilaiSekolahController::class, 'update'])->name('dataNilaiSekolah.update');
        Route::put('/updateLogo/{id}', [NilaiSekolahController::class, 'updateLogo'])->name('dataNilaiSekolah.updateLogo');
        // Route::delete('/destroy/{id}', [NilaiSekolahController::class, 'destroy'])->name('dataNilaiSekolah.destroy');
    });

    // GURU GENERAL
    Route::prefix('guru-general')->name('guruGeneral.dashboard.')->group(function () {
        Route::get('/', [GuruGeneralController::class, 'index'])->name('index');
        Route::get('/create', [GuruGeneralController::class, 'create'])->name('create');
        Route::post('/', [GuruGeneralController::class, 'store'])->name('store');
        Route::get('/{id}/show', [GuruGeneralController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [GuruGeneralController::class, 'edit'])->name('edit');
        Route::put('/{id}', [GuruGeneralController::class, 'update'])->name('update');
        Route::delete('/{id}', [GuruGeneralController::class, 'destroy'])->name('destroy');
    });

    // SISWA GENERAL
    Route::prefix('siswa-general')->name('siswaGeneral.dashboard.')->group(function () {
        Route::get('/', [SiswaGeneralController::class, 'index'])->name('index');
        Route::get('/create', [SiswaGeneralController::class, 'create'])->name('create');
        Route::post('/', [SiswaGeneralController::class, 'store'])->name('store');
        Route::get('/{id}/show', [SiswaGeneralController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [SiswaGeneralController::class, 'edit'])->name('edit');
        Route::put('/{id}', [SiswaGeneralController::class, 'update'])->name('update');
        Route::delete('/{id}', [SiswaGeneralController::class, 'destroy'])->name('destroy');
    });

    // WALI MURID
    Route::prefix('wali-murid')->name('waliMurid.dashboard.')->group(function () {
        Route::get('/', [WaliMuridController::class, 'index'])->name('index');
        Route::get('/create', [WaliMuridController::class, 'create'])->name('create');
        Route::post('/', [WaliMuridController::class, 'store'])->name('store');
        Route::get('/{id}/show', [WaliMuridController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [WaliMuridController::class, 'edit'])->name('edit');
        Route::put('/{id}', [WaliMuridController::class, 'update'])->name('update');
        Route::delete('/{id}', [WaliMuridController::class, 'destroy'])->name('destroy');
    });

    // Route::prefix('category')->group(function () {
    //     Route::get('', [SiswaController::class, 'index'])->name('category.index');
    //     Route::post('/store', [SiswaController::class, 'store'])->name('category.store');
    //     Route::get('/show/{id}', [SiswaController::class, 'show'])->name('category.show');
    //     Route::get('/edit/{id}', [SiswaController::class, 'edit'])->name('category.edit');
    //     Route::put('/update/{id}', [SiswaController::class, 'update'])->name('category.update');
    //     Route::delete('/destroy/{id}', [SiswaController::class, 'destroy'])->name('category.destroy');
    // });
});
