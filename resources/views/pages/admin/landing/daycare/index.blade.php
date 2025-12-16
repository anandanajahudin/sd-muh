@extends('layout.admin.main')

@section('title', 'Daycare | SekolahKarakter24')

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
            <h5>Profil Saya</h5>
        </div>

        <div class="card-block">
            <div class="form-group mt-3">
                <label class="form-label">Keterangan</label>
                {{ $daycare->nama }}
            </div>
            <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editModal">
                Ubah</button>
        </div>
    </div>
    <!-- Basic table card end -->

    @include('pages.admin.landing.daycare.edit')
    @include('pages.admin.landing.daycare.editGambar')

@endsection
