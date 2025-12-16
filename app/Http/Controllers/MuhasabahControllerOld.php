<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kelas;
use App\Models\KelasSiswa;
use App\Models\Siswa;
use App\Models\Pegawai;
use App\Models\MasterMuhasabah;
use App\Models\Muhasabah;
use App\Models\Muhasabahku;
use App\Models\MuhasabahkuDetail;
use App\Models\User;

class MuhasabahControllerOld extends Controller
{
    public function index()
    {
        $masterMuhasabah = MasterMuhasabah::all();
        $jumlahMasterMuhasabah = $masterMuhasabah->count();

        $muhasabahku = User::select('users.*')
            ->join('muhasabahkus', 'muhasabahkus.id_user', '=', 'users.id')
            ->where('users.id', '=', auth()->user()->id)
            ->get();
        $jumlahMuhasabahku = $muhasabahku->count();

        $muhasabahPegawai = User::select('users.*')
            ->join('muhasabahkus', 'muhasabahkus.id_user', '=', 'users.id')
            ->where('users.jenis', '<>', 'siswa')
            ->get();
        $jumlahMuhasabahPegawai = $muhasabahPegawai->count();

        $muhasabahSiswa = User::select('users.*')
            ->join('muhasabahkus', 'muhasabahkus.id_user', '=', 'users.id')
            ->where('users.jenis', '=', 'siswa')
            ->get();
        $jumlahMuhasabahSiswa = $muhasabahSiswa->count();

        return view('pages.admin.muhasabah.index',
        [
            'jumlahMasterMuhasabah' => $jumlahMasterMuhasabah,
            'jumlahMuhasabahku' => $jumlahMuhasabahku,
            'jumlahMuhasabahPegawai' => $jumlahMuhasabahPegawai,
            'jumlahMuhasabahSiswa' => $jumlahMuhasabahSiswa,
        ]);
    }

    public function muhasabahSiswa()
    {
        $siswa = Siswa::select('siswas.*')
                    ->join('kelas_siswas', 'kelas_siswas.id', '=', 'siswas.id_kelas_siswa')
                    ->join('kelas', 'kelas.id', '=', 'kelas_siswas.id_kelas')
                    ->orderBy('kelas.nama_kelas', 'ASC')
                    ->orderBy('kelas_siswas.tahun_ajaran', 'ASC')
                    ->get();

        $muhasabahMaster = MasterMuhasabah::all();

        // $muhasabahSiswa = Muhasabah::select('muhasabahs.*')
        //     ->join('master_muhasabahs', 'master_muhasabahs.id', '=', 'muhasabahs.id_muhasabah')
        //     ->join('users', 'users.id', '=', 'muhasabahs.id_user')
        //     ->where('users.jenis', '=', 'siswa')
        //     ->get();

        $muhasabahSiswa = User::select('users.*')
            ->join('muhasabahkus', 'muhasabahkus.id_user', '=', 'users.id')
            ->where('users.jenis', '=', 'siswa')
            ->groupBy('users.id')
            ->get();

        return view('pages.admin.muhasabah.siswa.index',
        [
            'siswa' => $siswa,
            'muhasabahMaster' => $muhasabahMaster,
            'muhasabahSiswa' => $muhasabahSiswa
        ]);
    }

    public function muhasabahGuru()
    {
        $pegawai = Pegawai::all();
        $muhasabahMaster = MasterMuhasabah::all();
        // $muhasabahGuru = Muhasabah::select('muhasabahs.*')
        //     ->join('master_muhasabahs', 'master_muhasabahs.id', '=', 'muhasabahs.id_muhasabah')
        //     ->join('users', 'users.id', '=', 'muhasabahs.id_user')
        //     ->where('users.jenis', '<>', 'siswa')
        //     ->get();

        $muhasabahGuru = User::select('users.*')
            ->join('muhasabahs', 'muhasabahs.id_user', '=', 'users.id')
            ->where('users.jenis', '=', 'guru')
            ->groupBy('users.id')
            ->get();

        return view('pages.admin.muhasabah.pegawai.index',
        [
            'pegawai' => $pegawai,
            'muhasabahMaster' => $muhasabahMaster,
            'muhasabahGuru' => $muhasabahGuru
        ]);
    }

