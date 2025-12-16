@extends('layout.admin.main')

@section('title', 'Master Data | SekolahKarakter24')

@section('sidebar')
    @include('layout.admin.partials.sidebar.master')
@endsection

@section('content')
<div class="row">
    <!-- card1 start -->
    <div class="col-md-6 col-xl-3">
        <a href="{{ route('sdMutasi') }}">
            <div class="card widget-card-1">
                <div class="card-block-small">
                    <i class="icofont icofont-pie-chart bg-c-pink card1-icon"></i>
                    <span class="text-c-pink f-w-600">Data Mutasi SD</span>
                    <h4>{{ $jumlahSdMutasi }}</h4>
                    <div>
                        <span class="f-left m-t-10 text-muted">
                            <i class="text-c-pink f-16 icofont icofont-calendar m-r-10"></i>Master SD mutasi
                        </span>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <!-- card1 end -->

    <!-- card1 start -->
    <div class="col-md-6 col-xl-3">
        <a href="{{ route('dataTk') }}">
            <div class="card widget-card-1">
                <div class="card-block-small">
                    <i class="icofont icofont-pie-chart bg-c-blue card1-icon"></i>
                    <span class="text-c-blue f-w-600">Data TK</span>
                    <h4>{{ $jumlahTk }}</h4>
                    <div>
                        <span class="f-left m-t-10 text-muted">
                            <i class="text-c-blue f-16 icofont icofont-calendar m-r-10"></i>Master TK
                        </span>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <!-- card1 end -->

    <!-- card1 start -->
    <div class="col-md-6 col-xl-3">
        <a href="{{ route('pekerjaan') }}">
            <div class="card widget-card-1">
                <div class="card-block-small">
                    <i class="icofont icofont-pie-chart bg-c-green card1-icon"></i>
                    <span class="text-c-green f-w-600">Data Pekerjaan</span>
                    <h4>{{ $jumlahPekerjaan }}</h4>
                    <div>
                        <span class="f-left m-t-10 text-muted">
                            <i class="text-c-green f-16 icofont icofont-calendar m-r-10"></i>Master pekerjaan
                        </span>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <!-- card1 end -->

    <!-- card1 start -->
    <div class="col-md-6 col-xl-3">
        <a href="{{ route('sifat') }}">
            <div class="card widget-card-1">
                <div class="card-block-small">
                    <i class="icofont icofont-pie-chart bg-c-yellow card1-icon"></i>
                    <span class="text-c-yellow f-w-600">Data Sifat</span>
                    <h4>{{ $jumlahSifatMaster }}</h4>
                    <div>
                        <span class="f-left m-t-10 text-muted">
                            <i class="text-c-yellow f-16 icofont icofont-calendar m-r-10"></i>Master sifat
                        </span>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <!-- card1 end -->

    <!-- card1 start -->
    <div class="col-md-6 col-xl-3">
        <a href="{{ route('dataEkskul') }}">
            <div class="card widget-card-1">
                <div class="card-block-small">
                    <i class="icofont icofont-pie-chart bg-c-pink card1-icon"></i>
                    <span class="text-c-pink f-w-600">Data Ekskul</span>
                    <h4>{{ $jumlahEkskul }}</h4>
                    <div>
                        <span class="f-left m-t-10 text-muted">
                            <i class="text-c-pink f-16 icofont icofont-calendar m-r-10"></i>Data Ekstrakulikuler
                        </span>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <!-- card1 end -->

    <!-- card1 start -->
    <div class="col-md-6 col-xl-3">
        <a href="{{ route('dataProgramUnggulan') }}">
            <div class="card widget-card-1">
                <div class="card-block-small">
                    <i class="icofont icofont-pie-chart bg-c-blue card1-icon"></i>
                    <span class="text-c-blue f-w-600">Unggulan</span>
                    <h4>{{ $jumlahProgramUnggulan }}</h4>
                    <div>
                        <span class="f-left m-t-10 text-muted">
                            <i class="text-c-blue f-16 icofont icofont-calendar m-r-10"></i>Program Unggulan
                        </span>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <!-- card1 end -->

</div>
@endsection
