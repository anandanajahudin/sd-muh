<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Ekskul;
use App\Models\EkskulDetail;
use App\Models\JenisEkskul;

class EkskulController extends Controller
{
    public function index()
    {
        $jenis = JenisEkskul::orderBy('judul', 'ASC')->get();
        $ekskul = Ekskul::orderBy('judul', 'ASC')->get();

        return view('pages.admin.master_data.ekskul.index',
        [
            'ekskul' => $ekskul,
            'jenis' => $jenis,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'id_jenis_ekskul' => 'required',
            'deskripsi' => 'nullable',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,|max:2048',
        ]);

        Ekskul::create([
            'judul' => $request->judul,
            'id_jenis_ekskul' => $request->id_jenis_ekskul,
            'deskripsi' => $request->deskripsi,
        ]);

        if($request->hasFile('file')) {
            $fileEkskul = $request->file('file');
            $kode = Ekskul::latest()->first()->id;

            $namaFile = $kode.'_logo'.'.'.$request->file->extension();
            $destinationPath = 'repo/ekskul/'.$kode;
            $request->file->move($destinationPath, $namaFile);

            DB::table('ekskuls')
                ->where('id', $kode)
                ->update(['logo' => $namaFile]);
        }

        return redirect()->route('dataEkskul')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(Ekskul $dataEkskul)
    {
        $jenis = JenisEkskul::orderBy('judul', 'ASC')->get();
        return view('pages.admin.master_data.ekskul.show', compact('dataEkskul', 'jenis'));
    }

    public function update(Request $request, Ekskul $dataEkskul)
    {
        $this->validate($request, [
            'judul' => 'required',
            'id_jenis_ekskul' => 'required',
            'deskripsi' => 'nullable',
        ]);

        $dataEkskul->update($request->all());
        return redirect()->route('dataEkskul')->with(['success' => 'Data berhasil diperbarui']);
    }

    public function updateFile(Request $request, Ekskul $dataEkskul)
    {
        $this->validate($request, [
            'file' => 'required|image|mimes:jpeg,png,jpg,|max:2048',
        ]);

        $fileLogo = $request->file('file');

        $kode = $dataEkskul->id;
        $namaFile = $kode.'_logo'.'.'.$request->file->extension();
        $destinationPath = 'repo/ekskul/'.$kode;

        if ($dataEkskul->logo == null || $dataEkskul->logo == '') {
            $request->file->move($destinationPath, $namaFile);
            $dataEkskul->update(['logo' => $namaFile]);
        } else {
            $request->file->move($destinationPath, $namaFile);
            $dataEkskul->update(['logo' => $namaFile]);
        }

        return redirect()->route('dataEkskul')->with(['success' => 'Logo berhasil diperbarui!']);
    }

    public function destroy(Ekskul $dataEkskul)
    {
        $cekFile = file_exists('repo/ekskul/'.$dataEkskul->id.'/'.$dataEkskul->logo);

        if ($dataEkskul->file == null && $cekFile == false) {
            $dataEkskul->delete();
            return redirect()->route('dataEkskul')->with(['success' => 'Data berhasil dihapus!']);

        } else if ($cekFile == true) {
            unlink('repo/ekskul/'.$dataEkskul->id.'/'.$dataEkskul->logo);
            $dataEkskul->delete();
            return redirect()->route('dataEkskul')->with(['success' => 'Data berhasil dihapus!']);

        } else {
            $dataEkskul->delete();
            return redirect()->route('dataEkskul')->with(['success' => 'Data berhasil dihapus!']);
        }
    }

    // ===================
    // DETAIL EKSKUL
    // ===================
    public function detailEkskul($id_ekskul)
    {
        $dataEkskul = Ekskul::orderBy('judul', 'ASC')->get();
        $detailEkskul = EkskulDetail::with('ekskul')
            ->where('id_ekskul', '=', $id_ekskul)->orderBy('judul', 'ASC')->get();
        $ekskul = Ekskul::where('id', $id_ekskul)->first()->judul;

        return view('pages.admin.master_data.ekskul.detail',
        [
            'dataEkskul' => $dataEkskul,
            'detailEkskul' => $detailEkskul,
            'id_ekskul' => $id_ekskul,
            'ekskul' => $ekskul,
        ]);
    }

    public function indexDetailEkskul()
    {
        $dataEkskul = Ekskul::orderBy('judul', 'ASC')->get();
        $detailEkskul = EkskulDetail::with('ekskul')->orderBy('judul', 'ASC')->get();

        return view('pages.admin.master_data.ekskul.detail.index',
        [
            'dataEkskul' => $dataEkskul,
            'detailEkskul' => $detailEkskul
        ]);
    }

    public function storeDetailEkskul(Request $request)
    {
        $this->validate($request, [
            'id_ekskul' => 'required',
            'judul' => 'required',
            'jenis' => 'required',
            'deskripsi' => 'nullable',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,|max:2048',
        ]);

        EkskulDetail::create([
            'id_ekskul' => $request->id_ekskul,
            'judul' => $request->judul,
            'jenis' => $request->jenis,
            'deskripsi' => $request->deskripsi,
        ]);

        if($request->hasFile('file')) {
            $fileEkskul = $request->file('file');
            $kode = EkskulDetail::latest()->first()->id;
            $idEkskul = EkskulDetail::where('id', $kode)->first()->id_ekskul;
            $jenisEkskul = EkskulDetail::where('id', $kode)->first()->jenis;

            $namaFile = $jenisEkskul.'_'.$kode.'.'.$request->file->extension();
            $destinationPath = 'repo/ekskul/'.$idEkskul;
            $request->file->move($destinationPath, $namaFile);

            DB::table('ekskul_details')
                ->where('id', $kode)
                ->update(['foto' => $namaFile]);
        }

        return redirect()->route('detailEkskul')->with(['success' => 'Data berhasil Disimpan!']);
    }

    public function showDetailEkskul(EkskulDetail $detailEkskul)
    {
        return view('pages.admin.master_data.ekskul.detail.show', compact('detailEkskul'));
    }

    public function updateDetailEkskul(Request $request, EkskulDetail $detailEkskul)
    {
        $this->validate($request, [
            'judul' => 'required',
            'jenis' => 'required',
            'deskripsi' => 'nullable',
        ]);

        $detailEkskul->update($request->all());
        return redirect()->route('detailEkskul')->with(['success' => 'Data berhasil diperbarui']);
    }

    public function updateFileDetailEkskul(Request $request, EkskulDetail $detailEkskul)
    {
        $this->validate($request, [
            'file' => 'required|image|mimes:jpeg,png,jpg,|max:2048',
        ]);

        $fileFoto = $request->file('file');
        $jenisEkskul = EkskulDetail::where('id', $detailEkskul->id)->first()->jenis;

        $kode = $detailEkskul->id_ekskul;
        $namaFile = $jenisEkskul.'_'.$kode.'.'.$request->file->extension();
        $destinationPath = 'repo/ekskul/'.$kode;

        if ($detailEkskul->foto == null || $detailEkskul->foto == '') {
            $request->file->move($destinationPath, $namaFile);
            $detailEkskul->update(['foto' => $namaFile]);
        } else {
            $request->file->move($destinationPath, $namaFile);
            $detailEkskul->update(['foto' => $namaFile]);
        }

        return redirect()->route('detailEkskul')->with(['success' => 'Foto berhasil diperbarui!']);
    }

    public function destroyDetailEkskul(EkskulDetail $detailEkskul)
    {
        $cekFile = file_exists('repo/ekskul/'.$detailEkskul->id.'/'.$detailEkskul->foto);

        if ($detailEkskul->foto == null && $cekFile == false) {
            $detailEkskul->delete();
            return redirect()->route('detailEkskul')->with(['success' => 'Data berhasil dihapus!']);

        } else if ($cekFile == true) {
            unlink('repo/ekskul/'.$detailEkskul->id.'/'.$detailEkskul->foto);
            $detailEkskul->delete();
            return redirect()->route('detailEkskul')->with(['success' => 'Data berhasil dihapus!']);

        } else {
            $detailEkskul->delete();
            return redirect()->route('detailEkskul')->with(['success' => 'Data berhasil dihapus!']);
        }
    }
}
