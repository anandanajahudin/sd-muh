@extends('layout.guest.main')
@section('content-title', 'Detail TV')

@section('content')
<section class="tv-full" id="tv-full">
    <div class="container col-md-8">
        <header class="section-header">
            <h2>BERITA</h2>
            <p>
                <span class="blog">24</span>
                <span class="blog" style="color: #539165;">TV</span>
            </p>
        </header>
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12 sm-12 mb-4 course d-lg-flex ftco-animate justify-content-center">
                        <div class="container-fluid bg-light">
                            <p class="tv-title">{{ $berita->judul }}</p>
                            <div class="card-body">
                                <div class="img">
                                    <iframe width="100%" src="https://www.youtube.com/embed/{{ $berita->link_vidio }}"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        allowfullscreen></iframe>
                                </div>
                                <div class="p-2 d-flex justify-content-between align-items-center" style="background-color: #eee;">
                                    <span>
                                        <i class="fas fa-user-alt"></i> {{ $berita->userPost->name }}
                                        &nbsp;/&nbsp; <i class="fas fa-calendar-alt"></i>
                                        {{ date('d M Y', strtotime($berita->created_at)) }}
                                    </span>
                                </div>

                                {!! $berita->deskripsi !!}
                            </div>
                        </div>
                    </div>
                </div>
        </div>
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
