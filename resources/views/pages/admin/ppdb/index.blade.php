@extends('layout.admin.main')

@section('title', 'Data Calon Siswa | SekolahKarakter24')

@section('sidebar')
    @include('layout.admin.partials.sidebar.bank')
@endsection

@section('content')
@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ $message }}
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"><i class="ti-close"></i></button>
    </div>
@endif

<!-- Basic table card start -->
<div class="card">
    <div class="card-header">
        <h5>Data Calon Siswa</h5>
        <div class="card-header-right mr-3">
            <a data-toggle="modal" data-target="#addPpdbSiswaModal">
                <button class="btn btn-success btn-round btn-sm">Tambah</button>
            </a>
            {{-- <a href="{{ route('kelas.trash') }}">
                <button class="btn btn-primary btn-round btn-sm"><i class="ti-trash text-white"></i></button>
            </a> --}}
        </div>
    </div>

    <div class="card-body">
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table id="tabel" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>PPDB</th>
                            <th>Waktu Daftar</th>
                            <th>Nama</th>
                            <th>Gender</th>
                            <th>Kategori Kelas</th>
                            <th>Asal TK</th>
                            <th>Nama Ayah</th>
                            <th>Pekerjaan Ayah</th>
                            <th>Pendapatan Ayah</th>
                            <th>Nama Ibu</th>
                            <th>Pekerjaan Ibu</th>
                            <th>Pendapatan Ibu</th>
                            <th>Alamat</th>
                            <th>Pembayaran</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $ppdbSiswa as $ppdbSiswa )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $ppdbSiswa->ppdb->tahun_ajaran }}</td>
                                <td>{{ date('d M Y, h:i:s', strtotime($ppdbSiswa->created_at)) }}</td>
                                <td>{{ $ppdbSiswa->nama }}</td>
                                <td>
                                    @if($ppdbSiswa->gender == 'L')
                                        Laki-laki
                                    @else
                                        Perempuan
                                    @endif
                                </td>
                                <td>{{ $ppdbSiswa->kategori_kelas }}</td>
                                <td>{{ $ppdbSiswa->tkSiswa->nama }}</td>
                                <td>{{ $ppdbSiswa->nama_ayah }}</td>
                                <td>
                                    @if ($ppdbSiswa->pekerjaan_ayah != null)
                                        {{ App\Models\Pekerjaan::where('id', $ppdbSiswa->pekerjaan_ayah)->first()->judul }}
                                    @endif
                                </td>
                                <td>@currency($ppdbSiswa->pendapatan_ayah)</td>
                                <td>{{ $ppdbSiswa->nama_ibu }}</td>
                                <td>
                                    @if ($ppdbSiswa->pekerjaan_ibu != null)
                                        {{ App\Models\Pekerjaan::where('id', $ppdbSiswa->pekerjaan_ibu)->first()->judul }}
                                    @endif
                                </td>
                                <td>@currency($ppdbSiswa->pendapatan_ibu)</td>
                                <td>{{ $ppdbSiswa->alamat }}</td>
                                <td>
                                    @if ($ppdbSiswa->file != null)
                                        @if(file_exists('repo/ppdb/'.$ppdbSiswa->ppdb->tahun.'/'.$ppdbSiswa->kategori_kelas.'/'.$ppdbSiswa->file))
                                            <a href="{{ asset('repo/ppdb/'.$ppdbSiswa->ppdb->tahun.'/'.$ppdbSiswa->kategori_kelas.'/'.$ppdbSiswa->file) }}"
                                               class="btn btn-info btn-sm" target="_blank">
                                                Lunas
                                            </a>
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @if ($ppdbSiswa->status == 0)
                                        <label class="label label-warning">Menunggu</label>
                                    @else
                                        <label class="label label-success">Diterima</label>
                                    @endif
                                </td>
                                <td class="table-action" width="10%">
                                    <a href="{{ route('ppdbSiswa').'/'.$ppdbSiswa->id }}" class="btn btn-primary btn-sm">
                                        <i class="ti-arrow-right"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Basic table card end -->

@include('pages.admin.ppdb.create')

@endsection
