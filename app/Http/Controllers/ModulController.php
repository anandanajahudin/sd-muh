<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\KelasMaster;
use App\Models\JenisModul;
use App\Models\Modul;

class ModulController extends Controller
{
    public function index()
    {
        $kelasMaster = KelasMaster::orderBy('kelas', 'ASC')->get();
        $jenisModul = JenisModul::orderBy('judul', 'ASC')->get();

        if (Auth::user()->email == 'siswa@sekolahkaraktersdm24.sch.id') {
            $modul = Modul::with('modulKelas', 'jenisModul')->get();
        } else if (Auth::user()->jenis == 'siswa') {
            $siswaId = Auth::user()->id;
            $kelasmaster = Auth::user()->siswa->kelasSiswa->namaKelas->tipeKelas->id;
            $modul = Modul::with('modulKelas', 'jenisModul')->where('id_kelas_master', $kelasmaster)->get();

        } else {
            $modul = Modul::with('modulKelas', 'jenisModul')->get();
        }

        return view('pages.admin.bank_data.modul.index',
        [
            'kelasMaster' => $kelasMaster,
            'jenisModul' => $jenisModul,
            'modul' => $modul,
        ]);
    }

    public function summaryModul()
    {
        $kelas = DB::table('kelas_masters')
                 ->select('kelas')
                 ->groupBy('kelas')
                 ->get();

        return view('pages.admin.bank_data.modul.listmodulkelas', ['kelas' => $kelas]);
    }

    public function showSummaryModul($id_kelas_master)
    {
        // Ambil data kelas master
        $kelas = KelasMaster::find($id_kelas_master);
        if (!$kelas) {
            return redirect()->back()->with('error', 'Kelas tidak ditemukan!');
        }

        // Dapatkan nilai kelas (misal: 1, 2, 3...)
        $kelasNumber = $kelas->kelas;

        // Ambil semua id kelas master yang memiliki nomor kelas yang sama
        $kelasMasterIds = KelasMaster::where('kelas', $kelasNumber)->pluck('id');

        // Ambil modul terkait semua kelas dengan nomor kelas yang sama
        $modul = Modul::with(['jenisModul', 'modulKelas'])
            ->whereIn('id_kelas_master', $kelasMasterIds)
            ->orderBy('judul', 'ASC')
            ->get();

        $jenisModul = JenisModul::orderBy('judul', 'ASC')->get();

        return view('pages.admin.bank_data.modul.summaryDetail', [
            'jenisModul' => $jenisModul,
            'modul' => $modul,
            'id_kelas_master' => $id_kelas_master,
            'kelasModul' => $kelas->kelas, // tampilkan angka kelas
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'jenis' => 'required',
            'jenislain' => 'nullable',
            'deskripsi' => 'nullable',
            'file' => 'required|mimes:doc,docx,pdf',
            'id_kelas_master' => 'required',
        ]);

        if($request->hasFile('file')) {
            if ($request->jenis == 'Lainnya') {
                JenisModul::create(['judul' => $request->jenislain]);
                $jenisLain = JenisModul::latest()->first()->id;
                $jenisModulFix = $jenisLain;
            } else {
                $jenisModulFix = $request->jenis;
            }

            Modul::create([
                'judul' => $request->judul,
                'id_jenis' => $jenisModulFix,
                'deskripsi' => $request->deskripsi,
                'id_kelas_master' => $request->id_kelas_master,
            ]);

            $fileModul = $request->file('file');
            $ukuranFile = $fileModul->getSize();

            $kode = Modul::latest()->first()->id;
            $kodeKelas = $request->id_kelas_master;

            $namaFile = $kode.'_file'.'.'.$request->file->extension();
            $destinationPath = 'repo/modul/'.$kodeKelas.'/'.$kode;
            $request->file->move($destinationPath, $namaFile);

            DB::table('moduls')
                ->where('id', $kode)
                ->update(['file' => $namaFile, 'ukuran_file' => $ukuranFile]);

            if (auth()->user()->jenis != 'admin') {
                return redirect()->route('dataModul')->with(['success' => 'Modul Berhasil Diupload!']);
            } else {
                return redirect()->back()->with(['success' => 'Modul Berhasil Diupload!']);
            }

        } else {
            return redirect()->back()->with(['error' => 'Gagal, file tidak dapat diupload!']);
        }
    }

