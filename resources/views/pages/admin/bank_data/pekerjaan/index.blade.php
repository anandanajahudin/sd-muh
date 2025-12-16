@extends('layout.admin.main')

@section('title', 'Data Master Pekerjaan | SekolahKarakter24')

@section('sidebar')
    @include('layout.admin.partials.sidebar.master')
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
        <h5>Data Master Pekerjaan</h5>
        <div class="card-header-right mr-3">
            <a data-toggle="modal" data-target="#addPekerjaanModal">
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
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $pekerjaan as $pekerjaan )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pekerjaan->judul }}</td>
                                <td class="table-action" width="10%">
                                    <a href="{{ route('pekerjaan').'/'.$pekerjaan->id }}" class="btn btn-primary btn-sm">
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

@include('pages.admin.bank_data.pekerjaan.create')

@endsection
