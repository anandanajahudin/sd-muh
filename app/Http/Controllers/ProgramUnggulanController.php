<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\ProgramUnggulan;
use App\Models\ProgramUnggulanDetail;

class ProgramUnggulanController extends Controller
{
    public function index()
    {
        $programUnggulan = ProgramUnggulan::orderBy('judul', 'ASC')->get();

        return view('pages.admin.master_data.programUnggulan.index',
            ['programUnggulan' => $programUnggulan]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'deskripsi' => 'nullable',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,|max:2048',
        ]);

        ProgramUnggulan::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        if($request->hasFile('file')) {
            $kode = ProgramUnggulan::latest()->first()->id;

            $namaFile = $kode.'_logo'.'.'.$request->file->extension();
            $destinationPath = 'repo/programUnggulan/'.$kode;
            $request->file->move($destinationPath, $namaFile);

            DB::table('program_unggulans')
                ->where('id', $kode)
                ->update(['logo' => $namaFile]);
        }

        return redirect()->route('dataProgramUnggulan')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(ProgramUnggulan $dataProgramUnggulan)
    {
        return view('pages.admin.master_data.programUnggulan.show', compact('dataProgramUnggulan'));
    }

    public function update(Request $request, ProgramUnggulan $dataProgramUnggulan)
    {
        $this->validate($request, [
            'judul' => 'required',
            'deskripsi' => 'nullable',
        ]);

        $dataProgramUnggulan->update($request->all());
        return redirect()->route('dataProgramUnggulan')->with(['success' => 'Data berhasil diperbarui']);
    }

    public function updateFile(Request $request, ProgramUnggulan $dataProgramUnggulan)
    {
        $this->validate($request, [
            'file' => 'required|image|mimes:jpeg,png,jpg,|max:2048',
        ]);

        $fileLogo = $request->file('file');

        $kode = $dataProgramUnggulan->id;
        $namaFile = $kode.'_logo'.'.'.$request->file->extension();
        $destinationPath = 'repo/programUnggulan/'.$kode;

        if ($dataProgramUnggulan->logo == null || $dataProgramUnggulan->logo == '') {
            $request->file->move($destinationPath, $namaFile);
            $dataProgramUnggulan->update(['logo' => $namaFile]);
        } else {
            $request->file->move($destinationPath, $namaFile);
            $dataProgramUnggulan->update(['logo' => $namaFile]);
        }

        return redirect()->route('dataProgramUnggulan')->with(['success' => 'Logo berhasil diperbarui!']);
    }

    public function destroy(ProgramUnggulan $dataProgramUnggulan)
    {
        $cekFile = file_exists('repo/programUnggulan/'.$dataProgramUnggulan->id.'/'.$dataProgramUnggulan->logo);

        if ($dataProgramUnggulan->file == null && $cekFile == false) {
            $dataProgramUnggulan->delete();
            return redirect()->route('dataProgramUnggulan')->with(['success' => 'Data berhasil dihapus!']);

        } else if ($cekFile == true) {
            unlink('repo/programUnggulan/'.$dataProgramUnggulan->id.'/'.$dataProgramUnggulan->logo);
            $dataProgramUnggulan->delete();
            return redirect()->route('dataProgramUnggulan')->with(['success' => 'Data berhasil dihapus!']);

        } else {
            $dataProgramUnggulan->delete();
            return redirect()->route('dataProgramUnggulan')->with(['success' => 'Data berhasil dihapus!']);
        }
    }

    // ===================
    // DETAIL PROGRAM UNGGULAN
    // ===================
    public function detailProgramUnggulan($id_program_unggulan)
    {
        $dataProgramUnggulan = ProgramUnggulan::orderBy('judul', 'ASC')->get();
        $detailProgramUnggulan = ProgramUnggulanDetail::with('programUnggulan')
            ->where('id_program_unggulan', '=', $id_program_unggulan)->orderBy('judul', 'ASC')->get();
        $programUnggulan = ProgramUnggulan::where('id', $id_program_unggulan)->first()->judul;

        return view('pages.admin.master_data.programUnggulan.detail',
        [
            'dataProgramUnggulan' => $dataProgramUnggulan,
            'detailProgramUnggulan' => $detailProgramUnggulan,
            'id_program_unggulan' => $id_program_unggulan,
            'programUnggulan' => $programUnggulan,
        ]);
    }

