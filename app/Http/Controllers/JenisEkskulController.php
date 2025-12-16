<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\JenisEkskul;

class JenisEkskulController extends Controller
{
    public function index()
    {
        $jenisEkskul = JenisEkskul::orderBy('judul', 'ASC')->get();

        return view('pages.admin.master_data.jenis_ekskul.index', ['jenisEkskul' => $jenisEkskul]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required|max:30',
        ]);

        JenisEkskul::create([
            'judul' => $request->judul,
        ]);

        return redirect()->route('jenisEkskul.dashboard.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(int $id)
    {
        $jenis = JenisEkskul::findOrFail($id);
        return view('pages.admin.master_data.jenis_ekskul.show', compact('jenis'));
    }

    public function update(Request $request, int $id)
    {
        $this->validate($request, [
            'judul' => 'required|max:30',
        ]);

        $jenis = JenisEkskul::findOrFail($id);
        $jenis->update($request->all());

        return redirect()->route('jenisEkskul.dashboard.index')->with(['success' => 'Data berhasil diperbarui']);
    }

    public function destroy(int $id)
    {
        $jenis = JenisEkskul::findOrFail($id);
        $jenis->delete();
        return redirect()->route('jenisEkskul.dashboard.index')->with(['success' => 'Data berhasil dihapus!']);
    }

}
