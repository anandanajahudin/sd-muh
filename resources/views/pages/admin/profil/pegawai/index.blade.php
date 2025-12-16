@extends('layout.admin.main')

@section('title', 'Profil | SekolahKarakter24')

@section('sidebar')
    @include('layout.admin.partials.sidebar.dashboard')
@endsection

@section('content')
    @if (session()->has('loginSuccess'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('loginSuccess') }} {{ auth()->user()->name }}
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"><i class="ti-close"></i></button>
        </div>
    @endif

    <!-- Basic table card start -->
    @foreach ($dataProfil as $dataProfil)
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Profil Saya</h5>
                    </div>

                    <div class="card-block">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-xl-3 col-form-label">
                                        <b>Nama Lengkap</b>
                                    </label>
                                    <div class="col-lg-9 col-xl-9 col-form-label">
                                        {{ $dataProfil->nama }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-xl-3 col-form-label">
                                        <b>NIP</b>
                                    </label>
                                    <div class="col-lg-9 col-xl-9 col-form-label">
                                        {{ $dataProfil->nip }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-xl-3 col-form-label">
                                        <b>NIK</b>
                                    </label>
                                    <div class="col-lg-9 col-xl-9 col-form-label">
                                        {{ $dataProfil->nik }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-xl-3 col-form-label">
                                        <b>Gender</b>
                                    </label>
                                    <div class="col-lg-9 col-xl-9 col-form-label">
                                        @if ($dataProfil->gender == 'L')
                                            Laki-laki
                                        @else
                                            Perempuan
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-xl-3 col-form-label">
                                        <b>No.Telp / Whatsapp</b>
                                    </label>
                                    <div class="col-lg-9 col-xl-9 col-form-label">
                                        {{ $dataProfil->no_hp }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-xl-3 col-form-label">
                                        <b>Alamat</b>
                                    </label>
                                    <div class="col-lg-9 col-xl-9 col-form-label">
                                        {{ $dataProfil->alamat }}
                                    </div>
                                </div>

                                <a data-toggle="modal" data-target="#logoutModal"
                                    class="btn btn-sm btn-secondary text-white">
                                    <i class="ti-layout-sidebar-left"></i> Keluar
                                </a>
                                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                    data-target="#editPegawaiModal">Ubah</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Akun Saya</h5>
                    </div>

                    <div class="card-block">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-xl-3 col-form-label">
                                        <b>Username</b>
                                    </label>
                                    <div class="col-lg-9 col-xl-9 col-form-label">
                                        {{ $dataProfil->userPegawai->name }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-xl-3 col-form-label">
                                        <b>Email</b>
                                    </label>
                                    <div class="col-lg-9 col-xl-9 col-form-label">
                                        {{ $dataProfil->userPegawai->email }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-xl-3 col-form-label">
                                        <b>Jenis Pegawai</b>
                                    </label>
                                    <div class="col-lg-9 col-xl-9 col-form-label">
                                        {{ ucfirst($dataProfil->userPegawai->jenis) }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-xl-3 col-form-label">
                                        <b>Foto KTP</b>
                                    </label>
                                    <div class="col-lg-9 col-xl-9 col-form-label">

                                        @if ($dataProfil->foto_ktp != null)
                                            @if (file_exists('storage/pegawai/' . $dataProfil->id . '/' . $dataProfil->foto_ktp))
                                                <a href="{{ asset('storage/pegawai/' . $dataProfil->id . '/' . $dataProfil->foto_ktp) }}"
                                                    class="btn btn-info btn-sm" target="_blank">
                                                    Preview
                                                </a>
                                            @endif
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-xl-3 col-form-label">
                                        <b>Foto Profil</b>
                                    </label>
                                    <div class="col-lg-9 col-xl-9 col-form-label">
                                        @if ($dataProfil->foto != null)
                                            @if (file_exists('storage/pegawai/' . $dataProfil->id . '/' . $dataProfil->foto))
                                                <a href="{{ asset('storage/pegawai/' . $dataProfil->id . '/' . $dataProfil->foto) }}"
                                                    class="btn btn-info btn-sm" target="_blank">
                                                    Preview
                                                </a>
                                            @endif
                                        @endif
                                    </div>
                                </div>

                                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                    data-target="#editPasswordModal">
                                    Ubah Password</button>

                                @if (auth()->user()->jenis == 'admin')
                                @else
                                    @if ($dataProfil->foto_ktp != null)
                                        @if (file_exists('storage/pegawai/' . $dataProfil->id . '/' . $dataProfil->foto_ktp))
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                data-target="#addFotoKtpModal">Ganti Foto KTP</button>
                                        @else
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                data-target="#addFotoKtpModal">Upload Foto KTP</button>
                                        @endif
                                    @else
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                            data-target="#addFotoKtpModal">Upload Foto KTP</button>
                                    @endif

                                    @if ($dataProfil->foto != null)
                                        @if (file_exists('storage/pegawai/' . $dataProfil->id . '/' . $dataProfil->foto))
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                data-target="#addFotoModal">Ganti Foto</button>
                                        @else
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                data-target="#addFotoModal">Upload Foto</button>
                                        @endif
                                    @else
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                            data-target="#addFotoModal">Upload Foto</button>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- Basic table card end -->

    @include('pages.admin.profil.pegawai.edit')
    @include('pages.admin.profil.pegawai.editPassword')
    @include('pages.admin.profil.pegawai.uploadFoto')
    @include('pages.admin.profil.pegawai.uploadFotoKtp')

@endsection