    public function showListMuhasabah($id_user)
    {
        $muhasabahMaster = MasterMuhasabah::all();
        $muhasabah = Muhasabahku::select('muhasabahkus.*')
            ->join('users', 'users.id', '=', 'muhasabahkus.id_user')
            ->where('users.id', '=', $id_user)
            ->get();

        $jenisUser = User::where('id', $id_user)->first()->jenis;
        $nama_kelas = '';
        $tahun_ajaran = '';
        $namaUser = '';

        if($jenisUser == 'siswa') {
            $namaUser = Siswa::where('id_user', $id_user)->first()->nama;
            $id_kelas_siswa = Siswa::where('id_user', $id_user)->first()->id_kelas_siswa;
            $tahun_ajaran = KelasSiswa::where('id', $id_kelas_siswa)->first()->tahun_ajaran;
            $id_kelas = KelasSiswa::where('id', $id_kelas_siswa)->first()->id_kelas;
            $nama_kelas = Kelas::where('id', $id_kelas)->first()->nama_kelas;
        } else {
            $namaUser = Pegawai::where('id_user', $id_user)->first()->nama;
        }

        return view('pages.admin.muhasabah.showList',
        [
            'id_user' => $id_user,
            'muhasabahMaster' => $muhasabahMaster,
            'muhasabah' => $muhasabah,
            'namaUser' => $namaUser,
            'nama_kelas' => $nama_kelas,
            'tahun_ajaran' => $tahun_ajaran,
        ]);
    }

    // public function store(Request $request)
    // {
    //     $this->validate($request, [
    //         'id_muhasabah' => 'required',
    //         'id_user' => 'nullable',
    //         'id_siswa' => 'nullable',
    //         'id_pegawai' => 'nullable',
    //         'tgl_muhasabah' => 'required',
    //         'status' => 'nullable'
    //     ]);

    //     if($request->status == null) {
    //         $status = 0;
    //     } else {
    //         $status = 1;
    //     }

    //     if($request->id_siswa != null && $request->id_pegawai == null) {
    //         $idUser = Siswa::where('id', $request->id_siswa)->first()->id_user;
    //         $idKelasSiswa = Siswa::where('id', $request->id_siswa)->first()->id_kelas_siswa;
    //         $tahunAjaran = KelasSiswa::where('id', $idKelasSiswa)->first()->tahun_ajaran;
    //         $idKelas = KelasSiswa::where('id', $idKelasSiswa)->first()->id_kelas;
    //         $kelas = Kelas::where('id', $idKelas)->first()->nama_kelas;

    //         Muhasabah::create([
    //             'id_muhasabah' => $request->id_muhasabah,
    //             'id_user' =>  $idUser,
    //             'tgl_muhasabah' =>  $request->tgl_muhasabah,
    //             'kelas' =>  $kelas,
    //             'tahun_ajaran' =>  $tahunAjaran,
    //             'status' =>  $status,
    //         ]);

    //     } else if($request->id_siswa == null && $request->id_pegawai != null) {
    //         $idUser = Pegawai::where('id', $request->id_pegawai)->first()->id_user;

    //         Muhasabah::create([
    //             'id_muhasabah' => $request->id_muhasabah,
    //             'id_user' =>  $idUser,
    //             'tgl_muhasabah' =>  $request->tgl_muhasabah,
    //             'status' =>  $status,
    //         ]);
    //     } else {
    //         Muhasabah::create([
    //             'id_muhasabah' => $request->id_muhasabah,
    //             'id_user' =>  $request->id_user,
    //             'tgl_muhasabah' =>  $request->tgl_muhasabah,
    //             'status' =>  $status,
    //         ]);
    //     }

    //     if($request->id_siswa != null && $request->id_pegawai == null) {
    //         return redirect()->route('muhasabahSiswa')->with(['success' => 'Data Berhasil Disimpan!']);
    //     } else if($request->id_siswa == null && $request->id_pegawai != null) {
    //         return redirect()->route('muhasabahGuru')->with(['success' => 'Data Berhasil Disimpan!']);
    //     } else {
    //         return redirect()->route('daftarMuhasabah', $request->id_user)->with(['success' => 'Data Berhasil Disimpan!']);
    //     }
    // }

