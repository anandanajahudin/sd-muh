@extends('layout.admin.main')

@section('title', 'Bank Data | SekolahKarakter24')

@section('sidebar')
    @include('layout.admin.partials.sidebar.bank')
@endsection

@section('content')
    <div class="row">
        @if (auth()->user()->jenis == 'admin' ||
                auth()->user()->jenis == 'Kepala Sekolah' ||
                auth()->user()->jenis == 'Bendahara')
            @include('pages.admin.bank_data.admin')

            {{-- siswa --}}
        @elseif (auth()->user()->jenis == 'siswa')
            {{-- guru --}}
        @else
            @include('pages.admin.bank_data.guru')
        @endif

    </div>
@endsection
