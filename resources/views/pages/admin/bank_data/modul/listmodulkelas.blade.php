@extends('layout.admin.main')

@section('title', 'Data Modul | SekolahKarakter24')

@section('sidebar')
    @if(auth()->user()->jenis != 'siswa' && auth()->user()->jenis != 'walimurid' && auth()->user()->jenis != 'siswageneral')
        @include('layout.admin.partials.sidebar.bank')
    @else
        @include('layout.admin.partials.sidebar.modul')
    @endif
@endsection

@section('content')
@php
    $user = auth()->user();
@endphp

<div class="row">

    {{-- TOMBOL LIHAT SEMUA UNTUK ADMIN --}}
    @if (in_array($user->jenis, ['Kepala Sekolah', 'admin', 'Bendahara']))
        <div class="col-md-12 col-xl-12 mb-3">
            <a href="{{ route('dataModul') }}" class="btn btn-primary btn-block">Lihat Semua</a>
        </div>
    @endif

    {{-- LOOP KELAS --}}
    @foreach ($kelas as $k)

        @php
            // Kelas Master ID
            $kelasMaster = App\Models\KelasMaster::where('kelas', $k->kelas)->first();
            if (!$kelasMaster) continue;
            $idKelasMaster = $kelasMaster->id;

            // FILTER MODUL SESUAI ROLE USER
            if (in_array($user->jenis, ['siswa', 'siswageneral'])) {
                // siswa melihat modul sesuai kelas siswa
                $modulKelas = App\Models\Modul::where('id_kelas_master', $user->kelas)->get();

            } elseif ($user->jenis == 'walimurid') {
                // Walimurid → ambil kelas anak
                $wali = App\Models\WaliMurid::where('id_user', $user->id)->first();
                $modulKelas = $wali
                    ? App\Models\Modul::where('id_kelas_master', $wali->kelas)->get()
                    : collect([]);

            } else {
                // admin / kepala sekolah / bendahara → lihat berdasarkan modul kelas
                $modulKelas = App\Models\Modul::where('id_kelas_master', $idKelasMaster)->get();
            }

            $jumlahModul = $modulKelas->count();
        @endphp

        {{-- TAMPILKAN HANYA JIKA MODUL ADA --}}
        @if ($jumlahModul > 0)
            <div class="col-md-6 col-xl-6">
                <a href="{{ route('summaryModul.show', $idKelasMaster) }}">
                    <div class="card widget-card-1">
                        <div class="card-block-small">
                            <i class="icofont icofont-pie-chart bg-c-blue card1-icon"></i>
                            <span class="text-c-blue f-w-600">Kelas {{ $k->kelas }}</span>
                            <h4>{{ $jumlahModul }}</h4>
                            <div>
                                <span class="f-left m-t-10 text-muted">
                                    <i class="text-c-blue f-16 icofont icofont-warning m-r-10"></i>
                                    Lihat modul kelas {{ $k->kelas }}
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endif

    @endforeach

</div>
@endsection
