@extends('layout.admin.main')

@section('title', 'Data Muhasabah | SekolahKarakter24')

@section('sidebar')
    @include('layout.admin.partials.sidebar.muhasabah')
@endsection

@section('content')
    <div class="row">
        <!-- card1 start -->
        <div class="col-md-6 col-xl-4">
            {{-- <a href="{{ route('daftarMuhasabah', auth()->user()->id) }}"> --}}
            <a href="{{ route('muhasabahHarianku', auth()->user()->id) }}">
                <div class="card widget-card-1">
                    <div class="card-block-small">
                        <i class="icofont icofont-user bg-c-green card1-icon"></i>
                        <span class="text-c-green f-w-600">Muhasabah Saya</span>
                        <h4>{{ $jumlahMuhasabahku }}</h4>
                        <div>
                            <span class="f-left m-t-10 text-muted">
                                <i class="text-c-green f-16 icofont icofont-tag m-r-10"></i>Muhasabah saya
                            </span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- card1 end -->

        @if (auth()->user()->jenis != 'siswa')

            @if (auth()->user()->jenis == 'Kepala Sekolah' ||
                    auth()->user()->jenis == 'admin' ||
                    auth()->user()->jenis == 'Bendahara')

                <!-- card1 start -->
                <div class="col-md-6 col-xl-4">
                    <a href="{{ route('master_muhasabah') }}">
                        <div class="card widget-card-1">
                            <div class="card-block-small">
                                <i class="icofont icofont-file-alt bg-c-yellow card1-icon"></i>
                                <span class="text-c-yellow f-w-600">Master Muhasabah</span>
                                <h4>{{ $jumlahMasterMuhasabah }}</h4>
                                <div>
                                    <span class="f-left m-t-10 text-muted">
                                        <i class="text-c-yellow f-16 icofont icofont-tag m-r-10"></i>
                                        Amalan-Amalan Kebaikan
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- card1 start -->
                <div class="col-md-6 col-xl-4">
                    <a href="{{ route('muhasabahSiswa') }}">
                        <div class="card widget-card-1">
                            <div class="card-block-small">
                                <i class="icofont icofont-graduate-alt bg-c-pink card1-icon"></i>
                                <span class="text-c-pink f-w-600">Muhasabah Siswa</span>
                                <h4>{{ $jumlahMuhasabahSiswa }}</h4>
                                <div>
                                    <span class="f-left m-t-10 text-muted">
                                        <i class="text-c-pink f-16 icofont icofont-calendar m-r-10"></i>Muhasabah
                                        siswa/siswa
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- card1 end -->
            @else
                {{-- Guru --}}
                {{-- Wali Kelas --}}

                @if ($waliKelas == 1)
                    <!-- card1 start -->
                    <div class="col-md-6 col-xl-4">
                        <a href="{{ route('muhasabahSiswa') }}">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="icofont icofont-graduate-alt bg-c-pink card1-icon"></i>
                                    <span class="text-c-pink f-w-600">Muhasabah Siswa</span>
                                    <h4>{{ $jumlahMuhasabahSiswa }}</h4>
                                    <div>
                                        <span class="f-left m-t-10 text-muted">
                                            <i class="text-c-pink f-16 icofont icofont-calendar m-r-10"></i>Muhasabah
                                            siswa/siswa
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- card1 end -->
                @endif
            @endif

            <!-- card1 start -->
            <div class="col-md-6 col-xl-4">
                <a href="{{ route('muhasabahGuru') }}">
                    <div class="card widget-card-1">
                        <div class="card-block-small">
                            <i class="icofont icofont-teacher bg-c-blue card1-icon"></i>
                            <span class="text-c-blue f-w-600">Muhasabah Pegawai</span>
                            <h4>{{ $jumlahMuhasabahPegawai }}</h4>
                            <div>
                                <span class="f-left m-t-10 text-muted">
                                    <i class="text-c-blue f-16 icofont icofont-warning m-r-10"></i>Muhasabah pegawai
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- card1 end -->
        @endif

    </div>
@endsection
