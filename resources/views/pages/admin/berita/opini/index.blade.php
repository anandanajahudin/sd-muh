@extends('layout.admin.main')

@section('title', 'Data Berita | SekolahKarakter24')

@section('sidebar')
    @include('layout.admin.partials.sidebar.opini')
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
        <h5>Data Opini</h5>
        <div class="card-header-right mr-3">
            <a href="{{ route('addOpini') }}">
                <button class="btn btn-success btn-round btn-sm">Tambah</button>
            </a>
            {{-- <a href="{{ route('berita.trash') }}">
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
                            <th>Tgl Dibuat</th>
                            <th>Judul Berita</th>
                            <th>Dibuat Oleh</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $berita as $berita )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ date('d M Y', strtotime($berita->created_at)) }}</td>
                                <td>{{ $berita->judul }}</td>
                                <td>{{ $berita->userPost->name }}</td>
                                <td class="table-action" width="10%">
                                    <a href="{{ route('dataOpini').'/'.$berita->id }}" class="btn btn-primary btn-sm">
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

@endsection