    public function storeHarianku(Request $request)
    {
        $data = $request->except('_token', 'id_user', 'hari_ini');
        $idUser = $request->id_user;
        $tglMuhasabah = $request->hari_ini;

        $jenisUser = User::where('id', $idUser)->first()->jenis;

        if($jenisUser == 'siswa') {
            $idSiswa = Siswa::where('id_user', $idUser)->first()->id;
            $idKelasSiswa = Siswa::where('id', $idSiswa)->first()->id_kelas_siswa;
            $tahunAjaran = KelasSiswa::where('id', $idKelasSiswa)->first()->tahun_ajaran;
            $idKelas = KelasSiswa::where('id', $idKelasSiswa)->first()->id_kelas;
            $kelas = Kelas::where('id', $idKelas)->first()->nama_kelas;

            Muhasabahku::create([
                'id_muhasabah' => $request->id_muhasabah,
                'id_user' =>  $idUser,
                'tgl_muhasabah' =>  $tglMuhasabah,
                'kelas' =>  $kelas,
                'tahun_ajaran' =>  $tahunAjaran,
            ]);

        } else {
            Muhasabahku::create([
                'id_muhasabah' => $request->id_muhasabah,
                'id_user' =>  $request->id_user,
                'tgl_muhasabah' =>  $tglMuhasabah,
            ]);
        }

        $idMuhasabah = Muhasabahku::latest()->first()->id;

        foreach ($data as $key => $value) {
            $poinVal = MasterMuhasabah::where('id', $value)->first()->poin;

            MuhasabahkuDetail::create([
                'id_muhasabah' => $idMuhasabah,
                'id_master_muhasabah' => $value,
                'poin' => $poinVal
            ]);
        }

        $totalHariIni = MuhasabahkuDetail::where('id_muhasabah', $idMuhasabah)->sum('poin');
        DB::table('muhasabahkus')
                ->where('id', $idMuhasabah)
                ->update(['nilai' => $totalHariIni]);

        if($jenisUser == 'siswa') {
            return redirect()->route('daftarMuhasabah', $request->id_user)->with(['success' => 'Muhasabahku Berhasil Disimpan!']);
        } else {
            return redirect()->route('daftarMuhasabah', $request->id_user)->with(['success' => 'Muhasabahku Berhasil Disimpan!']);
        }
    }

    // public function show(Muhasabah $muhasabah)
    // {
    //     $pegawai = Pegawai::all();
    //     $siswa = Siswa::all();
    //     $muhasabahMaster = MasterMuhasabah::all();

    //     return view('pages.admin.muhasabah.show',
    //     [
    //         'pegawai' => $pegawai,
    //         'siswa' => $siswa,
    //         'muhasabahMaster' => $muhasabahMaster,
    //     ], compact('muhasabah'));
    // }

    public function showMuhasabahku(Muhasabahku $muhasabahku)
    {
        $muhasabahkuDetailOther = MuhasabahkuDetail::select('id_master_muhasabah')
                           ->where('id_muhasabah', '=', $muhasabahku->id)
                           ->get();
        $resultOther = $muhasabahkuDetailOther->toArray();

        $muhasabahMasterOther = MasterMuhasabah::select('*')
            ->whereNotIn('master_muhasabahs.id', $resultOther)
            ->get();

        return view('pages.admin.muhasabah.showListDetail',
        [
            'muhasabahkuDetailOther' => $muhasabahkuDetailOther,
            'muhasabahMasterOther' => $muhasabahMasterOther,
        ], compact('muhasabahku'));
    }

    public function updateHarianku(Request $request)
    {
        $data = $request->except('_method', '_token', 'id_user', 'hari_ini', 'id_muhasabah');
        $idUser = $request->id_user;
        $tglMuhasabah = $request->hari_ini;
        $idMuhasabah = $request->id_muhasabah;

        $jenisUser = User::where('id', $idUser)->first()->jenis;

        foreach ($data as $key => $value) {
            $poinVal = MasterMuhasabah::where('id', $value)->first()->poin;

            MuhasabahkuDetail::create([
                'id_muhasabah' => $idMuhasabah,
                'id_master_muhasabah' => $value,
                'poin' => $poinVal
            ]);
        }

        $nilaiSebelumnya = Muhasabahku::where('id', $idMuhasabah)->first()->nilai;
        $totalHariIni = MuhasabahkuDetail::where('id_muhasabah', $idMuhasabah)->sum('poin');
        $total = $nilaiSebelumnya + $totalHariIni;

        DB::table('muhasabahkus')
                ->where('id', $idMuhasabah)
                ->update(['nilai' => $total]);

        if($jenisUser == 'siswa') {
            return redirect()->route('daftarMuhasabah', $request->id_user)->with(['success' => 'Muhasabahku Berhasil Diperbarui!']);
        } else {
            return redirect()->route('daftarMuhasabah', $request->id_user)->with(['success' => 'Muhasabahku Berhasil Diperbarui!']);
        }
    }


