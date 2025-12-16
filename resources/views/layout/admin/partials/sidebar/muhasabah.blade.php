<li>
    <a href="{{ route('dashboard') }}">
        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
        <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
        <span class="pcoded-mcaret"></span>
    </a>
</li>
<li class="active">
    <a href="{{ route('muhasabah') }}">
        <span class="pcoded-micon"><i class="ti-layers"></i><b>M</b></span>
        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Muhasabah</span>
        <span class="pcoded-mcaret"></span>
    </a>
</li>

@if (auth()->user()->jenis != 'siswa' && auth()->user()->jenis != 'walimurid' && auth()->user()->jenis != 'siswageneral' && auth()->user()->jenis != 'gurugeneral')

    <li>
        <a href="{{ route('bankData') }}">
            <span class="pcoded-micon"><i class="ti-layers"></i><b>BD</b></span>
            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Bank Data</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>

    @if (auth()->user()->jenis == 'Kepala Sekolah' ||
            auth()->user()->jenis == 'admin' ||
            auth()->user()->jenis == 'Bendahara')
        <li>
            <a href="{{ route('masterData') }}">
                <span class="pcoded-micon"><i class="ti-layers"></i><b>MS</b></span>
                <span class="pcoded-mtext" data-i18n="nav.form-components.main">Master Data</span>
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
                <li class="">
                    <a href="{{ route('dataOpini') }}">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Opini</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('dataTv') }}">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Berita TV</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            </ul>
        </li>
    @endif

    <li>
        <a href="{{ route('index') }}">
            <span class="pcoded-micon"><i class="ti-home"></i><b>L</b></span>
            <span class="pcoded-mtext" data-i18n="nav.dash.main">Landing Page</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>

    @if (auth()->user()->jenis == 'Kepala Sekolah' ||
            auth()->user()->jenis == 'admin' ||
            auth()->user()->jenis == 'Bendahara')
        <li class="pcoded-hasmenu">
            <a href="javascript:void(0)">
                <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Pengelolaan Website</span>
                <span class="pcoded-mcaret"></span>
            </a>
            <ul class="pcoded-submenu">
                <li class="">
                    <a href="{{ route('dataProfil') }}">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Profil Sekolah</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('dataPesan') }}">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Data Pesan</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('dataTestimoni') }}">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Testimoni</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            </ul>
        </li>
    @endif
@else
    @php
        if (auth()->user()->jenis == 'walimurid') {
            $kelasUser = auth()->user()->waliMurid->kelas;
        } else if (auth()->user()->jenis == 'gurugeneral') {
            $kelasUser = auth()->user()->guruGeneral->kelas;
        } else if (auth()->user()->jenis == 'siswageneral') {
            $kelasUser = auth()->user()->siswaGeneral->kelas;
        } else if (auth()->user()->jenis == 'siswa') {
            $kelasUser = auth()->user()->siswa->kelas;
        } else {
            $kelasUser = 0;
        }
    @endphp

    <li>
        <a href="{{ route('summaryModul.show', $kelasUser) }}">
            <span class="pcoded-micon"><i class="ti-layers"></i><b>M</b></span>
            <span class="pcoded-mtext" data-i18n="nav.dash.main">Modul Pembelajaran</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
@endif
