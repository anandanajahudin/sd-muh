@extends('layout.admin.main')

@section('title', 'Muhasabah Saya | SekolahKarakter24')

@section('sidebar')
    @include('layout.admin.partials.sidebar.muhasabah')
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
            @php
                $hariIni = date('Y/m/d');
            @endphp
            <h5>
                Muhasabah Saya - {{ date('d M Y', strtotime($hariIni)) }}
                <a href="{{ route('daftarMuhasabah', auth()->user()->id) }}" class="btn btn-primary btn-round btn-sm">Lihat
                    Semua</a>
            </h5>
        </div>

        <div class="card-body">
            @if ($cekHarian == false)
                @include('pages.admin.muhasabah.partials.baru')
            @else
                @include('pages.admin.muhasabah.partials.lanjutan')
            @endif
        </div>
    </div>
    <!-- Basic table card end -->

@endsection
