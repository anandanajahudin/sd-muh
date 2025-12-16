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
                            <td>{{ $dataProfil->nama }}</td>
                        </tr>
                        <tr>
                            <th>Kelas</th>
                            <td>{{ $dataProfil->kelas }}</td>
                        </tr>
                        <tr>
                            <th>Username</th>
                            <td>{{ $dataProfil->user->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $dataProfil->user->email }}</td>
                        </tr>
                    @endforeach

                    <tfoot>
                        <tr>
                            <th colspan="2">
                                <a data-toggle="modal" data-target="#logoutModal" class="btn btn-sm btn-secondary text-white">
                                    <i class="ti-layout-sidebar-left"></i> Keluar
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Basic table card end -->

@endsection
