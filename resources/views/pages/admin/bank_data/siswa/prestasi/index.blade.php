@extends('layout.admin.main')

@section('title', 'Prestasi Siswa | SekolahKarakter24')

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
        <h5>
            Data Prestasi - {{ $namaSiswa }}
            ({{ $kelasSiswa.' '.$kelasTahunAjaran }})
        </h5>
        <div class="card-header-right mr-3">
            <a data-toggle="modal" data-target="#addPrestasiSiswaModal">
                <button class="btn btn-success btn-round btn-sm">Tambah</button>
            </a>
            {{-- <a href="{{ route('siswa.trash') }}">
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
                            <th>Judul Prestasi</th>
                            <th>Juara</th>
                            <th>Tgl Kompetisi</th>
                            <th>Kategori</th>
                            <th>Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $prestasiSiswa as $prestasiSiswa )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $prestasiSiswa->judul }}</td>
                                <td>{{ $prestasiSiswa->juara }}</td>
                                <td>
                                    @if ($prestasiSiswa->tgl_kompetisi != null)
                                        {{ date('d M Y', strtotime($prestasiSiswa->tgl_kompetisi)) }}
                                    @endif
                                </td>
                                <td>{{ $prestasiSiswa->kategori }}</td>
                                <td>{{ $prestasiSiswa->siswaPrestasi->kelasSiswa->namaKelas->nama_kelas }}</td>
                                <td class="table-action" width="10%">
                                    <a href="{{ route('prestasiSiswa').'/'.$prestasiSiswa->id }}" class="btn btn-primary btn-sm">
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

@include('pages.admin.bank_data.siswa.prestasi.create')

@endsection
