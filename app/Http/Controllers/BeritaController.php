<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Berita;
use App\Models\User;

class BeritaController extends Controller
{
    // AGENDA
    public function dataAgenda()
    {
        $agenda = Berita::with('userPost')->select("*")
                    ->where("jenis", 'agenda')
                    ->orderBy('created_at', 'DESC')
                    ->get();
        return view('pages.admin.berita.agenda.index', ['agenda' => $agenda]);
    }

    public function addAgenda()
    {
        return view('pages.admin.berita.agenda.create');
    }

    // BERITA
    public function dataBerita()
    {
        $berita = Berita::with('userPost')->select("*")
                    ->where("jenis", 'berita')
                    ->orderBy('created_at', 'DESC')
                    ->get();
        return view('pages.admin.berita.index', ['berita' => $berita]);
    }

    public function addBerita()
    {
        return view('pages.admin.berita.create');
    }

    // OPINI
    public function dataOpini()
    {
        $berita = Berita::with('userPost')->select("*")
                    ->where("jenis", 'opini')
                    ->orderBy('created_at', 'DESC')
                    ->get();
        return view('pages.admin.berita.opini.index', ['berita' => $berita]);
    }

    public function addOpini()
    {
        return view('pages.admin.berita.opini.create');
    }

    // TV
    public function dataTv()
    {
        $beritaTv = Berita::with('userPost')->select("*")
                    ->where("jenis", 'tv')
                    ->orderBy('created_at', 'DESC')
                    ->get();
        return view('pages.admin.berita.tv.index', ['beritaTv' => $beritaTv]);
    }

    public function addTv()
    {
        return view('pages.admin.berita.tv.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'jenis' => 'required',
            'link_vidio' => 'nullable',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,|max:2048',
            'keterangan_img' => 'required',
            'tgl_agenda' => 'nullable',
            'id_user' => 'required',
        ]);

        $berita = new Berita();
        $berita->judul          = $request->judul;
        $berita->jenis          = $request->jenis;
        $berita->link_vidio     = $request->link_vidio;
        $berita->deskripsi      = $request->deskripsi;
        $berita->gambar         = ''; // sementara
        $berita->keterangan_img = $request->keterangan_img;
        $berita->tgl_agenda     = $request->tgl_agenda;
        $berita->id_user        = $request->id_user;
        $berita->save();

        $kode = $berita->id;
        // $kode = Berita::latest()->first()->id;
        $imgFotoName = $kode.'.'.$request->gambar->extension();

        // DB::table('beritas')
        //     ->where('id', $kode)
        //     ->update(['gambar' => $imgFotoName]);

        $berita->update([
            'gambar' => $imgFotoName
        ]);

