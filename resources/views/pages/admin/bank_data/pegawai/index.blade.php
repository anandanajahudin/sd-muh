@extends('layout.admin.main')

@section('title', 'Data Pegawai | SekolahKarakter24')

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
            <h5>Data Pegawai</h5>
            <div class="card-header-right mr-3">
                <a data-toggle="modal" data-target="#addPegawaiModal">
                    <button class="btn btn-success btn-round btn-sm">Tambah</button>
                </a>
                <a data-toggle="modal" data-target="#importUserPegawaiModal">
                    <button class="btn btn-info btn-round btn-sm">Import User Pegawai</button>
                </a>
                <a data-toggle="modal" data-target="#importPegawaiModal">
                    <button class="btn btn-info btn-round btn-sm">Import</button>
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
                                <th>Nama</th>
                                <th>Jenis Pegawai</th>
                                <th>NBM</th>
                                <th>Gender</th>
                                <th>No. HP</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pegawai as $pegawai)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pegawai->nama }}</td>
                                    <td>
                                        @if ($pegawai->userPegawai->jenis == 'kepsek')
                                            Kepala Sekolah
                                        @else
                                            {{ ucfirst($pegawai->userPegawai->jenis) }}
                                        @endif
                                    </td>
                                    <td>{{ $pegawai->nip }}</td>
                                    <td>
                                        @if ($pegawai->gender == 'L')
                                            Laki-laki
                                        @else
                                            Perempuan
                                        @endif
                                    </td>
                                    <td>{{ $pegawai->no_hp }}</td>
                                    <td class="table-action" width="10%">
                                        <a href="{{ route('pegawai') . '/' . $pegawai->id }}"
                                            class="btn btn-primary btn-sm">
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

    @include('pages.admin.bank_data.pegawai.create')
    @include('pages.admin.bank_data.pegawai.import')
    @include('pages.admin.bank_data.pegawai.importUser')

@endsection
