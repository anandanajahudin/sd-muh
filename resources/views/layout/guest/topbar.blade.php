{{-- <section id="hero" class="hero d-flex align-items-center"> --}}

<header id="header" class="header fixed-top">
    <div class="container container-xl d-flex align-items-center justify-content-between">

        <a href="{{ route('index') }}" class="logo d-flex align-items-center">
            <img src="{{ asset('front/img/header-logo.png') }}" alt="">
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto" href="{{ route('index') }}">Beranda</a></li>

                <li class="dropdown"><a href="{{ route('profil') }}"><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{ route('mengapa') }}">Mengapa 24</a></li>
                        <li><a href="{{ route('visiMisi') }}">Visi Misi</a></li>
                        <li><a href="{{ route('ptk') }}">PTK 24</a></li>
                    </ul>
                </li>

                <li><a class="nav-link scrollto" href="{{ route('kurikulum') }}">Kurikulum</a></li>

                {{-- <li class="dropdown"><a href="{{ route('kurikulum') }}"><span>Kurikulum</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{ route('kurikulum') }}">Kurikulum</a></li>
                        <li><a href="{{ route('modulPembelajaran') }}">Modul</a></li>
                    </ul>
                </li> --}}

                <li class="dropdown"><a href="{{ route('berita') }}"><span>Berita</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{ route('agenda') }}">Agenda</a></li>
                        <li><a href="{{ route('news') }}">24 News</a></li>
                        <li><a href="{{ route('opini') }}">24 Opini</a></li>
                        <li><a href="{{ route('tv') }}">24 TV</a></li>
                    </ul>
                </li>

                <li>
                    @php
                        use App\Models\Ppdb;
                        // $tahunIni = date('Y');
                        $ppdbTahunIni = Ppdb::where('tahun', 2026)->first()->tahun_ajaran;
                    @endphp
                    <a class="nav-link scrollto" href="{{ route('ppdb') }}">
                        SPMB {{ $ppdbTahunIni }}
                    </a>
                </li>

                <li><a class="nav-link scrollto" href="{{ route('kontak') }}">Kontak</a></li>

                @if (auth()->check())
                    <li class="dropdown"><a href="#"><span>{{ auth()->user()->name }}</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Keluar
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li><a class="nav-link scrollto" data-bs-toggle="modal" data-bs-target="#loginModal">Masuk</a></li>
                @endif
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
{{-- </section> --}}

@include('layout.guest.login')
