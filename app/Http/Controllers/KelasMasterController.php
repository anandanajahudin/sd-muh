<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\KelasMaster;

class KelasMasterController extends Controller
{
    public function index()
    {
        $kelasMaster = KelasMaster::orderBy('kelas', 'ASC')->get();
        return view('pages.admin.bank_data.kelas.master.index', ['kelasMaster' => $kelasMaster]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'jenis' => 'required',
            'kelas' => 'required|numeric',
            'biaya_daful' => 'nullable|numeric',
            'spp' => 'nullable|numeric',
            'keterangan' => 'nullable',
            'deskripsi' => 'nullable',
        ]);

        KelasMaster::create([
            'judul' => $request->judul,
            'jenis' => $request->jenis,
            'kelas' => $request->kelas,
            'biaya_daful' => $request->biaya_daful,
            'spp' => $request->spp,
            'keterangan' => $request->keterangan,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('kelasMaster')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(KelasMaster $kelasMaster)
    {
        return view('pages.admin.bank_data.kelas.master.show', compact('kelasMaster'));
    }

    public function update(Request $request, KelasMaster $kelasMaster)
    {
        $this->validate($request, [
            'judul' => 'required',
            'jenis' => 'required',
            'biaya_daful' => 'nullable|numeric',
            'spp' => 'nullable|numeric',
            'keterangan' => 'nullable',
            'deskripsi' => 'nullable',
        ]);

        $kelasMaster->update($request->all());

        return redirect()->route('kelasMaster')->with(['success' => 'Data berhasil diperbarui']);
    }

    public function destroy(KelasMaster $kelasMaster)
    {
        $kelasMaster->delete();
        return redirect()->route('kelasMaster')->with(['success' => 'Data berhasil dihapus!']);
    }
}