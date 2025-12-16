@extends('layout.admin.main')

@section('title', 'Data Profil | SekolahKarakter24')

@section('sidebar')
    @include('layout.admin.partials.sidebar.kelolaLanding.profil')
@endsection

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"><i class="ti-close"></i></button>
        </div>
    @endif

    <!-- Basic table card start -->
    <div class="card">
        <div class="card-header">
            <h5>Data Profil Sekolah</h5>
            @if ($profil == null)
                <div class="card-header-right mr-3">
                    <a data-toggle="modal" data-target="#addProfilModal">
                        <button class="btn btn-success btn-round btn-sm">Tambah</button>
                    </a>
                </div>
            @endif
        </div>

        <div class="card-body">
            <div class="card-block">

                <div class="row">
                    <div class="col-lg-12 col-xl-12">
                        @foreach ($profil as $profil)
                            <div class="form-group row">
                                <label class="col-lg-3 col-xl-3 col-form-label"><b>Judul</b></label>
                                <div class="col-lg-9 col-xl-9 col-form-label">{{ $profil->judul }}</div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-xl-3 col-form-label"><b>Keterangan</b></label>
                                <div class="col-lg-9 col-xl-9 col-form-label">
                                    {!! $profil->keterangan !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-xl-3 col-form-label"><b>Deskripsi</b></label>
                                <div class="col-lg-9 col-xl-9 col-form-label">
                                    {!! $profil->deskripsi !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-xl-3 col-form-label">
                                    <b>4 Nilai Sekolah Karakter 24 Surabaya</b>
                                </label>
                                <div class="col-lg-9 col-xl-9 col-form-label">
                                    <a href="{{ route('dataNilaiSekolah.index') }}"
                                        class="btn btn-primary btn-sm mb-2">Preview</a>
                                    <ol>
                                        @foreach ($nilaiSekolah as $nilai)
                                            <a href="{{ route('dataNilaiSekolah.show', $nilai->id) }}">
                                                <li class="mb-2">{{ $nilai->judul }}</li>
                                            </a>
                                        @endforeach
                                    </ol>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-xl-3 col-form-label"><b>Visi</b></label>
                                <div class="col-lg-9 col-xl-9 col-form-label">
                                    {{ $profil->judul_visi }}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-xl-3 col-form-label"><b>Misi</b></label>
                                <div class="col-lg-9 col-xl-9 col-form-label">
                                    <a href="{{ route('dataMisi') }}" class="btn btn-primary btn-sm mb-2">Preview</a><br />
                                    <ol>
                                        @foreach ($misi as $misi)
                                            <li class="mb-2">{{ $misi->deskripsi }}</li>
                                        @endforeach
                                    </ol>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-xl-3 col-form-label">
                                    <b>Mengapa 24 (Keunggulan Sekolah)</b>
                                </label>
                                <div class="col-lg-9 col-xl-9 col-form-label">
                                    <a href="{{ route('dataKeunggulan') }}" class="btn btn-primary btn-sm">Preview</a>
                                    @foreach ($keunggulan as $keunggulan)
                                        <a href="{{ route('dataKeunggulan') . '/' . $keunggulan->id }}">
                                            <div class="mt-3 mb-2">{{ $loop->iteration . '. ' . $keunggulan->judul }}</div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-xl-3 col-form-label">
                                    <b>Kurikulum</b>
                                </label>
                                <div class="col-lg-9 col-xl-9 col-form-label">
                                    <a href="{{ route('dataKurikulum') }}" class="btn btn-primary btn-sm">Preview</a>
                                    @foreach ($kurikulum as $kurikulum)
                                        <a href="{{ route('dataKurikulum') . '/' . $kurikulum->id }}">
                                            <div class="mt-2 mb-2">{{ $loop->iteration . '. ' . $kurikulum->judul }}</div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-xl-3 col-form-label">
                                    <b>Detail Kurikulum</b>
                                </label>
                                <div class="col-lg-9 col-xl-9 col-form-label">
                                    <a href="{{ route('dataDetailKurikulum') }}" class="btn btn-primary btn-sm">Preview</a>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-xl-3 col-form-label">
                                    <b>Daycare</b>
                                </label>
                                <div class="col-lg-9 col-xl-9 col-form-label">
                                    {!! $profil->daycare !!}

                                    <a href="{{ asset('repo/daycare/' . $profil->daycare_img) }}"
                                        class="btn btn-sm btn-primary" target="_blank">Lihat Gambar</a>

                                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                        data-target="#editDaycareModal">
                                        Ubah</button>

                                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                        data-target="#editDaycareGambarModal">
                                        Ubah Gambar</button>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-xl-3 col-form-label"><b>Alamat</b></label>
                                <div class="col-lg-9 col-xl-9 col-form-label">
                                    {{ $profil->alamat }}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-xl-3 col-form-label"><b>Operasional</b></label>
                                <div class="col-lg-9 col-xl-9 col-form-label">
                                    {{ $profil->operasional }}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-xl-3 col-form-label"><b>Email</b></label>
                                <div class="col-lg-9 col-xl-9 col-form-label">
                                    {{ $profil->email }}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-xl-3 col-form-label"><b>Telepon</b></label>
                                <div class="col-lg-9 col-xl-9 col-form-label">
                                    +{{ $profil->telp }}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-xl-3 col-form-label"><b>Facebook</b></label>
                                <div class="col-lg-9 col-xl-9 col-form-label">
                                    {{ $profil->link_fb }}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-xl-3 col-form-label"><b>Instagram</b></label>
                                <div class="col-lg-9 col-xl-9 col-form-label">
                                    {{ $profil->link_ig }}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-xl-3 col-form-label"><b>Tiktok</b></label>
                                <div class="col-lg-9 col-xl-9 col-form-label">
                                    {{ $profil->link_tiktok }}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-xl-3 col-form-label"><b>Youtube</b></label>
                                <div class="col-lg-9 col-xl-9 col-form-label">
                                    {{ $profil->link_yutub }}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-xl-3 col-form-label"><b>Banner 1</b></label>
                                <div class="col-lg-9 col-xl-9 col-form-label">
                                    {{ $profil->banner_primary }}

                                    <a href="{{ asset('repo/landing/slideshow/' . $profil->banner_primary) }}"
                                        class="btn btn-sm btn-primary" target="_blank">Lihat Gambar</a>

                                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                        data-target="#editBannerPrimary">
                                        Ubah Gambar</button>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-xl-3 col-form-label"><b>Banner 2</b></label>
                                <div class="col-lg-9 col-xl-9 col-form-label">
                                    {{ $profil->banner_secondary }}

                                    <a href="{{ asset('repo/landing/slideshow/' . $profil->banner_secondary) }}"
                                        class="btn btn-sm btn-primary" target="_blank">Lihat Gambar</a>

                                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                        data-target="#editBannerSecondary">
                                        Ubah Gambar</button>
                                </div>
                            </div>

                            <a href="{{ url()->previous() }}" class="btn btn-sm btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                            <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                data-target="#editProfilModal">Ubah</button>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Basic table card end -->

    @include('pages.admin.landing.misi.create')
    @include('pages.admin.landing.profil.create')
    @include('pages.admin.landing.profil.edit')
    @include('pages.admin.landing.profil.editBannerPrimary')
    @include('pages.admin.landing.profil.editBannerSecondary')
    @include('pages.admin.landing.daycare.edit')
    @include('pages.admin.landing.daycare.editGambar')

@endsection

@push('scripts')
    <script>
        CKEDITOR.replace('keterangan');
        CKEDITOR.replace('deskripsi');
        CKEDITOR.replace('keteranganEdit');
        CKEDITOR.replace('deskripsiEdit');
        CKEDITOR.replace('daycare');
    </script>
@endpush
