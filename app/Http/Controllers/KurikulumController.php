<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kurikulum;
use App\Models\KurikulumDetail;

class KurikulumController extends Controller
{
    // KURIKULUM
    public function index()
    {
        $kurikulum = Kurikulum::all();
        return view('pages.admin.landing.kurikulum.index', ['kurikulum' => $kurikulum]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'deskripsi' => 'nullable',
        ]);

        Kurikulum::create([
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('dataKurikulum')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(Kurikulum $kurikulum)
    {
        // $detailKurikulum = KurikulumDetail::select('kurikulum_details.*')
        //     ->where('kurikulum_details.id_kurikulum', '=', $kurikulum->id)
        //     ->get();

        return view('pages.admin.landing.kurikulum.show',
            // ['detailKurikulum' => $detailKurikulum],
            compact('kurikulum'));
    }

    public function update(Request $request, Kurikulum $kurikulum)
    {
        $this->validate($request, [
            'judul' => 'required',
            'deskripsi' => 'nullable'
        ]);

        $kurikulum->update($request->all());

        return redirect()->route('dataKurikulum')->with(['success' => 'Data berhasil diperbarui']);
    }

    public function destroy(Kurikulum $kurikulum)
    {
        $kurikulum->delete();
        return redirect()->route('dataKurikulum')->with(['success' => 'Data berhasil dihapus!']);
    }

    public function indexDetailKurikulum()
    {
        $kurikulum = Kurikulum::all();
        $detailKurikulum = KurikulumDetail::with('masterKurikulum')
            ->orderBy('id_kurikulum','ASC')->get();

        return view('pages.admin.landing.kurikulum.detail.index',
        [
            'kurikulum' => $kurikulum,
            'detailKurikulum' => $detailKurikulum
        ]);
    }

    public function storeDetailKurikulum(Request $request)
    {
        $this->validate($request, [
            'id_kurikulum' => 'required',
            'judul' => 'required',
            'deskripsi' => 'nullable',
        ]);

        KurikulumDetail::create([
            'id_kurikulum' => $request->id_kurikulum,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('dataDetailKurikulum')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function showDetailKurikulum(KurikulumDetail $detailKurikulum)
    {
        $kurikulum = Kurikulum::all();
        // $detailKurikulum = KurikulumDetail::with('masterKurikulum')->get();

        return view('pages.admin.landing.kurikulum.detail.show',
            ['kurikulum' => $kurikulum],
            compact('detailKurikulum')
        );
    }

    public function updateDetailKurikulum(Request $request, KurikulumDetail $detailKurikulum)
    {
        $this->validate($request, [
            'id_kurikulum' => 'required',
            'judul' => 'required',
            'deskripsi' => 'nullable'
        ]);

        $detailKurikulum->update($request->all());

        return redirect()->route('dataDetailKurikulum')->with(['success' => 'Data berhasil diperbarui']);
    }

    public function destroyDetailKurikulum(KurikulumDetail $detailKurikulum)
    {
        $detailKurikulum->delete();
        return redirect()->route('dataDetailKurikulum')->with(['success' => 'Data berhasil dihapus!']);
    }
}
