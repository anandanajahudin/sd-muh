@if (auth()->user()->jenis != 'siswa' && auth()->user()->jenis != 'siswageneral' && auth()->user()->jenis != 'walimurid')
<!-- card1 start -->
<div class="col-md-6 col-xl-3">
    <a href="{{ route('siswa') }}">
        <div class="card widget-card-1">
            <div class="card-block-small">
                <i class="icofont icofont-pie-chart bg-c-blue card1-icon"></i>
                <span class="text-c-blue f-w-600">Data Siswa</span>
                <h4>{{ $jumlahSiswa }}</h4>
                <div>
                    <span class="f-left m-t-10 text-muted">
                        <i class="text-c-blue f-16 icofont icofont-calendar m-r-10"></i>Data siswa
                    </span>
                </div>
            </div>
        </div>
    </a>
</div>
<!-- card1 end -->
@endif

<!-- card1 start -->
<div class="col-md-6 col-xl-3">
    <a href="{{ route('summaryModul') }}">
        <div class="card widget-card-1">
            <div class="card-block-small">
                <i class="icofont icofont-pie-chart bg-c-green card1-icon"></i>
                <span class="text-c-green f-w-600">Data Modul</span>
                <h4>{{ $jumlahModul }}</h4>
                <div>
                    <span class="f-left m-t-10 text-muted">
                        <i class="text-c-green f-16 icofont icofont-calendar m-r-10"></i>Modul belajar
                    </span>
                </div>
            </div>
        </div>
    </a>
</div>
<!-- card1 end -->

@if (auth()->user()->jenis != 'siswa' && auth()->user()->jenis != 'siswageneral' && auth()->user()->jenis != 'walimurid')
<!-- card1 start -->
<div class="col-md-6 col-xl-3">
    <a href="{{ route('kejadianSiswa') }}">
        <div class="card widget-card-1">
            <div class="card-block-small">
                <i class="icofont icofont-pie-chart bg-c-yellow card1-icon"></i>
                <span class="text-c-yellow f-w-600">Data Kejadian</span>
                <h4>{{ $jumlahKejadian }}</h4>
                <div>
                    <span class="f-left m-t-10 text-muted">
                        <i class="text-c-yellow f-16 icofont icofont-calendar m-r-10"></i>Kejadian siswa/siswi
                    </span>
                </div>
            </div>
        </div>
    </a>
</div>
<!-- card1 end -->
@endif
