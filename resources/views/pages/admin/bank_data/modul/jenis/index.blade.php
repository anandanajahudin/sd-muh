@extends('layout.admin.main')

@section('title', 'Data Jenis Modul | SekolahKarakter24')

@section('sidebar')
    @include('layout.admin.partials.sidebar.bank')
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
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"><i class="ti-close"></i></button>
    </div>
@else
@endif

<!-- Basic table card start -->
<div class="card">
    <div class="card-header">
        <h5>Data Jenis Modul</h5>
        @if(auth()->user()->jenis != 'siswa')
        <div class="card-header-right mr-3">
            <a data-toggle="modal" data-target="#addJenisModulModal">
                <button class="btn btn-success btn-round btn-sm">Tambah</button>
            </a>
            {{-- <a href="{{ route('kelas.trash') }}">
                <button class="btn btn-primary btn-round btn-sm"><i class="ti-trash text-white"></i></button>
            </a> --}}
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
                            <th>Judul</th>
                            @if(auth()->user()->jenis != 'siswa')
                                <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $jenisModul as $jenisModul )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $jenisModul->judul }}</td>
                                @if(auth()->user()->jenis != 'siswa')
                                    <td class="table-action" width="10%">
                                        <a href="{{ route('jenisModul').'/'.$jenisModul->id }}" class="btn btn-primary btn-sm">
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

@include('pages.admin.bank_data.modul.jenis.create')

@endsection
