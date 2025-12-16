@extends('layout.admin.main')

@section('title', 'Data Sifat Siswa | SekolahKarakter24')

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
        <h5>Data Sifat Siswa</h5>
        <div class="card-header-right mr-3">
            <a data-toggle="modal" data-target="#addSifatSiswaModal">
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
                            <th>Tahun Ajaran</th>
                            <th>Kelas</th>
                            <th>Siswa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $sifatSiswa as $sifatSiswa )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $sifatSiswa->kelasSiswa->tahun_ajaran }}</td>
                                <td>{{ $sifatSiswa->kelasSiswa->namaKelas->nama_kelas }}</td>
                                <td>{{ $sifatSiswa->ppdbSiswa->nama }}</td>
                                <td class="table-action" width="10%">
                                    <a href="{{ route('sifatSiswa').'/'.$sifatSiswa->id }}" class="btn btn-primary btn-sm">
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

@include('pages.admin.bank_data.sifat_siswa.create')

@endsection
