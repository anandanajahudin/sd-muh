@extends('layout.admin.main')

@section('title', 'Data Muhasabah | SekolahKarakter24')

@section('sidebar')
    @include('layout.admin.partials.sidebar.muhasabah')
@endsection

@section('content')

    <!-- Basic table card start -->
    <div class="card">
        <div class="card-header">
            <h5>
                Muhasabah Saya - {{ date('d M Y', strtotime($muhasabahku->tgl_muhasabah)) }}
                <a href="{{ route('daftarMuhasabah', auth()->user()->id) }}" class="btn btn-primary btn-round btn-sm">Lihat
                    Semua</a>
            </h5>
        </div>

        <div class="card-body">
            @include('pages.admin.muhasabah.partials.lanjutan')
        </div>
    </div>
    <!-- Basic table card end -->

@endsection
