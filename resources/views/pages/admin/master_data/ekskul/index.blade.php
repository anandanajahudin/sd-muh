@extends('layout.admin.main')

@section('title', 'Data Ekskul | SekolahKarakter24')

@section('sidebar')
    @include('layout.admin.partials.sidebar.master')
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
        <h5>Data Ekskul</h5>
        @if(auth()->user()->jenis != 'siswa')
            <div class="card-header-right mr-3">
                <a data-toggle="modal" data-target="#addEkskulModal">
                    <button class="btn btn-success btn-round btn-sm">Tambah</button>
                </a>

                <a href="{{ route('jenisEkskul.dashboard.index') }}">
                    <button class="btn btn-primary btn-round btn-sm">Lihat Jenis Ekskul</button>
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
                            <th>Judul</th>
                            <th>Jenis</th>
                            <th>Logo</th>
                            @if(auth()->user()->jenis != 'siswa')
                                <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $ekskul as $ekskul )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $ekskul->judul }}</td>
                                <td>{{ $ekskul->jenisEkskul->judul }}</td>
                                <td>
                                    @if ($ekskul->logo != null)
                                        @if(file_exists('repo/ekskul/'.$ekskul->id.'/'.$ekskul->logo))
                                            <a href="{{ asset('repo/ekskul/'.$ekskul->id.'/'.$ekskul->logo) }}" class="btn btn-info btn-sm" target="_blank">
                                                Preview
                                            </a>
                                        @endif
                                    @endif
                                </td>
                                @if(auth()->user()->jenis != 'siswa')
                                    <td class="table-action" width="10%">
                                        <a href="{{ route('dataEkskul').'/'.$ekskul->id }}" class="btn btn-primary btn-sm">
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

@include('pages.admin.master_data.ekskul.create')

@endsection
