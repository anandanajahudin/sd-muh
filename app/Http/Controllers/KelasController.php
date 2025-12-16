<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kelas;
use App\Models\KelasMaster;

class KelasController extends Controller
{
    public function index()
    {
        $kelasMaster = KelasMaster::orderBy('kelas', 'ASC')->get();
        $kelas = Kelas::with('tipeKelas')->orderBy('nama_kelas', 'ASC')->get();

        return view('pages.admin.bank_data.kelas.index',
        [
            'kelasMaster' => $kelasMaster,
            'kelas' => $kelas,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_kelas' => 'required',
            'keterangan' => 'required',
            'id_kelas_master' => 'required'
        ]);

        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'keterangan' => $request->keterangan,
            'id_kelas_master' => $request->id_kelas_master,
        ]);

        return redirect()->route('kelas')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(Kelas $kelas)
    {
        $kelasMaster = KelasMaster::all();

        return view('pages.admin.bank_data.kelas.show',
            ['kelasMaster' => $kelasMaster], compact('kelas'));
    }

    public function update(Request $request, Kelas $kelas)
    {
        $this->validate($request, [
            'nama_kelas' => 'required',
            'keterangan' => 'required',
            'id_kelas_master' => 'required'
        ]);

        $kelas->update($request->all());

        return redirect()->route('kelas')->with(['success' => 'Data berhasil diperbarui']);
    }

    public function destroy(Kelas $kelas)
    {
        $kelas->delete();
        return redirect()->route('kelas')->with(['success' => 'Data berhasil dihapus!']);
    }

    // public function trash()
    // {
    //     $kelas = Kelas::onlyTrashed()->get();
    // 	return view('pages.admin.bank_data.kelas.trash', ['kelas' => $kelas]);
    // }

    // public function pulihkan($id)
    // {
    //     $kelas = Kelas::onlyTrashed()->where('id', $id);
    //     $kelas->restore();
    //     return redirect()->route('kelas')->with(['success' => 'Data berhasil dipulihkan!']);
    // }

    // public function pulihkanSemua()
    // {
    //     $kelas = Kelas::onlyTrashed();
    //     $kelas->restore();
    //     return redirect()->route('kelas')->with(['success' => 'Semua data berhasil dipulihkan!']);
    // }

    // public function hapusPermanen($id)
    // {
    //     $kelas = Kelas::onlyTrashed()->where('id',$id);
    // 	$kelas->forceDelete();
    //     return redirect()->route('kelas')->with(['success' => 'Data berhasil dihapus permanen!']);
    // }

    // public function hapusPermanenSemua()
    // {
    //     $kelas = Kelas::onlyTrashed();
    // 	$kelas->forceDelete();
    //     return redirect()->route('kelas')->with(['success' => 'Semua data berhasil dihapus permanen!']);
    // }
}