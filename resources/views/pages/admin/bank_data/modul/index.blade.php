@extends('layout.admin.main')

@section('title', 'Data Modul | SekolahKarakter24')

@section('sidebar')
    @if(auth()->user()->jenis != 'siswa' && auth()->user()->jenis != 'walimurid' && auth()->user()->jenis != 'siswageneral')
        @include('layout.admin.partials.sidebar.bank')
    @else
        @include('layout.admin.partials.sidebar.modul')
    @endif
@endsection

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"><i class="ti-close"></i></button>
        </div>
    @elseif ($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"><i
                    class="ti-close"></i></button>
        </div>
    @else
    @endif

    <!-- Basic table card start -->
    <div class="card">
        <div class="card-header">
            <h5>Data Modul - Siswa</h5>
            @if (auth()->user()->jenis != 'siswa' && auth()->user()->jenis != 'walimurid' && auth()->user()->jenis != 'siswageneral')
                <div class="card-header-right mr-3">
                    <a href="{{ route('summaryModul') }}">
                        <button class="btn btn-secondary btn-round btn-sm">Kembali</button>
                    </a>
                    <a data-toggle="modal" data-target="#addModulModal">
                        <button class="btn btn-success btn-round btn-sm">Tambah</button>
                    </a>
                    <a href="{{ route('jenisModul') }}">
                        <button class="btn btn-primary btn-round btn-sm">Lihat Jenis Modul</button>
                    </a>
                </div>
            @endif
        </div>

        <div class="card-body">
            <div class="card-block table-border-style">
                <div class="table-responsive">
                    <table id="tabel" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kelas</th>
                                <th>Judul Modul</th>
                                <th>Jenis</th>
                                <th>File</th>
                                @if (auth()->user()->jenis != 'siswa')
                                    <th>Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($modul as $modul)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $modul->modulKelas->judul }}</td>
                                    <td>{{ $modul->judul }}</td>
                                    <td>{{ $modul->jenisModul->judul }}</td>
                                    <td>
                                        @if ($modul->file != null)
                                            @if (file_exists('repo/modul/' . $modul->id_kelas_master . '/' . $modul->id . '/' . $modul->file))
                                                <a href="{{ asset('repo/modul/' . $modul->id_kelas_master . '/' . $modul->id . '/' . $modul->file) }}"
                                                    class="btn btn-info btn-sm" target="_blank">
                                                    Preview
                                                </a>
                                            @endif
                                        @endif
                                    </td>
                                    @if (auth()->user()->jenis != 'siswa')
                                        <td class="table-action" width="10%">
                                            <a href="{{ route('dataModul') . '/' . $modul->id }}"
                                                class="btn btn-primary btn-sm">
                                                <i class="ti-arrow-right"></i>
                                            </a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Basic table card end -->

    @include('pages.admin.bank_data.modul.create')

@endsection
