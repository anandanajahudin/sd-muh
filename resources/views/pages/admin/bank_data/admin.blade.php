<!-- card1 start -->
<div class="col-md-6 col-xl-3">
    {{-- <a href="{{ route('siswa') }}"> --}}
    <a href="{{ route('siswaGeneral.dashboard.index') }}">
        <div class="card widget-card-1">
            <div class="card-block-small">
                <i class="icofont icofont-pie-chart bg-c-pink card1-icon"></i>
                <span class="text-c-pink f-w-600">Data Siswa</span>
                <h4>{{ $jumlahSiswa }}</h4>
                <div>
                    <span class="f-left m-t-10 text-muted">
                        <i class="text-c-pink f-16 icofont icofont-calendar m-r-10"></i>Data siswa general
                    </span>
                </div>
            </div>
        </div>
    </a>
</div>
<!-- card1 end -->

<!-- card1 start -->
<div class="col-md-6 col-xl-3">
    <a href="{{ route('pegawai') }}">
        <div class="card widget-card-1">
            <div class="card-block-small">
                <i class="icofont icofont-pie-chart bg-c-blue card1-icon"></i>
                <span class="text-c-blue f-w-600">Data Pegawai</span>
                <h4>{{ $jumlahGuru }}</h4>
                <div>
                    <span class="f-left m-t-10 text-muted">
                        <i class="text-c-blue f-16 icofont icofont-warning m-r-10"></i>Data guru & staff
                    </span>
                </div>
            </div>
        </div>
    </a>
</div>
<!-- card1 end -->

<!-- card1 start -->
<div class="col-md-6 col-xl-3">
    <a href="{{ route('summaryKelas') }}">
        <div class="card widget-card-1">
            <div class="card-block-small">
                <i class="icofont icofont-pie-chart bg-c-green card1-icon"></i>
                <span class="text-c-green f-w-600">Data Kelas</span>
                <h4>{{ $jumlahKelas }}</h4>
                <div>
                    <span class="f-left m-t-10 text-muted">
                        <i class="text-c-green f-16 icofont icofont-tag m-r-10"></i>Master data kelas
                    </span>
                </div>
            </div>
        </div>
    </a>
</div>
<!-- card1 end -->

<!-- card1 start -->
<div class="col-md-6 col-xl-3">
    <a href="{{ route('kelasSiswa') }}">
        <div class="card widget-card-1">
            <div class="card-block-small">
                <i class="icofont icofont-pie-chart bg-c-yellow card1-icon"></i>
                <span class="text-c-yellow f-w-600">Wali Kelas</span>
                <h4>{{ $jumlahKelasSiswa }}</h4>
                <div>
                    <span class="f-left m-t-10 text-muted">
                        <i class="text-c-yellow f-16 icofont icofont-refresh m-r-10"></i>Data wali kelas
                    </span>
                </div>
            </div>
        </div>
    </a>
</div>
<!-- card1 end -->

<!-- card1 start -->
<div class="col-md-6 col-xl-3">
    <a href="{{ route('summaryModul') }}">
        <div class="card widget-card-1">
            <div class="card-block-small">
                <i class="icofont icofont-pie-chart bg-c-pink card1-icon"></i>
                <span class="text-c-pink f-w-600">Data Modul</span>
                <h4>{{ $jumlahModul }}</h4>
                <div>
                    <span class="f-left m-t-10 text-muted">
                        <i class="text-c-pink f-16 icofont icofont-calendar m-r-10"></i>Modul belajar
                    </span>
                </div>
            </div>
        </div>
    </a>
</div>
<!-- card1 end -->

<!-- card1 start -->
<div class="col-md-6 col-xl-3">
    <a href="{{ route('prestasiSiswa') }}">
        <div class="card widget-card-1">
            <div class="card-block-small">
                <i class="icofont icofont-pie-chart bg-c-blue card1-icon"></i>
                <span class="text-c-blue f-w-600">Data Prestasi</span>
                <h4>{{ $jumlahPrestasi }}</h4>
                <div>
                    <span class="f-left m-t-10 text-muted">
                        <i class="text-c-blue f-16 icofont icofont-calendar m-r-10"></i>Prestasi siswa/siswi
                    </span>
                </div>
            </div>
        </div>
    </a>
</div>
<!-- card1 end -->

<!-- card1 start -->
<div class="col-md-6 col-xl-3">
    <a href="{{ route('kejadianSiswa') }}">
        <div class="card widget-card-1">
            <div class="card-block-small">
                <i class="icofont icofont-pie-chart bg-c-green card1-icon"></i>
                <span class="text-c-green f-w-600">Data Kejadian</span>
                <h4>{{ $jumlahKejadian }}</h4>
                <div>
                    <span class="f-left m-t-10 text-muted">
                        <i class="text-c-green f-16 icofont icofont-calendar m-r-10"></i>Kejadian siswa/siswi
                    </span>
                </div>
            </div>
        </div>
    </a>
</div>
<!-- card1 end -->

<!-- card1 start -->
<div class="col-md-6 col-xl-3">
    {{-- <a href="{{ route('ppdbMaster') }}"> --}}
    <a href="{{ route('daftarPpdb') }}">
        <div class="card widget-card-1">
            <div class="card-block-small">
                <i class="icofont icofont-pie-chart bg-c-yellow card1-icon"></i>
                <span class="text-c-yellow f-w-600">PPDB</span>
                <h4>{{ $jumlahPpdb }}</h4>
                <div>
                    <span class="f-left m-t-10 text-muted">
                        <i class="text-c-yellow f-16 icofont icofont-calendar m-r-10"></i>PPDB sekolah
                    </span>
                </div>
            </div>
        </div>
    </a>
</div>
<!-- card1 end -->

<!-- card1 start -->
<div class="col-md-6 col-xl-3">
    <a href="{{ route('waliMurid.dashboard.index') }}">
        <div class="card widget-card-1">
            <div class="card-block-small">
                <i class="icofont icofont-pie-chart bg-c-pink card1-icon"></i>
                <span class="text-c-pink f-w-600">Data Wali Murid</span>
                <h4>{{ $jumlahWaliMurid }}</h4>
                <div>
                    <span class="f-left m-t-10 text-muted">
                        <i class="text-c-pink f-16 icofont icofont-calendar m-r-10"></i>Data wali murid
                    </span>
                </div>
            </div>
        </div>
    </a>
</div>
<!-- card1 end -->

<!-- card1 start -->
<div class="col-md-6 col-xl-3">
    <a href="{{ route('guruGeneral.dashboard.index') }}">
        <div class="card widget-card-1">
            <div class="card-block-small">
                <i class="icofont icofont-pie-chart bg-c-blue card1-icon"></i>
                <span class="text-c-blue f-w-600">Data Guru</span>
                <h4>{{ $jumlahGuru }}</h4>
                <div>
                    <span class="f-left m-t-10 text-muted">
                        <i class="text-c-blue f-16 icofont icofont-calendar m-r-10"></i>Data guru sesuai kelas
                    </span>
                </div>
            </div>
        </div>
    </a>
</div>
<!-- card1 end -->
