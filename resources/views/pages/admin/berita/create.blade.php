@extends('layout.admin.main')

@section('title', 'Tambah Berita | SekolahKarakter24')

@section('sidebar')
    <li>
        <a href="{{ route('dashboard') }}">
            <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
            <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
    <li>
        <a href="{{ route('muhasabah') }}">
            <span class="pcoded-micon"><i class="ti-layers"></i><b>M</b></span>
            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Muhasabah</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>

    @if (auth()->user()->jenis != 'siswa')
        <li>
            <a href="{{ route('bankData') }}">
                <span class="pcoded-micon"><i class="ti-layers"></i><b>BD</b></span>
                <span class="pcoded-mtext" data-i18n="nav.form-components.main">Bank Data</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>
        <li class="pcoded-hasmenu active pcoded-trigger">
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
                <li class="active">
                    <a href="{{ route('dataBerita') }}">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Berita</span>
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
        <li>
            <a href="{{ route('index') }}">
                <span class="pcoded-micon"><i class="ti-home"></i><b>L</b></span>
                <span class="pcoded-mtext" data-i18n="nav.dash.main">Landing Page</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>
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
    @else
    @endif

@endsection

@section('content')

    <!-- Basic table card start -->
    <div class="card">
        <div class="card-header">
            <h5>Tambah Berita</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Judul <span style="color:red">*</span></label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul"
                            id="judul" placeholder="Judul Berita" value="{{ old('judul') }}" required>
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Gambar <span style="color:red">*</span></label>
                        <input class="form-control @error('gambar') is-invalid @enderror" name="gambar" id="gambar"
                            type="file" placeholder="Gambar Berita">
                        <small>Ukuran maksimal gambar 2 MB</small>
                        @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Keterangan Gambar <span style="color:red">*</span></label>
                        <input type="text" class="form-control @error('keterangan_img') is-invalid @enderror"
                            name="keterangan_img" id="keterangan_img" placeholder="Keterangan Gambar"
                            value="{{ old('keterangan_img') }}" required>
                        @error('keterangan_img')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Deskripsi <span style="color:red">*</span></label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" required>{{ trim(old('deskripsi')) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <input type="hidden" class="form-control @error('jenis') is-invalid @enderror" name="jenis"
                        id="jenis" value="berita" readonly>
                    <input type="hidden" class="form-control @error('tgl_agenda') is-invalid @enderror"
                        name="tgl_agenda" id="tgl_agenda" readonly>
                    <input type="hidden" class="form-control @error('link_vidio') is-invalid @enderror"
                        name="link_vidio" id="link_vidio" readonly>
                    <input type="hidden" class="form-control @error('id_user') is-invalid @enderror" name="id_user"
                        id="id_user" value="{{ auth()->user()->id }}" readonly>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Basic table card end -->

@endsection

@push('scripts')
    <script>
        CKEDITOR.replace('deskripsi');
    </script>
@endpush
