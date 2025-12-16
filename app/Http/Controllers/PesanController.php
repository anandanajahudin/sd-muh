<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pesan;

class PesanController extends Controller
{
    public function index()
    {
        $pesan = Pesan::all();
        return view('pages.admin.landing.pesan.index', ['pesan' => $pesan]);
    }

    public function store(Request $request)
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

        return redirect()->route('dataPesan')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(Pesan $pesan)
    {
        return view('pages.admin.landing.pesan.show', compact('pesan'));
    }

    public function update(Request $request, Pesan $pesan)
    {
        $this->validate($request, [
            'nama' => 'required',
            'telp' => 'required',
            'email' => 'nullable|email:dns',
            'pesan' => 'required',
        ]);

        $pesan->update($request->all());

        return redirect()->route('dataPesan')->with(['success' => 'Data berhasil diperbarui']);
    }

    public function destroy(Pesan $pesan)
    {
        $pesan->delete();
        return redirect()->route('dataPesan')->with(['success' => 'Data berhasil dihapus!']);
    }
}