@extends('layout.admin.main')

@section('title', 'Data Kelas | SekolahKarakter24')

@section('sidebar')
    @include('layout.admin.partials.sidebar.bank')
@endsection

@section('content')
<div class="row">

    <!-- card1 start -->
    <div class="col-md-6 col-xl-6">
        <a href="{{ route('kelasMaster') }}">
            <div class="card widget-card-1">
                <div class="card-block-small">
                    <i class="icofont icofont-pie-chart bg-c-blue card1-icon"></i>
                    <span class="text-c-blue f-w-600">Master Kelas</span>
                    <h4>{{ $jumlahKelasMaster }}</h4>
                    <div>
                        <span class="f-left m-t-10 text-muted">
                            <i class="text-c-blue f-16 icofont icofont-warning m-r-10"></i>Lihat detail
                        </span>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <!-- card1 end -->

    <!-- card1 start -->
    <div class="col-md-6 col-xl-6">
        <a href="{{ route('kelas') }}">
            <div class="card widget-card-1">
                <div class="card-block-small">
                    <i class="icofont icofont-warning-alt bg-c-green card1-icon"></i>
                    <span class="text-c-green f-w-600">Data Kelas</span>
                    <h4>{{ $jumlahKelas }}</h4>
                    <div>
                        <span class="f-left m-t-10 text-muted">
                            <i class="text-c-green f-16 icofont icofont-tag m-r-10"></i>Lihat detail
                        </span>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <!-- card1 end -->

</div>
@endsection
