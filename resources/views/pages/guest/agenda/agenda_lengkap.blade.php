@extends('layout.guest.main')
@section('content-title', 'Detail Berita')

@section('content')
<section class="news-full" id="news-full">
    <div class="container col-md-8">
        <header class="section-header">
            <p>AGENDA <span class="blog">24</span></p>
        </header>
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12 sm-12 mb-4 course d-lg-flex ftco-animate justify-content-center">
                        <div class="container-fluid bg-light">
                            <p class="news-title">{{ $agenda->judul }}</p>
                            <div class="card-body">
                                <img src="{{ asset('repo/berita/dataAgenda/'.$agenda->id.'/'.$agenda->gambar) }}" class="img-fluid" alt="Responsive image">
                                <div class="p-2 d-flex justify-content-between align-items-center">
                                    <span>
                                        <i class="fas fa-user-alt"></i> {{ $agenda->userPost->name }}
                                        &nbsp;/&nbsp; <i class="fas fa-calendar-alt"></i>
                                        {{ date('d M Y', strtotime($agenda->created_at)) }}
                                    </span>
                                </div>
                                {!! $agenda->deskripsi !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('meta-custom')
    <!-- ====================== -->
    <!-- META BERITA -->
    <!-- ====================== -->
    @php
        // URL final
        $shareUrl = $berita->slug
            ? $berita->landingUrl()
            : $berita->landingUrl();

        // Gambar berita sesuai jenis
        switch ($berita->jenis) {
            case 'agenda':
                $imagePath = 'repo/berita/dataAgenda/'.$berita->id.'/'.$berita->gambar;
                break;
            case 'berita':
                $imagePath = 'repo/berita/dataBerita/'.$berita->id.'/'.$berita->gambar;
                break;
            case 'opini':
                $imagePath = 'repo/berita/dataOpini/'.$berita->id.'/'.$berita->gambar;
                break;
            default:
                $imagePath = 'repo/berita/dataTv/'.$berita->id.'/'.$berita->gambar;
        }

        $imageUrl = asset($imagePath);
    @endphp

    {{-- BASIC SEO --}}
    <title>{{ $berita->judul }}</title>
    <meta name="description" content="{{ Str::limit(strip_tags($berita->deskripsi), 160) }}">

    {{-- OPEN GRAPH (WA, FB, IG) --}}
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $berita->judul }}">
    <meta property="og:description" content="{{ Str::limit(strip_tags($berita->deskripsi), 160) }}">
    <meta property="og:url" content="{{ $shareUrl }}">
    <meta property="og:image" content="{{ $imageUrl }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    {{-- TWITTER CARD (bonus) --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $berita->judul }}">
    <meta name="twitter:description" content="{{ Str::limit(strip_tags($berita->deskripsi), 160) }}">
    <meta name="twitter:image" content="{{ $imageUrl }}">
@endsection
