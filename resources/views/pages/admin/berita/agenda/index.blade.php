@extends('layout.admin.main')

@section('title', 'Data Agenda | SekolahKarakter24')

@section('sidebar')
    @include('layout.admin.partials.sidebar.agenda')
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
        <h5>Data Agenda</h5>
        <div class="card-header-right mr-3">
            <a href="{{ route('addAgenda') }}">
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
                            <th>Tgl Agenda</th>
                            <th>Judul Agenda</th>
                            <th>Dibuat Oleh</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $agenda as $agenda )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ date('d M Y', strtotime($agenda->created_at)) }}</td>
                                <td>{{ date('d M Y', strtotime($agenda->tgl_agenda)) }}</td>
                                <td>{{ $agenda->judul }}</td>
                                <td>{{ $agenda->userPost->name }}</td>
                                <td class="table-action" width="10%">
                                    <a href="{{ route('dataAgenda').'/'.$agenda->id }}" class="btn btn-primary btn-sm">
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
