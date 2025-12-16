@extends('layout.admin.main')

@section('title', 'Detail Program Unggulan | SekolahKarakter24')

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
        <h5>
            Detail Program Unggulan
            ({{ $programUnggulan }})
        </h5>
        @if(auth()->user()->jenis != 'siswa')
        <div class="card-header-right mr-3">
            <a data-toggle="modal" data-target="#addDetailProgramUnggulanModal">
                <button class="btn btn-success btn-round btn-sm">Tambah</button>
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
                            <th>Foto</th>
                            @if(auth()->user()->jenis != 'siswa')
                                <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $detailProgramUnggulan as $detailProgramUnggulan )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $detailProgramUnggulan->judul }}</td>
                                <td>{{ $detailProgramUnggulan->jenis }}</td>
                                <td>
                                    @if ($detailProgramUnggulan->foto != null)
                                        @if(file_exists('repo/programUnggulan/'.$detailProgramUnggulan->id_program_unggulan.'/'.$detailProgramUnggulan->foto))
                                            <a href="{{ asset('repo/programUnggulan/'.$detailProgramUnggulan->id_program_unggulan.'/'.$detailProgramUnggulan->foto) }}" class="btn btn-info btn-sm" target="_blank">
                                                Preview
                                            </a>
                                        @endif
                                    @endif
                                </td>
                                @if(auth()->user()->jenis != 'siswa')
                                    <td class="table-action" width="10%">
                                        <a href="{{ route('detailProgramUnggulan').'/'.$detailProgramUnggulan->id }}" class="btn btn-primary btn-sm">
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

@include('pages.admin.master_data.programUnggulan.detailCreate')

@endsection