    public function indexDetailProgramUnggulan()
    {
        $dataProgramUnggulan = ProgramUnggulan::orderBy('judul', 'ASC')->get();
        $detailProgramUnggulan = ProgramUnggulanDetail::with('programUnggulan')->orderBy('judul', 'ASC')->get();

        return view('pages.admin.master_data.programUnggulan.detail.index',
        [
            'dataProgramUnggulan' => $dataProgramUnggulan,
            'detailProgramUnggulan' => $detailProgramUnggulan
        ]);
    }

    public function storeDetailProgramUnggulan(Request $request)
    {
        $this->validate($request, [
            'id_program_unggulan' => 'required',
            'judul' => 'required',
            'jenis' => 'required',
            'deskripsi' => 'nullable',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,|max:2048',
        ]);

        ProgramUnggulanDetail::create([
            'id_program_unggulan' => $request->id_program_unggulan,
            'judul' => $request->judul,
            'jenis' => $request->jenis,
            'deskripsi' => $request->deskripsi,
        ]);

        if($request->hasFile('file')) {
            $fileProgramUnggulan = $request->file('file');
            $kode = ProgramUnggulanDetail::latest()->first()->id;
            $idProgramUnggulan = ProgramUnggulanDetail::where('id', $kode)->first()->id_program_unggulan;
            $jenisProgramUnggulan = ProgramUnggulanDetail::where('id', $kode)->first()->jenis;

            $namaFile = $jenisProgramUnggulan.'_'.$kode.'.'.$request->file->extension();
            $destinationPath = 'repo/programUnggulan/'.$idProgramUnggulan;
            $request->file->move($destinationPath, $namaFile);

            DB::table('program_unggulan_details')
                ->where('id', $kode)
                ->update(['foto' => $namaFile]);
        }

        return redirect()->route('detailProgramUnggulan')->with(['success' => 'Data berhasil Disimpan!']);
    }

    public function showDetailProgramUnggulan(ProgramUnggulanDetail $detailProgramUnggulan)
    {
        return view('pages.admin.master_data.programUnggulan.detail.show', compact('detailProgramUnggulan'));
    }

    public function updateDetailProgramUnggulan(Request $request, ProgramUnggulanDetail $detailProgramUnggulan)
    {
        $this->validate($request, [
            'judul' => 'required',
            'jenis' => 'required',
            'deskripsi' => 'nullable',
        ]);

        $detailProgramUnggulan->update($request->all());
        return redirect()->route('detailProgramUnggulan')->with(['success' => 'Data berhasil diperbarui']);
    }

    public function updateFileDetailProgramUnggulan(Request $request, ProgramUnggulanDetail $detailProgramUnggulan)
    {
        $this->validate($request, [
            'file' => 'required|image|mimes:jpeg,png,jpg,|max:2048',
        ]);

        $fileFoto = $request->file('file');
        $jenisProgramUnggulan = ProgramUnggulanDetail::where('id', $detailProgramUnggulan->id)->first()->jenis;

        $kode = $detailProgramUnggulan->id_program_unggulan;
        $namaFile = $jenisProgramUnggulan.'_'.$kode.'.'.$request->file->extension();
        $destinationPath = 'repo/programUnggulan/'.$kode;

        if ($detailProgramUnggulan->foto == null || $detailProgramUnggulan->foto == '') {
            $request->file->move($destinationPath, $namaFile);
            $detailProgramUnggulan->update(['foto' => $namaFile]);
        } else {
            $request->file->move($destinationPath, $namaFile);
            $detailProgramUnggulan->update(['foto' => $namaFile]);
        }

        return redirect()->route('detailProgramUnggulan')->with(['success' => 'Foto berhasil diperbarui!']);
    }

    public function destroyDetailProgramUnggulan(ProgramUnggulanDetail $detailProgramUnggulan)
    {
        $cekFile = file_exists('repo/programUnggulan/'.$detailProgramUnggulan->id.'/'.$detailProgramUnggulan->foto);

        if ($detailProgramUnggulan->foto == null && $cekFile == false) {
            $detailProgramUnggulan->delete();
            return redirect()->route('detailProgramUnggulan')->with(['success' => 'Data berhasil dihapus!']);

        } else if ($cekFile == true) {
            unlink('repo/programUnggulan/'.$detailProgramUnggulan->id.'/'.$detailProgramUnggulan->foto);
            $detailProgramUnggulan->delete();
            return redirect()->route('detailProgramUnggulan')->with(['success' => 'Data berhasil dihapus!']);

        } else {
            $detailProgramUnggulan->delete();
            return redirect()->route('detailProgramUnggulan')->with(['success' => 'Data berhasil dihapus!']);
        }
    }

}
