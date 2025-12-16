<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SdMutasi;

class SdMutasiController extends Controller
{
    public function index()
    {
        $sdMutasi = SdMutasi::orderBy('nama', 'ASC')->get();
        return view('pages.admin.master_data.sdMutasi.index', ['sdMutasi' => $sdMutasi]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'kota' => 'required',
        ]);

        SdMutasi::create([
            'nama' => $request->nama,
            'kota' => $request->kota,
        ]);

        return redirect()->route('sdMutasi')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(SdMutasi $sdMutasi)
    {
        return view('pages.admin.master_data.sdMutasi.show', compact('sdMutasi'));
    }

    public function update(Request $request, SdMutasi $sdMutasi)
    {
        $this->validate($request, [
            'nama' => 'required',
            'kota' => 'required',
        ]);

        $sdMutasi->update($request->all());

        return redirect()->route('sdMutasi')->with(['success' => 'Data berhasil diperbarui']);
    }

    public function destroy(SdMutasi $sdMutasi)
    {
        $sdMutasi->delete();
        return redirect()->route('sdMutasi')->with(['success' => 'Data berhasil dihapus!']);
    }
}