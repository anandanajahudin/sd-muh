@extends('layout.guest.main')
@section('content-title', '24 News')

@section('content')
    <section class="trending" id="trending">
        <div class="container" data-aos="fade-up">
            <header class="section-header" style="margin-top: 50px">
                <p>24 <span class="blog" style="color: #539165;">NEWS</span></p>
            </header>
            <div class="trending-area fix">
                <div class="trending-main">
                    <!-- Trending Bottom -->
                    <div class="trending-bottom">
                        <div class="row">
                            @foreach ($berita as $berita)
                                <!--ADD CLASSES HERE d-flex align-items-stretch-->
                                <div class="col-lg-3 mb-3 d-flex align-items-stretch">
                                    <a href="{{ route('newsDetail', $berita->id) }}">
                                        <div class="card">
                                            <img src="{{ asset('repo/berita/dataBerita/' . $berita->id . '/' . $berita->gambar) }}"
                                                class="card-img-top" alt="Card Image">
                                            <div class="card-body d-flex flex-column">
                                                <span class="post-date mb-2" style="color: #f68c09">
                                                    <i class="fas fa-user-alt"></i> {{ $berita->userPost->name }}
                                                    &nbsp;/&nbsp; <i class="fas fa-calendar-alt"></i>
                                                    {{ date('d M Y', strtotime($berita->created_at)) }}
                                                </span>
                                                <h5 class="card-title mt-2">{{ $berita->judul }}</h5>
                                                <a href="#" class="mt-auto align-self-start"></a>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