        if($request->jenis == 'agenda') {
            // $request->gambar->storeAs('berita/dataAgenda/'.$kode, $imgFotoName, 'public');
            $destinationPath = 'repo/berita/dataAgenda/'.$kode;
            $request->gambar->move($destinationPath, $imgFotoName);

            return redirect()->route('dataAgenda')->with(['success' => 'Data Berhasil Disimpan!']);

        } else if($request->jenis == 'berita') {
            // $request->gambar->storeAs('berita/dataBerita/'.$kode, $imgFotoName, 'public');
            $destinationPath = 'repo/berita/dataBerita/'.$kode;
            $request->gambar->move($destinationPath, $imgFotoName);

            return redirect()->route('dataBerita')->with(['success' => 'Data Berhasil Disimpan!']);

        } else if($request->jenis == 'opini') {
            // $request->gambar->storeAs('berita/dataOpini/'.$kode, $imgFotoName, 'public');
            $destinationPath = 'repo/berita/dataOpini/'.$kode;
            $request->gambar->move($destinationPath, $imgFotoName);

            return redirect()->route('dataOpini')->with(['success' => 'Data Berhasil Disimpan!']);

        } else {
            // $request->gambar->storeAs('berita/dataTv/'.$kode, $imgFotoName, 'public');
            $destinationPath = 'repo/berita/dataTv/'.$kode;
            $request->gambar->move($destinationPath, $imgFotoName);

            return redirect()->route('dataTv')->with(['success' => 'Data Berhasil Disimpan!']);
        }
    }

    public function show(Berita $berita)
    {
        return view('pages.admin.berita.show', compact('berita'));
    }

    public function showWithSlug($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        return view('pages.admin.berita.show', compact('berita'));
    }

    public function regenerateSlug(Berita $berita)
    {
        // Reset slug agar generateSlug() di model bekerja
        $berita->slug = null;
        $berita->save();

        return back()->with('success', 'Slug berhasil diregenerate');
    }

    public function update(Request $request, Berita $berita)
    {
        $this->validate($request, [
            'judul' => 'required',
            'deskripsi' => 'required',
            'jenis' => 'required',
            'link_vidio' => 'nullable',
            'tgl_agenda' => 'nullable'
        ]);

        // Cek apakah judul berubah
        $judulBerubah = $request->judul !== $berita->judul;

        // Update field biasa
        $berita->fill($request->all());

        if (empty($berita->slug) || $judulBerubah) {
            $berita->slug = null;
        }

        // Simpan (generateSlug() akan dipanggil di model)
        $berita->save();

        // $berita->update($request->all());

        if($request->jenis == 'agenda') {
            return redirect()->route('dataAgenda')->with(['success' => 'Data berhasil diperbarui']);

        } else if($request->jenis == 'berita') {
            return redirect()->route('dataBerita')->with(['success' => 'Data berhasil diperbarui']);

        } else if($request->jenis == 'opini') {
            return redirect()->route('dataOpini')->with(['success' => 'Data berhasil diperbarui']);

        } else {
            return redirect()->route('dataTv')->with(['success' => 'Data berhasil diperbarui']);
        }
    }

    public function updateGambar(Request $request, Berita $berita)
    {
        $this->validate($request, [
            'gambar' => 'required|image|mimes:jpeg,png,jpg,|max:2048',
            'keterangan_img' => 'required'
        ]);

        $kode = $berita->id;
        $imgFotoName = $kode.'.'.$request->gambar->extension();
        $keterangan = $request->keterangan_img;

        if($berita->jenis == 'agenda') {
            // unlink('storage/berita/dataAgenda/'.$berita->id.'/'.$berita->gambar);
            // $request->gambar->storeAs('berita/dataAgenda/'.$kode, $imgFotoName, 'public');

            unlink('repo/berita/dataAgenda/'.$berita->id.'/'.$berita->gambar);
            $destinationPath = 'repo/berita/dataAgenda/'.$kode;
            $request->gambar->move($destinationPath, $imgFotoName);

            $berita->update(['gambar' => $imgFotoName, 'keterangan_img' => $keterangan]);

            return redirect()->route('dataAgenda')->with(['success' => 'Gambar berita berhasil diperbarui!']);

        } else if($berita->jenis == 'berita') {
            // unlink('storage/berita/dataBerita/'.$berita->id.'/'.$berita->gambar);
            // $request->gambar->storeAs('berita/dataBerita/'.$kode, $imgFotoName, 'public');

            unlink('repo/berita/dataBerita/'.$berita->id.'/'.$berita->gambar);
            $destinationPath = 'repo/berita/dataBerita/'.$kode;
            $request->gambar->move($destinationPath, $imgFotoName);

            $berita->update(['gambar' => $imgFotoName, 'keterangan_img' => $keterangan]);

            return redirect()->route('dataBerita')->with(['success' => 'Gambar berita berhasil diperbarui!']);

        } else if($berita->jenis == 'opini') {
            // unlink('storage/berita/dataOpini/'.$berita->id.'/'.$berita->gambar);
            // $request->gambar->storeAs('berita/dataOpini/'.$kode, $imgFotoName, 'public');

            unlink('repo/berita/dataOpini/'.$berita->id.'/'.$berita->gambar);
            $destinationPath = 'repo/berita/dataOpini/'.$kode;
            $request->gambar->move($destinationPath, $imgFotoName);

            $berita->update(['gambar' => $imgFotoName, 'keterangan_img' => $keterangan]);

            return redirect()->route('dataOpini')->with(['success' => 'Gambar opini berhasil diperbarui!']);

        } else {
            // unlink('storage/berita/dataTv/'.$berita->id.'/'.$berita->gambar);
            // $request->gambar->storeAs('berita/dataTv/'.$kode, $imgFotoName, 'public');

            unlink('repo/berita/dataTv/'.$berita->id.'/'.$berita->gambar);
            $destinationPath = 'repo/berita/dataTv/'.$kode;
            $request->gambar->move($destinationPath, $imgFotoName);

            $berita->update(['gambar' => $imgFotoName, 'keterangan_img' => $keterangan]);

            return redirect()->route('dataTv')->with(['success' => 'Gambar berita berhasil diperbarui!']);
        }
    }

    public function destroy(Berita $berita)
    {
        if($berita->jenis == 'agenda') {
            $cekFile = file_exists('repo/berita/dataAgenda/'.$berita->id.'/'.$berita->gambar);

            if ($berita->gambar == null && $cekFile == false) {
                $berita->delete();
                return redirect()->route('dataAgenda')->with(['success' => 'Data berhasil dihapus!']);

            } else if ($cekFile == true) {
                unlink('repo/berita/dataAgenda/'.$berita->id.'/'.$berita->gambar);
                $berita->delete();
                return redirect()->route('dataAgenda')->with(['success' => 'Data berhasil dihapus!']);

            } else {
                $berita->delete();
                return redirect()->route('dataAgenda')->with(['success' => 'Data berhasil dihapus!']);

            // } else {
                // if(unlink('storage/berita/dataAgenda/'.$berita->id.'/'.$berita->gambar)) {
                //     unlink('storage/berita/dataAgenda/'.$berita->id);

                // if(unlink('repo/berita/dataAgenda/'.$berita->id.'/'.$berita->gambar)) {
                //     unlink('repo/berita/dataAgenda/'.$berita->id);
                //     $berita->delete();
                //     return redirect()->route('dataAgenda')->with(['success' => 'Data berhasil dihapus!']);
                // } else{
                //     return redirect()->route('dataAgenda')->with(['error' => 'Gagal dihapus, file tidak ditemukan!']);
                // }
            }

        } else if($berita->jenis == 'berita') {
            $cekFile = file_exists('repo/berita/dataBerita/'.$berita->id.'/'.$berita->gambar);

            if ($berita->gambar == null && $cekFile == false) {
                $berita->delete();
                return redirect()->route('dataBerita')->with(['success' => 'Data berhasil dihapus!']);

            } else if ($cekFile == true) {
                unlink('repo/berita/dataBerita/'.$berita->id.'/'.$berita->gambar);
                $berita->delete();
                return redirect()->route('dataBerita')->with(['success' => 'Data berhasil dihapus!']);

            } else {
                $berita->delete();
                return redirect()->route('dataBerita')->with(['success' => 'Data berhasil dihapus!']);

                // if(unlink('repo/berita/dataBerita/'.$berita->id.'/'.$berita->gambar)) {
                //     unlink('repo/berita/dataBerita/'.$berita->id);
                //     $berita->delete();
                //     return redirect()->route('dataBerita')->with(['success' => 'Data berhasil dihapus!']);
                // } else {
                    //     return redirect()->route('dataBerita')->with(['error' => 'Gagal dihapus, file tidak ditemukan!']);
                // }
            }

        } else if($berita->jenis == 'opini') {
            $cekFile = file_exists('repo/berita/dataOpini/'.$berita->id.'/'.$berita->gambar);

            if ($berita->gambar == null && $cekFile == false) {
                $berita->delete();
                return redirect()->route('dataOpini')->with(['success' => 'Data berhasil dihapus!']);

            } else if ($cekFile == true) {
                unlink('repo/berita/dataOpini/'.$berita->id.'/'.$berita->gambar);
                $berita->delete();
                return redirect()->route('dataOpini')->with(['success' => 'Data berhasil dihapus!']);

            } else {
                $berita->delete();
                return redirect()->route('dataOpini')->with(['success' => 'Data berhasil dihapus!']);

                // if(unlink('repo/berita/dataOpini/'.$berita->id.'/'.$berita->gambar)) {
                //     unlink('repo/berita/dataOpini/'.$berita->id);
                //     $berita->delete();
                //     return redirect()->route('dataOpini')->with(['success' => 'Data berhasil dihapus!']);
                // } else {
                    //     return redirect()->route('dataOpini')->with(['error' => 'Gagal dihapus, file tidak ditemukan!']);
                // }
            }

        } else {
            $cekFile = file_exists('repo/berita/dataTv/'.$berita->id.'/'.$berita->gambar);

            if ($berita->gambar == null && $cekFile == false) {
                $berita->delete();
                return redirect()->route('dataTv')->with(['success' => 'Data berhasil dihapus!']);

            } else if ($cekFile == true) {
                unlink('repo/berita/dataTv/'.$berita->id.'/'.$berita->gambar);
                $berita->delete();
                return redirect()->route('dataTv')->with(['success' => 'Data berhasil dihapus!']);

            } else {
                $berita->delete();
                return redirect()->route('dataTv')->with(['success' => 'Data berhasil dihapus!']);

            // } else {
                // if(unlink('storage/berita/dataTv/'.$berita->id.'/'.$berita->gambar)) {
                //     unlink('storage/berita/dataTv/'.$berita->id);
                // if(unlink('repo/berita/dataTv/'.$berita->id.'/'.$berita->gambar)) {
                //     unlink('repo/berita/dataTv/'.$berita->id);
                //     $berita->delete();
                //     return redirect()->route('dataTv')->with(['success' => 'Data berhasil dihapus!']);
                // } else {
                //     return redirect()->route('dataTv')->with(['error' => 'Gagal dihapus, file tidak ditemukan!']);
                // }
            }
        }
    }
}
