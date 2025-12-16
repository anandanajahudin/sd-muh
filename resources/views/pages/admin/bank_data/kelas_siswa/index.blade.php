@extends('layout.admin.main')

@section('title', 'Data Wali Kelas | SekolahKarakter24')

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
        <h5>Data Wali Kelas</h5>
        <div class="card-header-right mr-3">
            <a data-toggle="modal" data-target="#addKelasSiswaModal">
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
                            <th>Tahun Ajaran</th>
                            <th>Kelas</th>
                            <th>Wali Kelas</th>
                            <th>NBM</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $kelasSiswa as $kelasSiswa )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kelasSiswa->tahun_ajaran }}</td>
                                <td>{{ $kelasSiswa->namaKelas->nama_kelas }}</td>
                                <td>{{ $kelasSiswa->waliKelas->nama }}</td>
                                <td>{{ $kelasSiswa->waliKelas->nip }}</td>
                                <td class="table-action" width="10%">
                                    <a href="{{ route('kelasSiswa').'/'.$kelasSiswa->id }}" class="btn btn-primary btn-sm">
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

@include('pages.admin.bank_data.kelas_siswa.create')

@endsection
