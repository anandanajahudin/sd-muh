<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Misi;
use App\Models\NilaiSekolah;
use App\Models\Profil;
use App\Models\ProfilKeunggulan;
use App\Models\Kurikulum;
use App\Models\KurikulumDetail;

class ProfilController extends Controller
{
    // PROFIL
    public function index()
    {
        $profil = Profil::all();
        $misi = Misi::all();
        $nilaiSekolah = NilaiSekolah::all();
        $keunggulan = ProfilKeunggulan::all();
        $kurikulum = Kurikulum::all();
        $daycare = Profil::where('id', 1)->first()->daycare;
        $daycare_img = Profil::where('id', 1)->first()->daycare_img;

        return view(
            'pages.admin.landing.profil.index',
            [
                'profil' => $profil,
                'misi' => $misi,
                'nilaiSekolah' => $nilaiSekolah,
                'keunggulan' => $keunggulan,
                'kurikulum' => $kurikulum,
                'daycare' => $daycare,
                'daycare_img' => $daycare_img,
            ]
        );
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'nullable',
            'keterangan' => 'nullable',
            'deskripsi' => 'nullable',
            'judul_visi' => 'nullable',
            'deskripsi_visi' => 'nullable',
            'alamat' => 'nullable',
            'operasional' => 'nullable',
            'email' => 'nullable',
            'telp' => 'nullable',
            'link_fb' => 'nullable',
            'link_ig' => 'nullable',
            'link_twitter' => 'nullable',
            'link_yutub' => 'nullable',
        ]);

        Profil::create([
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'deskripsi' => $request->deskripsi,
            'judul_visi' => $request->judul_visi,
            'deskripsi_visi' => $request->deskripsi_visi,
            'alamat' => $request->alamat,
            'operasional' => $request->operasional,
            'email' => $request->email,
            'telp' => $request->telp,
            'link_fb' => $request->link_fb,
            'link_ig' => $request->link_ig,
            'link_twitter' => $request->link_twitter,
            'link_yutub' => $request->link_yutub,
        ]);

        return redirect()->route('dataProfil')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(Profil $profil)
    {
        return view('pages.admin.landing.profil.show', compact('dataProfil'));
    }

    public function update(Request $request, Profil $profil)
    {
        $this->validate($request, [
            'judul' => 'nullable',
            'keterangan' => 'nullable',
            'deskripsi' => 'nullable',
            'judul_visi' => 'nullable',
            'deskripsi_visi' => 'nullable',
            'alamat' => 'nullable',
            'operasional' => 'nullable',
            'email' => 'nullable',
            'telp' => 'nullable',
            'link_fb' => 'nullable',
            'link_ig' => 'nullable',
            'link_twitter' => 'nullable',
            'link_yutub' => 'nullable',
        ]);

        $profil->update($request->all());

        return redirect()->route('dataProfil')->with(['success' => 'Data berhasil diperbarui']);
    }

    public function destroy(Profil $profil)
    {
        $profil->delete();
        return redirect()->route('dataProfil')->with(['success' => 'Data berhasil dihapus!']);
    }

    // PROFIL KEUNGGULAN
    public function indexKeunggulan()
    {
        $keunggulan = ProfilKeunggulan::all();
        return view('pages.admin.landing.profil.keunggulan.index', ['keunggulan' => $keunggulan]);
    }

    public function storeKeunggulan(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'keterangan' => 'required',
            'deskripsi' => 'required',
        ]);

        ProfilKeunggulan::create([
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('dataKeunggulan')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function showKeunggulan(ProfilKeunggulan $keunggulan)
    {
        return view('pages.admin.landing.profil.keunggulan.show', compact('keunggulan'));
    }

    public function updateKeunggulan(Request $request, ProfilKeunggulan $keunggulan)
    {
        $this->validate($request, [
            'judul' => 'required',
            'keterangan' => 'required',
            'deskripsi' => 'required'
        ]);

        $keunggulan->update($request->all());

        return redirect()->route('dataKeunggulan')->with(['success' => 'Data berhasil diperbarui']);
    }

    public function destroyKeunggulan(ProfilKeunggulan $keunggulan)
    {
        $keunggulan->delete();
        return redirect()->route('dataKeunggulan')->with(['success' => 'Data berhasil dihapus!']);
    }

    // MISI
    public function indexMisi()
    {
        $misi = Misi::all();
        return view('pages.admin.landing.misi.index', ['misi' => $misi]);
    }

    public function storeMisi(Request $request)
    {
        $this->validate($request, ['deskripsi' => 'required']);

        Misi::create(['deskripsi' => $request->deskripsi]);

        return redirect()->route('dataMisi')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function showMisi(Misi $misi)
    {
        return view('pages.admin.landing.misi.show', compact('misi'));
    }

    public function updateMisi(Request $request, Misi $misi)
    {
        $this->validate($request, ['deskripsi' => 'required']);
        $misi->update($request->all());

        return redirect()->route('dataMisi')->with(['success' => 'Data berhasil diperbarui']);
    }

    public function destroyMisi(Misi $misi)
    {
        $misi->delete();
        return redirect()->route('dataMisi')->with(['success' => 'Data berhasil dihapus!']);
    }

    // DAYCARE
    public function indexDaycare()
    {
        $daycare = Profil::where('id', 1)->get();
        return view('pages.admin.landing.daycare.index', ['daycare' => $daycare]);
    }

    public function updateDaycare(Request $request, string $id)
    {
        $this->validate($request, ['daycare' => 'required']);

        $daycare = Profil::findOrFail($id);
        $daycare->update([
            'daycare' => $request->daycare
        ]);

        return redirect()->route('dataDaycare')->with(['success' => 'Daycare berhasil diperbarui']);
    }

    public function updateDaycareGambar(Request $request, string $id)
    {
        $this->validate($request, [
            'file' => 'required|image|mimes:jpeg,png,jpg'
        ]);

        $daycare = Profil::findOrFail($id);

        $imgFotoName = 'daycare' . '.' . $request->file->extension();
        $destinationPath = 'repo/daycare';
        $request->file->move($destinationPath, $imgFotoName);

        $daycare->update(['daycare_img' => $imgFotoName]);
        return redirect()->route('dataDaycare')->with(['success' => 'Foto Daycare berhasil diperbarui!']);
    }

    public function updateBannerPrimary(Request $request, string $id)
    {
        $this->validate($request, [
            'file' => 'required|image|mimes:jpeg,png,jpg,webp'
        ]);

        $daycare = Profil::findOrFail($id);

        $imgFotoName = 'WebSlide1' . '.' . $request->file->extension();
        $destinationPath = 'repo/landing/slideshow/';
        $request->file->move($destinationPath, $imgFotoName);

        $daycare->update(['banner_primary' => $imgFotoName]);
        return redirect()->route('dataProfil')->with(['success' => 'Banner Pertama berhasil diperbarui!']);
    }

    public function updateBannerSecondary(Request $request, string $id)
    {
        $this->validate($request, [
            'file' => 'required|image|mimes:jpeg,png,jpg,webp'
        ]);

        $daycare = Profil::findOrFail($id);

        $imgFotoName = 'WebSlide2' . '.' . $request->file->extension();
        $destinationPath = 'repo/landing/slideshow/';
        $request->file->move($destinationPath, $imgFotoName);

        $daycare->update(['banner_secondary' => $imgFotoName]);
        return redirect()->route('dataProfil')->with(['success' => 'Banner Kedua berhasil diperbarui!']);
    }
}
