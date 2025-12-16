@extends('layout.admin.main')

@section('title', 'Muhasabah Saya | SekolahKarakter24')

@section('sidebar')
    @include('layout.admin.partials.sidebar.muhasabah')
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
            <h5>Muhasabah Saya</h5>
            <div class="card-header-right mr-3">
                <a data-toggle="modal" data-target="#addMuhasabahModal">
                    <button class="btn btn-success btn-round btn-sm">Tambah</button>
                </a>
            </div>
        </div>

        <div class="card-body">
            <div class="card-block table-border-style">
                <div class="table-responsive">
                    <table id="tabel" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tgl Muhasabah</th>
                                <th>Judul Muhasabah</th>
                                <th>Poin</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($muhasabahSiswa as $muhasabah)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ date('d M Y', strtotime($muhasabah->tgl_muhasabah)) }}</td>
                                    <td>{{ $muhasabah->masterMuhasabah->judul }}</td>
                                    <td>{{ $muhasabah->masterMuhasabah->poin }}</td>
                                    <td>
                                        @if ($muhasabah->status == 1)
                                            <label class="badge badge-success">
                                                Dikerjakan
                                            </label>
                                        @endif
                                    </td>
                                    <td class="table-action" width="10%">
                                        <a href="{{ route('muhasabah') . '/' . $muhasabah->id }}"
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

    @include('pages.admin.muhasabah.siswa.create')

@endsection
