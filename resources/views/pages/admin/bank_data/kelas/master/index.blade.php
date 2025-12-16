@extends('layout.admin.main')

@section('title', 'Data Master Kelas | SekolahKarakter24')

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
            <h5>Data Master Kelas</h5>
            <div class="card-header-right mr-3">
                <a data-toggle="modal" data-target="#addKelasMasterModal">
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
                                <th>Judul</th>
                                <th>Jenis</th>
                                <th>Kelas</th>
                                <th>Biaya Daftar Ulang</th>
                                <th>Biaya SPP</th>
                                <th>Keterangan</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kelasMaster as $kelasMaster)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $kelasMaster->judul }}</td>
                                    <td>{{ $kelasMaster->jenis }}</td>
                                    <td>{{ $kelasMaster->kelas }}</td>
                                    <td>@currency($kelasMaster->biaya_daful)</td>
                                    <td>@currency($kelasMaster->spp)</td>
                                    <td>{!! $kelasMaster->keterangan !!}</td>
                                    <td>{!! $kelasMaster->deskripsi !!}</td>
                                    <td class="table-action" width="10%">
                                        <a href="{{ route('kelasMaster') . '/' . $kelasMaster->id }}"
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

    @include('pages.admin.bank_data.kelas.master.create')

@endsection