    public function show(Modul $dataModul)
    {
        $kelasMaster = KelasMaster::all();
        $jenisModul = JenisModul::orderBy('judul', 'ASC')->get();

        return view('pages.admin.bank_data.modul.show',
        [
            'kelasMaster' => $kelasMaster,
            'jenisModul' => $jenisModul,
        ], compact('dataModul'));
    }

    public function update(Request $request, Modul $dataModul)
    {
        $this->validate($request, [
            'judul' => 'required',
            'id_jenis' => 'required',
            // 'jenislain' => 'nullable',
            'deskripsi' => 'nullable',
            'id_kelas_master' => 'required',
        ]);

        // if ($request->id_jenis == 'Lainnya') {
        //     JenisModul::create(['judul' => $request->jenislain]);
        //     $jenisLain = JenisModul::latest()->first()->id;
        //     $jenisModulFix = $jenisLain;
        // } else {
        //     $jenisModulFix = $request->id_jenis;
        // }

        $dataModul->update($request->all());

        // DB::table('moduls')
        //     ->where('id', $dataModul)
        //     ->update([
        //         'judul' => $request->judul,
        //         'id_jenis' => $jenisModulFix,
        //         'deskripsi' => $request->deskripsi,
        //         'id_kelas_master' => $request->id_kelas_master,
        //     ]);

        if (auth()->user()->jenis != 'admin') {
            return redirect()->route('dataModul')->with(['success' => 'Modul Berhasil Diperbarui!']);
        } else {
            return redirect()->back()->with(['success' => 'Modul Berhasil Diperbarui!']);
        }
    }

    public function updateFile(Request $request, Modul $dataModul)
    {
        $this->validate($request, [
            'file' => 'required|mimes:doc,docx,pdf',
        ]);

        $fileModul = $request->file('file');
        $ukuranFile = $fileModul->getSize();

        $kode = $dataModul->id;
        $kodeKelas = $dataModul->id_kelas_master;
        $namaFile = $kode.'_file'.'.'.$request->file->extension();
        $destinationPath = 'repo/modul/'.$kodeKelas.'/'.$kode;

        if ($dataModul->file == null || $dataModul->file == '') {
            $request->file->move(public_path($destinationPath), $namaFile);
            $dataModul->update(['file' => $namaFile, 'ukuran_file' => $ukuranFile]);
        } else {
            // unlink('storage/modul/'.$kodeKelas.'/'.$kode.'/'.$dataModul->file);
            $request->file->move(public_path($destinationPath), $namaFile);
            $dataModul->update(['file' => $namaFile, 'ukuran_file' => $ukuranFile]);
        }

        return redirect()->route('dataModul')->with(['success' => 'File modul berhasil diperbarui!']);
    }

    public function destroy(Modul $dataModul)
    {
        $cekFile = file_exists('repo/modul/'.$dataModul->id_kelas_master.'/'.$dataModul->id.'/'.$dataModul->file);

        if ($dataModul->file == null && $cekFile == false) {
            $dataModul->delete();
            return redirect()->route('dataModul')->with(['success' => 'Data berhasil dihapus!']);

        } else if ($cekFile == true) {
            unlink('repo/modul/'.$dataModul->id_kelas_master.'/'.$dataModul->id.'/'.$dataModul->file);
            $dataModul->delete();
            return redirect()->route('dataModul')->with(['success' => 'Data berhasil dihapus!']);

        } else {
            $dataModul->delete();
            return redirect()->route('dataModul')->with(['success' => 'Data berhasil dihapus!']);
        }

        // } else if(unlink('storage/modul/'.$dataModul->id_kelas_master.'/'.$dataModul->id.'/'.$dataModul->file)) {
        //     // unlink('storage/modul/'.$dataModul->id_kelas_master.'/'.$dataModul->id);
        //     $dataModul->delete();
        //     return redirect()->route('dataModul')->with(['success' => 'Data berhasil dihapus!']);

        // } else{
        //     return redirect()->route('dataModul')->with(['error' => 'Gagal dihapus, file tidak ditemukan!']);
        // }
    }