    public function muhasabahHarianku($id_user)
    {
        $muhasabahMaster = MasterMuhasabah::all();
        // $muhasabah = Muhasabah::select('muhasabahs.*')
        //     ->join('master_muhasabahs', 'master_muhasabahs.id', '=', 'muhasabahs.id_muhasabah')
        //     ->join('users', 'users.id', '=', 'muhasabahs.id_user')
        //     ->where('users.id', '=', $id_user)
        //     ->get();

        $cekSim = Muhasabahku::where('order_id', $order->order_id)->where('status', 0)->exists();

        $jenisUser = User::where('id', $id_user)->first()->jenis;
        $nama_kelas = '';
        $tahun_ajaran = '';
        $namaUser = '';

        if($jenisUser == 'siswa') {
            $namaUser = Siswa::where('id_user', $id_user)->first()->nama;
            $id_kelas_siswa = Siswa::where('id_user', $id_user)->first()->id_kelas_siswa;
            $tahun_ajaran = KelasSiswa::where('id', $id_kelas_siswa)->first()->tahun_ajaran;
            $id_kelas = KelasSiswa::where('id', $id_kelas_siswa)->first()->id_kelas;
            $nama_kelas = Kelas::where('id', $id_kelas)->first()->nama_kelas;
        } else {
            $namaUser = Pegawai::where('id_user', $id_user)->first()->nama;
        }

        return view('pages.admin.muhasabah.muhasabahHarianku',
        [
            'id_user' => $id_user,
            'muhasabahMaster' => $muhasabahMaster,
            'muhasabah' => $muhasabah,
            'namaUser' => $namaUser,
            'nama_kelas' => $nama_kelas,
            'tahun_ajaran' => $tahun_ajaran,
        ]);
    }

    // public function store(Request $request)
    // {
    //     $this->validate($request, [
    //         'id_muhasabah' => 'required',
    //         'id_user' => 'nullable',
    //         'id_siswa' => 'nullable',
    //         'id_pegawai' => 'nullable',
    //         'tgl_muhasabah' => 'required',
    //         'status' => 'nullable'
    //     ]);

    //     if($request->status == null) {
    //         $status = 0;
    //     } else {
    //         $status = 1;
    //     }

    //     if($request->id_siswa != null && $request->id_pegawai == null) {
    //         $idUser = Siswa::where('id', $request->id_siswa)->first()->id_user;
    //         $idKelasSiswa = Siswa::where('id', $request->id_siswa)->first()->id_kelas_siswa;
    //         $tahunAjaran = KelasSiswa::where('id', $idKelasSiswa)->first()->tahun_ajaran;
    //         $idKelas = KelasSiswa::where('id', $idKelasSiswa)->first()->id_kelas;
    //         $kelas = Kelas::where('id', $idKelas)->first()->nama_kelas;

    //         Muhasabah::create([
    //             'id_muhasabah' => $request->id_muhasabah,
    //             'id_user' =>  $idUser,
    //             'tgl_muhasabah' =>  $request->tgl_muhasabah,
    //             'kelas' =>  $kelas,
    //             'tahun_ajaran' =>  $tahunAjaran,
    //             'status' =>  $status,
    //         ]);

    //     } else if($request->id_siswa == null && $request->id_pegawai != null) {
    //         $idUser = Pegawai::where('id', $request->id_pegawai)->first()->id_user;

    //         Muhasabah::create([
    //             'id_muhasabah' => $request->id_muhasabah,
    //             'id_user' =>  $idUser,
    //             'tgl_muhasabah' =>  $request->tgl_muhasabah,
    //             'status' =>  $status,
    //         ]);
    //     } else {
    //         Muhasabah::create([
    //             'id_muhasabah' => $request->id_muhasabah,
    //             'id_user' =>  $request->id_user,
    //             'tgl_muhasabah' =>  $request->tgl_muhasabah,
    //             'status' =>  $status,
    //         ]);
    //     }

    //     if($request->id_siswa != null && $request->id_pegawai == null) {
    //         return redirect()->route('muhasabahSiswa')->with(['success' => 'Data Berhasil Disimpan!']);
    //     } else if($request->id_siswa == null && $request->id_pegawai != null) {
    //         return redirect()->route('muhasabahGuru')->with(['success' => 'Data Berhasil Disimpan!']);
    //     } else {
    //         return redirect()->route('daftarMuhasabah', $request->id_user)->with(['success' => 'Data Berhasil Disimpan!']);
    //     }
    // }

    public function update(Request $request, Muhasabah $muhasabah)
    {
        $this->validate($request, [
            'id_muhasabah' => 'required',
            'id_siswa' => 'nullable',
            'id_pegawai' => 'nullable',
            'tgl_muhasabah' => 'required',
            'status' => 'nullable'
        ]);

        $muhasabah->update($request->all());

        return redirect()->route('muhasabah')->with(['success' => 'Data berhasil diperbarui']);
    }

    public function destroy(Muhasabah $muhasabah)
    {
        $muhasabah->delete();
        return redirect()->route('muhasabah')->with(['success' => 'Data berhasil dihapus!']);
    }
}
