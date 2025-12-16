@extends('layout.guest.main')
@section('content-title', 'Berita 24')

@section('content')
    <section class="trending" id="trending">
        <div class="container" data-aos="fade-up">
            <header class="section-header" style="margin-top: 50px">
                <p>TRENDING <span class="blog" style="color: #539165;">24</span></p>
            </header>
            <div class="trending-area fix">
                <div class="trending-main">
                    <div class="row mt-40">
                        <div class="col-lg-12">
                            <!-- Trending Top -->
                            <div class="trending-top mb-30">
                                <div class="row">
                                    <div class="col-md-12">
                                        @foreach ($beritaLast as $beritaLast)
                                            <div class="trend-top-img">
                                                <a href="{{ route('newsDetail', $beritaLast->id) }}">
                                                    <img src="{{ asset('repo/berita/dataBerita/' . $beritaLast->id . '/' . $beritaLast->gambar) }}"
                                                        alt="" width="100%" height="100%">
                                                    <div class="trend-top-cap">
                                                        {{-- <span>Kelas 5</span> --}}
                                                        <h2>{{ $beritaLast->judul }}
                                                </a></h2>
                                            </div>
                                            </a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Trending Bottom -->
                        <div class="trending-bottom mt-3">
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
                                                    {{-- <p class="card-text mb-4">
                                                        Is a manmade waterway dug in the early 1600's and
                                                    now displays many landmark commercial locals and vivid neon signs.
                                                    </p> --}}
                                                    <a href="#" class="mt-auto align-self-start"></a>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Right content -->
                    {{-- <div class="col-lg-6">
                            <div class="trand-right-single d-flex">
                                <div class="trand-right-img">
                                    <img src="{{ asset('front/img/images/course-1.jpg') }}" alt="" width="100%" height="100%">
                                </div>
                                <div class="trand-right-cap">
                                    <span class="color1">Kelas 2</span>
                                    <h4><a href="{{ route('newsDetail') }}">Serunya Lomba HUT RI di Sekolah Karakter SDM 24 Surabaya</a>
                                    </h4>
                                </div>
                            </div>
                            <div class="trand-right-single d-flex">
                                <div class="trand-right-img">
                                    <img src="{{ asset('front/img/images/course-2.jpg') }}" alt="" width="100%" height="100%">
                                </div>
                                <div class="trand-right-cap">
                                    <span class="color3">Kelas 5</span>
                                    <h4><a href="{{ route('newsDetail') }}">Serunya Lomba HUT RI di Sekolah Karakter SDM 24 Surabaya</a>
                                    </h4>
                                </div>
                            </div>
                            <div class="trand-right-single d-flex">
                                <div class="trand-right-img">
                                    <img src="{{ asset('front/img/images/course-3.jpg') }}" alt="" width="100%" height="100%">
                                </div>
                                <div class="trand-right-cap">
                                    <span class="color2">Kelas 4</span>
                                    <h4><a href="{{ route('newsDetail') }}">Serunya Lomba HUT RI di Sekolah Karakter SDM 24 Surabaya</a>
                                    </h4>
                                </div>
                            </div>
                            <div class="trand-right-single d-flex">
                                <div class="trand-right-img">
                                    <img src="{{ asset('front/img/images/course-3.jpg') }}" alt="" width="100%" height="100%">
                                </div>
                                <div class="trand-right-cap">
                                    <span class="color4">Kelas 6</span>
                                    <h4><a href="{{ route('newsDetail') }}">Serunya Lomba HUT RI di Sekolah Karakter SDM 24 Surabaya</a>
                                    </h4>
                                </div>
                            </div> --}}
                    {{-- <div class="trand-right-single d-flex">
                                    <div class="trand-right-img">
                                        <img src="assets/img/images/course-11.jpg" alt="" width="100%" height="100%">
                                    </div>
                                    <div class="trand-right-cap">
                                        <span class="color1">Skeping</span>
                                        <h4><a href="details.html">Welcome To The Best Model Winner Contest</a></h4>
                                    </div>
                                </div> --}}
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>

    <!-- ======= Recent Blog Posts Section ======= -->
    <section id="berita-tv" class="berita-tv bg-light">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <p>24 <span class="blog">TV</span></p>
            </header>
            <div class="row">
                @foreach ($beritaTv as $beritaTv)
                    <div class="col-lg-4">
                        <div class="post-box">
                            <div class="post-img">
                                <iframe width="100%" height="315"
                                    src="https://www.youtube.com/embed/{{ $beritaTv->link_vidio }}"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen></iframe>
                            </div>
                            <span class="post-date">
                                <i class="fas fa-user-alt"></i> {{ $beritaTv->userPost->name }}
                                &nbsp;/&nbsp; <i class="fas fa-calendar-alt"></i>
                                {{ date('d M Y', strtotime($beritaTv->created_at)) }}
                            </span>
                            <a href="{{ route('tvDetail', $beritaTv->id) }}">
                                <h3 class="post-title">{{ $beritaTv->judul }}</h3>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section><!-- End Recent Blog Posts Section -->
@endsection
