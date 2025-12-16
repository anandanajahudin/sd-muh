@extends('layout.admin.main')

@section('title', 'Data PPDB | SekolahKarakter24')

@section('sidebar')
    @include('layout.admin.partials.sidebar.bank')
@endsection

@section('content')
<div class="row">
    <h5>Data Master PPDB
        <a data-toggle="modal" data-target="#addPpdbModal">
            <button class="btn btn-success btn-round btn-sm">Tambah</button>
        </a>
        <a href="{{ route('ppdbMaster') }}" class="btn btn-primary btn-round btn-sm">Lihat Semua</a>
    </h5>
</div>

<div class="row">
    @foreach ($ppdb as $ppdb)
        <!-- card1 start -->
        <div class="col-md-4 col-xl-4">
            <a href="{{ route('ppdbSiswa.daftarCalonSiswa', $ppdb->id) }}">
                <div class="card widget-card-1">
                    <div class="card-block-small">
                        <i class="icofont icofont-pie-chart bg-c-blue card1-icon"></i>
                        <span class="text-c-blue f-w-600">
                            PPDB
                        </span>
                        <h4>{{ $ppdb->tahun_ajaran }}</h4>
                        <div>
                            <span class="f-left m-t-10 text-muted">
                                <i class="text-c-blue f-16 icofont icofont-warning m-r-10"></i>
                                {{ date('d M Y', strtotime($ppdb->tgl_awal)).' - '.date('d M Y', strtotime($ppdb->tgl_batas)) }}
                            </span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- card1 end -->
    @endforeach
</div>

@include('pages.admin.ppdb.master.create')

@endsection
