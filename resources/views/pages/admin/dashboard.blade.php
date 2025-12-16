@extends('layout.admin.main')

@section('title', 'Dashboard | SekolahKarakter24')

@section('sidebar')
    @include('layout.admin.partials.sidebar.dashboard')
@endsection

@section('content')
    @if (session()->has('loginSuccess'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('loginSuccess') }}
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"><i class="ti-close"></i></button>
        </div>
    @endif

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"><i
                    class="ti-close"></i></button>
        </div>
    @endif

    <div class="row">


        @if (auth()->user()->jenis != 'siswa' && auth()->user()->jenis != 'walimurid' && auth()->user()->jenis != 'siswageneral' && auth()->user()->jenis != 'gurugeneral')

            <!-- card1 start -->
            <div class="col-md-6 col-xl-3">
                <a href="{{ route('muhasabah') }}">
                    <div class="card widget-card-1">
                        <div class="card-block-small">
                            <i class="icofont icofont-ui-home bg-c-pink card1-icon"></i>
                            <span class="text-c-pink f-w-600">Muhasabah</span>
                            <h4>{{ $jumlahMuhasabah }}</h4>
                            <div>
                                <span class="f-left m-t-10 text-muted">
                                    <i class="text-c-pink f-16 icofont icofont-calendar m-r-10"></i>Data muhasabah
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- card1 end -->

            <!-- card1 start -->
            <div class="col-md-6 col-xl-3">
                <a href="{{ route('bankData') }}">
                    <div class="card widget-card-1">
                        <div class="card-block-small">
                            <i class="icofont icofont-pie-chart bg-c-blue card1-icon"></i>
                            <span class="text-c-blue f-w-600">Bank Data</span>
                            <h4>{{ $totalBankData }}</h4>
                            <div>
                                <span class="f-left m-t-10 text-muted">
                                    <i class="text-c-blue f-16 icofont icofont-warning m-r-10"></i>Kumpulan data
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- card1 end -->

            @if (auth()->user()->jenis == 'admin' ||
                    auth()->user()->jenis == 'Kepala Sekolah' ||
                    auth()->user()->jenis == 'Bendahara')
                <!-- card1 start -->
                <div class="col-md-6 col-xl-3">
                    <a href="{{ route('dataBerita') }}">
                        <div class="card widget-card-1">
                            <div class="card-block-small">
                                <i class="icofont icofont-warning-alt bg-c-green card1-icon"></i>
                                <span class="text-c-green f-w-600">Berita</span>
                                <h4>{{ $totalBerita }}</h4>
                                <div>
                                    <span class="f-left m-t-10 text-muted">
                                        <i class="text-c-green f-16 icofont icofont-tag m-r-10"></i>Berita sekolah
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- card1 end -->

                <!-- card1 start -->
                <div class="col-md-6 col-xl-3">
                    <a href="{{ route('dataAgenda') }}">
                        <div class="card widget-card-1">
                            <div class="card-block-small">
                                <i class="icofont icofont-social-twitter bg-c-yellow card1-icon"></i>
                                <span class="text-c-yellow f-w-600">Agenda</span>
                                <h4>{{ $jumlahAgenda }}</h4>
                                <div>
                                    <span class="f-left m-t-10 text-muted">
                                        <i class="text-c-yellow f-16 icofont icofont-refresh m-r-10"></i>Agenda sekolah
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- card1 end -->
            @endif
        @else
            @if (auth()->user()->jenis == 'siswa')
                <!-- muhasabahku start -->
                <div class="col-md-6 col-xl-4">
                    {{-- <a href="{{ route('daftarMuhasabah', auth()->user()->id) }}"> --}}
                    <a href="{{ route('muhasabahHarianku', auth()->user()->id) }}">
                        <div class="card widget-card-1">
                            <div class="card-block-small">
                                <i class="icofont icofont-ui-home bg-c-pink card1-icon"></i>
                                <span class="text-c-pink f-w-600">Muhasabah saya</span>
                                <h4>{{ $jumlahMuhasabahku }}</h4>
                                <div>
                                    <span class="f-left m-t-10 text-muted">
                                        <i class="text-c-pink f-16 icofont icofont-calendar m-r-10"></i>Muhasabah saya
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- muhasabahku end -->

            @else
                <!-- modul start -->
                <div class="col-md-6 col-xl-4">
                    <a href="{{ route('summaryModul.show', $kelasUser) }}">
                        <div class="card widget-card-1">
                            <div class="card-block-small">
                                <i class="icofont icofont-ui-home bg-c-pink card1-icon"></i>
                                <span class="text-c-pink f-w-600">Modul Pembelajaran</span>
                                <h4>{{ $jumlahModul }}</h4>
                                <div>
                                    <span class="f-left m-t-10 text-muted">
                                        <i class="text-c-pink f-16 icofont icofont-calendar m-r-10"></i>Modul pembelajaran
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- modul end -->
            @endif
        @endif

        @if (auth()->user()->jenis == 'Kepala Sekolah' ||
                auth()->user()->jenis == 'admin' ||
                auth()->user()->jenis == 'Bendahara')
            <!-- Statestics Start -->
            <!--<div class="col-md-12 col-xl-12">-->
            <!--    <div class="card">-->
            <!--        <div class="card-header">-->
            <!--            <h5>Statestics</h5>-->
            <!--            <div class="card-header-left ">-->
            <!--            </div>-->
            <!--            <div class="card-header-right">-->
            <!--                <ul class="list-unstyled card-option">-->
            <!--                    <li><i class="icofont icofont-simple-left "></i></li>-->
            <!--                    <li><i class="icofont icofont-maximize full-card"></i></li>-->
            <!--                    <li><i class="icofont icofont-minus minimize-card"></i></li>-->
            <!--                    <li><i class="icofont icofont-refresh reload-card"></i></li>-->
            <!--                    <li><i class="icofont icofont-error close-card"></i></li>-->
            <!--                </ul>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--        <div class="card-block">-->
            <!--            <div id="statestics-chart" style="height:517px;"></div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
        @endif
    </div>
@endsection
