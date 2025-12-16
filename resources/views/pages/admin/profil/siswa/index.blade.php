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
<div class="card">
    <div class="card-header">
        <h5>Profil Saya</h5>
    </div>

    <div class="card-block">

        <div class="row">
            <div class="col-lg-8 col-xl-5">
                <table class="table">
                    @foreach ($dataProfil as $dataProfil)
                        <tr>
                            <th>Nama Lengkap</th>
                            <td>{{ $dataProfil->ppdbSiswa->nama }}</td>
                        </tr>
                        <tr>
                            <th>NIS</th>
                            <td>{{ $dataProfil->nis }}</td>
                        </tr>
                        <tr>
                            <th>NISN</th>
                            <td>{{ $dataProfil->nisn }}</td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td>
                                @if($dataProfil->ppdbSiswa->gender == 'L')
                                    Laki-laki
                                @else
                                    Perempuan
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>No.Handphone Siswa</th>
                            <td>{{ $dataProfil->ppdbSiswa->nohp }}</td>
                        </tr>
                        <tr>
                            <th>No.Handphone Ayah/Ibu</th>
                            <td>{{ $dataProfil->ppdbSiswa->nohp_ortu }}</td>
                        </tr>
                        <tr>
                            <th>Email Ayah/Ibu</th>
                            <td>{{ $dataProfil->ppdbSiswa->email_ortu }}</td>
                        </tr>
                        <tr>
                            <th>Nama Ayah</th>
                            <td>{{ $dataProfil->ppdbSiswa->nama_ayah }}</td>
                        </tr>
                        <tr>
                            <th>Nama Ibu</th>
                            <td>{{ $dataProfil->ppdbSiswa->nama_ibu }}</td>
                        </tr>
                        <tr>
                            <th>Nama Wali</th>
                            <td>{{ $dataProfil->ppdbSiswa->nama_wali }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $dataProfil->ppdbSiswa->alamat }}</td>
                        </tr>
                        <tr>
                            <th>Sifat</th>
                            <td>{{ ucfirst($dataProfil->ppdbSiswa->sifat) }}</td>
                        </tr>
                        <tr>
                            <th>Username Siswa</th>
                            <td>{{ $dataProfil->userSiswa->name }}</td>
                        </tr>
                        <tr>
                            <th>Email Siswa</th>
                            <td>{{ $dataProfil->userSiswa->email }}</td>
                        </tr>
                    @endforeach

                    <tfoot>
                        <tr>
                            <th colspan="2">
                                <a data-toggle="modal" data-target="#logoutModal" class="btn btn-sm btn-secondary text-white">
                                    <i class="ti-layout-sidebar-left"></i> Keluar
                                </a>
                                @if (auth()->user()->jenis != 'siswa')
                                    <button type="button" class="btn btn-sm btn-warning"
                                            data-toggle="modal" data-target="#editSiswaModal">Ubah</button>
                                @else
                                @endif

                                <button type="button" class="btn btn-sm btn-warning"
                                        data-toggle="modal" data-target="#editPasswordModal">Ubah Password</button>
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Basic table card end -->

@include('pages.admin.profil.siswa.edit')
@include('pages.admin.profil.siswa.editPassword')

@endsection
