@extends('layout.admin.main')

@section('title', 'Data Modul | SekolahKarakter24')

@section('sidebar')
    @include('layout.admin.partials.sidebar.bank')
@endsection

@section('content')
    <div class="row">
        @if (auth()->user()->jenis == 'Kepala Sekolah' ||
                auth()->user()->jenis == 'admin' ||
                auth()->user()->jenis == 'Bendahara')
            <div class="col-md-12 col-xl-12">
                <a href="{{ route('dataModul') }}" class="btn btn-primary btn-block">Lihat Semua</a>
            </div>
        @endif

        @foreach ($kelas as $kelas)
            @php
                $idKelasMaster = App\Models\KelasMaster::where('judul', $kelas->judul)->first()->id;
                $kelasMaster = App\Models\KelasMaster::where('judul', $kelas->judul)->first()->kelas;
                $modulKelas = App\Models\Modul::where('id', $idKelasMaster)->get();
                $jumlahModul = $modulKelas->count();
            @endphp

            <!-- card1 start -->
            <div class="col-md-6 col-xl-6">
                <a href="{{ route('summaryModul.show', $idKelasMaster) }}">
                    <div class="card widget-card-1">
                        <div class="card-block-small">
                            <i class="icofont icofont-pie-chart bg-c-blue card1-icon"></i>
                            <span class="text-c-blue f-w-600">Kelas {{ $kelas->judul }}</span>
                            <h4>{{ $jumlahModul }}</h4>
                            <div>
                                <span class="f-left m-t-10 text-muted">
                                    <i class="text-c-blue f-16 icofont icofont-warning m-r-10"></i>
                                    Lihat modul (kelas {{ $kelas->judul }})
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- card1 end -->
        @endforeach

    </div>
@endsection
