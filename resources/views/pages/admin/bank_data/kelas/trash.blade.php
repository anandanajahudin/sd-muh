@extends('layout.admin.main')

@section('title', 'Data Kelas | SekolahKarakter24')

@section('sidebar')
<li>
    <a href="{{ route('dashboard') }}">
        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
        <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
        <span class="pcoded-mcaret"></span>
    </a>
</li>
<li>
    <a href="{{ route('muhasabah') }}">
        <span class="pcoded-micon"><i class="ti-layers"></i><b>M</b></span>
        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Muhasabah</span>
        <span class="pcoded-mcaret"></span>
    </a>
</li>

@if (auth()->user()->jenis != 'siswa')

<li class="active">
    <a href="{{ route('bankData') }}">
        <span class="pcoded-micon"><i class="ti-layers"></i><b>BD</b></span>
        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Bank Data</span>
        <span class="pcoded-mcaret"></span>
    </a>
</li>
<li class="pcoded-hasmenu">
    <a href="javascript:void(0)">
        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
        <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Data Berita</span>
        <span class="pcoded-mcaret"></span>
    </a>
    <ul class="pcoded-submenu">
        <li class="">
            <a href="{{ route('dataAgenda') }}">
                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Agenda</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>
        <li class="">
            <a href="{{ route('dataBerita') }}">
                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Berita</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>
    </ul>
</li>

@else
@endif

@endsection

<!-- Basic table card start -->
<div class="card">
    <div class="card-header">
        <h5>Data Kelas</h5>
        <div class="card-header-right mr-3">
            {{-- <a href="{{ route('kelas.pulihkanSemua') }}" class="btn btn-success btn-round btn-sm">
                Pulihkan Semua
            </a> --}}
            {{-- <a href="{{ route('kelas.hapusPermanenSemua') }}">
                <button class="btn btn-success btn-round btn-sm">Hapus Semua Permanen</button>
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
                            <th>Nama Kelas</th>
                            <th>Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $kelas as $kelas )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kelas->nama_kelas }}</td>
                                <td>{{ $kelas->kelas }}</td>
                                <td class="table-action" width="10%">
                                    <form action="{{ route('kelas.pulihkan', $kelas->id) }}" method="POST">
                                    @csrf
                                        <button type="submit" class="btn btn-success btn-sm">Pulihkan</button>
                                    </form>

                                    <form action="{{ route('kelas.hapusPermanen', $kelas->id) }}" method="POST">
                                    @csrf
                                        <button type="submit" class="btn btn-destroy btn-sm">Hapus Permanen</button>
                                    </form>
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

@include('pages.admin.bank_data.kelas.create')

@endsection
