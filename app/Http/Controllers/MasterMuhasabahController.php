<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MasterMuhasabah;

class MasterMuhasabahController extends Controller
{
    public function index()
    {
        $master_muhasabah = MasterMuhasabah::all();
        return view('pages.admin.muhasabah.master.index', ['master_muhasabah' => $master_muhasabah]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'poin' => 'required|numeric',
        ]);

        MasterMuhasabah::create([
            'judul' => $request->judul,
            'poin' =>  $request->poin,
        ]);

        return redirect()->route('master_muhasabah')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(MasterMuhasabah $master_muhasabah)
    {
        return view('pages.admin.muhasabah.master.show', compact('master_muhasabah'));
    }

    public function update(Request $request, MasterMuhasabah $master_muhasabah)
    {
        $this->validate($request, [
            'judul' => 'required',
            'poin' => 'required|numeric',
        ]);

        $master_muhasabah->update($request->all());

        return redirect()->route('master_muhasabah')->with(['success' => 'Data berhasil diperbarui']);
    }

    public function destroy(MasterMuhasabah $master_muhasabah)
    {
        $master_muhasabah->delete();
        return redirect()->route('master_muhasabah')->with(['success' => 'Data berhasil dihapus!']);
    }
}