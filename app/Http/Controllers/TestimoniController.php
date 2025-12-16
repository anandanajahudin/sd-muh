<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pekerjaan;
use App\Models\Testimoni;

class TestimoniController extends Controller
{
    public function index()
    {
        $listPekerjaan = Pekerjaan::orderBy('judul', 'ASC')->get();
        $testimoni = Testimoni::all();

        return view('pages.admin.landing.testimoni.index',
        [
            'testimoni' => $testimoni,
            'listPekerjaan' => $listPekerjaan
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'id_pekerjaan' => 'required',
            'nilai' => 'required',
            'testimoni' => 'required',
            'file' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'link' => 'nullable',
        ]);

        Testimoni::create([
            'nama' => $request->nama,
            'id_pekerjaan' => $request->id_pekerjaan,
            'nilai' => $request->nilai,
            'testimoni' => $request->testimoni,
            'link' => $request->link,
        ]);

        if($request->hasFile('file')) {
            $kode = Testimoni::latest()->first()->id;
            $namaFile = 'testimoni_'.$kode.'.'.$request->file->extension();
            $destinationPath = 'repo/testimoni/';
            $request->file->move($destinationPath, $namaFile);

            DB::table('testimonis')
                ->where('id', $kode)
                ->update(['foto' => $namaFile]);
        }

        return redirect()->route('dataTestimoni')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(Testimoni $testimoni)
    {
        $listPekerjaan = Pekerjaan::orderBy('judul', 'ASC')->get();

        return view('pages.admin.landing.testimoni.show',
            ['listPekerjaan' => $listPekerjaan], compact('testimoni')
        );
    }

    public function updateGambar(Request $request, Testimoni $testimoni)
    {
        $this->validate($request, [
            'file' => 'required|image|mimes:jpeg,png,jpg,|max:2048'
        ]);

        $kode = $testimoni->id;
        $imgFotoName = 'testimoni_'.$kode.'.'.$request->file->extension();
        // $fotolama = Testimoni::where('id', $kode)->first()->foto;

        $destinationPath = 'repo/testimoni';
        $request->file->move($destinationPath, $imgFotoName);

        $testimoni->update(['foto' => $imgFotoName]);
        return redirect()->route('dataTestimoni')->with(['success' => 'Foto berhasil diperbarui!']);
    }

    public function update(Request $request, Testimoni $testimoni)
    {
        $this->validate($request, [
            'nama' => 'required',
            'id_pekerjaan' => 'required',
            'nilai' => 'required',
            'testimoni' => 'required',
            'link' => 'nullable',
        ]);

        $testimoni->update($request->all());

        return redirect()->route('dataTestimoni')->with(['success' => 'Data berhasil diperbarui']);
    }

    public function destroy(Testimoni $testimoni)
    {
        $testimoni->delete();
        return redirect()->route('dataTestimoni')->with(['success' => 'Data berhasil dihapus!']);
    }
}