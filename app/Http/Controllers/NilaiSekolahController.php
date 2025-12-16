<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\NilaiSekolah;

class NilaiSekolahController extends Controller
{
    public function index()
    {
        $nilaiSekolah = NilaiSekolah::orderBy('id', 'ASC')->get();

        return view('pages.admin.landing.profil.nilaiSekolah.index',
        [
            'nilaiSekolah' => $nilaiSekolah,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'deskripsi' => 'nullable',
            'logo' => 'required|mimes:jpg,png,jpeg',
        ]);

        $nilaiSekolah = NilaiSekolah::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        if ($request->hasFile('logo')) {
            $kode = $nilaiSekolah->id;
            $namaFile = 'nilai' . $kode .  '.' . $request->logo->extension();
            $destinationPath = 'front/img/images/nilai/';
            $request->logo->move($destinationPath, $namaFile);

            DB::table('nilai_sekolahs')
                ->where('id', $kode)
                ->update(['logo' => $namaFile]);

            return redirect()->route('dataNilaiSekolah.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->back()->with(['error' => 'Gagal, file tidak dapat diupload!']);
        }
    }

    public function show($id)
    {
        $nilaiSekolah = NilaiSekolah::findOrFail($id);

        return view('pages.admin.landing.profil.nilaiSekolah.show',
            compact('nilaiSekolah')
        );
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required',
            'deskripsi' => 'nullable',
        ]);

        $nilaiSekolah = NilaiSekolah::findOrFail($id);

        DB::table('nilai_sekolahs')
            ->where('id', $id)
            ->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
            ]);

        return redirect()->route('dataNilaiSekolah.index')->with(['success' => 'Data berhasil diperbarui']);
    }

    public function updateLogo(Request $request, string $id)
    {
        $this->validate($request, [
            'logo' => 'required|image|mimes:jpeg,png,jpg,webp'
        ]);

        $nilaiSekolah = NilaiSekolah::findOrFail($id);

        $datime = date('Y-m-d_H-i-s');
        $namaFile = 'nilai' . $id . '_' . $datime. '.' . $request->logo->extension();
        $destinationPath = 'front/img/images/nilai/';
        $request->logo->move($destinationPath, $namaFile);

        $nilaiSekolah->update(['logo' => $namaFile]);
        return redirect()->route('dataNilaiSekolah.index')->with(['success' => 'Logo Nilai berhasil diperbarui!']);
    }

    // public function destroy(Modul $dataModul)
    // {
    //     $cekFile = file_exists('repo/modul/' . $dataModul->id_kelas_master . '/' . $dataModul->id . '/' . $dataModul->file);

    //     if ($dataModul->file == null && $cekFile == false) {
    //         $dataModul->delete();
    //         return redirect()->route('dataNilaiSekolah.index')->with(['success' => 'Data berhasil dihapus!']);
    //     } else if ($cekFile == true) {
    //         unlink('repo/modul/' . $dataModul->id_kelas_master . '/' . $dataModul->id . '/' . $dataModul->file);
    //         $dataModul->delete();
    //         return redirect()->route('dataNilaiSekolah.index')->with(['success' => 'Data berhasil dihapus!']);
    //     } else {
    //         $dataModul->delete();
    //         return redirect()->route('dataNilaiSekolah.index')->with(['success' => 'Data berhasil dihapus!']);
    //     }
    // }
}