    public function indexJenis()
    {
        $jenisModul = JenisModul::orderBy('judul', 'ASC')->get();
        return view('pages.admin.bank_data.modul.jenis.index', ['jenisModul' => $jenisModul]);
    }

    public function storeJenis(Request $request)
    {
        $this->validate($request, ['judul' => 'required']);

        JenisModul::create(['judul' => $request->judul]);

        return redirect()->route('jenisModul')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function showJenis(JenisModul $jenisModul)
    {
        return view('pages.admin.bank_data.modul.jenis.show', compact('jenisModul'));
    }

    public function updateJenis(Request $request, JenisModul $jenisModul)
    {
        $this->validate($request, ['judul' => 'required']);

        $jenisModul->update($request->all());

        return redirect()->route('jenisModul')->with(['success' => 'Data berhasil diperbarui']);
    }

    public function destroyJenis(JenisModul $jenisModul)
    {
        $jenisModul->delete();
        return redirect()->route('jenisModul')->with(['success' => 'Data berhasil dihapus!']);
    }

    // UPDATE GAMBAR
    // public function updateGambar(Request $request, Modul $dataModul)
    // {
    //     $this->validate($request, [
    //         'gambar' => 'required|image|mimes:jpeg,png,jpg,|max:2048'
    //     ]);

    //     $kode = $dataModul->id;
    //     $kodeKelas = $dataModul->id_kelas_master;
    //     $imgFotoName = $kode.'_img'.'.'.$request->gambar->extension();

    //     if ($dataModul->gambar == null || $dataModul->gambar == '') {
    //         $request->gambar->storeAs('modul/'.$kodeKelas.'/'.$kode, $imgFotoName, 'public');
    //         $dataModul->update(['gambar' => $imgFotoName]);
    //     } else {
    //         unlink('storage/modul/'.$kodeKelas.'/'.$dataModul->id.'/'.$dataModul->gambar);
    //         $request->gambar->storeAs('modul/'.$kodeKelas.'/'.$kode, $imgFotoName, 'public');
    //         $dataModul->update(['gambar' => $imgFotoName]);
    //     }

    //     return redirect()->route('dataModul')->with(['success' => 'Gambar modul berhasil diperbarui!']);
    // }

    // DESTROY GAMBAR DAN FILE
    // public function destroy(Modul $dataModul)
    // {
    //     if ($dataModul->gambar == null || $dataModul->gambar == '') {
    //         if ($dataModul->file == null || $dataModul->file == '') {
    //             $dataModul->delete();
    //             return redirect()->route('dataModul')->with(['success' => 'Data berhasil dihapus!']);
    //         } else {
    //             unlink('storage/modul/'.$kodeKelas.'/'.$dataModul->id.'/'.$dataModul->file);
    //             $dataModul->delete();
    //             return redirect()->route('dataModul')->with(['success' => 'Data berhasil dihapus!']);
    //         }
    //     } else {
    //         if(unlink('storage/modul/'.$kodeKelas.'/'.$dataModul->id.'/'.$dataModul->gambar)) {
    //             unlink('storage/modul/'.$kodeKelas.'/'.$dataModul->id.'/'.$dataModul->file);
    //             unlink('storage/modul/'.$kodeKelas.'/'.$dataModul->id);
    //             $dataModul->delete();
    //             return redirect()->route('dataModul')->with(['success' => 'Data berhasil dihapus!']);
    //         } else{
    //             return redirect()->route('dataModul')->with(['error' => 'Gagal dihapus, file tidak ditemukan!']);
    //         }
    //     }
    // }
}
