@extends('layout.guest.main')
@section('content-title', 'Berita 24')
@section('content')
    <section class="trending" id="trending">
        <div class="container" data-aos="fade-up">
            <header class="section-header" style="margin-top: 50px">
                <h2>BERITA</h2>
                <p>TRENDING <span class="blog" style="color: #539165;">24</span></p>
            </header>
            <div class="trending-area fix">
                <div class="trending-main">
                    <div class="row mt-40">
                        <div class="col-lg-6">
                            <!-- Trending Top -->
                            <div class="trending-top mb-30">
                                <div class="trend-top-img">
                                    <img src="{{ asset('front/img/images/course-1.jpg') }}" alt="" width="100%"
                                        height="100%">
                                    <div class="trend-top-cap">
                                        {{-- <span>Kelas 5</span> --}}
                                        <h2><a href="{{ route('newsDetail') }}">Selamat Datang Di<br> Sekolah Karakter 24 Surabaya</a>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                            <!-- Trending Bottom -->
                            <div class="trending-bottom">
                                <div class="row">
                                    <div class="col-lg-4" style="margin-top: 50px">
                                        <div class="single-bottom mb-35">
                                            <div class="trend-bottom-img mb-30">
                                                <img src="{{ asset('front/img/images/course-2.jpg') }}" alt="" width="100%"
                                                    height="100%">
                                            </div>
                                            <div class="trend-bottom-cap">
                                                <span class="color1">Kelas 1</span>
                                                <h4><a href="{{ route('newsDetail') }}">Peringatan Hari Pahlawan Momentum Semai Karakter
                                                        Generasi Bangsa</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" style="margin-top: 50px">
                                        <div class="single-bottom mb-35">
                                            <div class="trend-bottom-img mb-30">
                                                <img src="{{ asset('front/img/images/course-2.jpg') }}" alt="" width="100%"
                                                    height="100%">
                                            </div>
                                            <div class="trend-bottom-cap">
                                                <span class="color2">Kelas 3</span>
                                                <h4><a href="{{ route('newsDetail') }}">Peringatan Hari Pahlawan Momentum Semai
                                                            Karakter Generasi Bangsa</a>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" style="margin-top: 50px">
                                        <div class="single-bottom mb-35">
                                            <div class="trend-bottom-img mb-30">
                                                <img src="{{ asset('front/img/images/course-2.jpg') }}" alt="" width="100%"
                                                    height="100%">
                                            </div>
                                            <div class="trend-bottom-cap">
                                                <span class="color3">Kelas 1</span>
                                                <h4><a href="{{ route('newsDetail') }}"> Serunya Lomba HUT RI di Sekolah Karakter SDM 24
                                                        Surabaya</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Riht content -->
                        <div class="col-lg-6">
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
                            </div>
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
        </div>
    </section>

    <!-- ======= Recent Blog Posts Section ======= -->
    <section id="berita-tv" class="berita-tv">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <h2>BERITA</h2>
                <p>24 <span class="blog">TV</span></p>
            </header>
            <div class="row">
                <div class="col-lg-4">
                    <div class="post-box">
                        <div class="post-img">
                            <iframe width="100%" height="315" src="https://www.youtube.com/embed/k14_9WD4idM"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                            {{-- <img src="{{ asset('front/img/images/course-1.jpg') }}" alt="" srcset=""> --}}
                        </div>
                        <span class="post-date">4 Oktober 2022</span>
                        <h3 class="post-title">Siswa Kelas 4 Belajar Ragam Flora Tanaman</h3>
                        <a href="{{ route('tvDetail') }}"
                            class="readmore stretched-link mt-auto"><span>Tonton Video</span><i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="post-box">
                        <div class="post-img">
                            <iframe width="100%" height="315" src="https://www.youtube.com/embed/k14_9WD4idM"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        </div>
                        <span class="post-date">4 Oktober 2022</span>
                        <h3 class="post-title">KTS Dengan Tema Ragam Flora Gantung</h3>
                        <a href="{{ route('tvDetail') }}"
                            class="readmore stretched-link mt-auto"><span>Tonton Video</span><i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="post-box">
                        <div class="post-img">
                            <iframe width="100%" height="315" src="https://www.youtube.com/embed/k14_9WD4idM"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        </div>
                        <span class="post-date">4 Oktober 2022</span>
                        <h3 class="post-title">Siswa Kelas 5 Menikmati Belajar di Luar Kelas</h3>
                        <a href="{{ route('tvDetail') }}"
                            class="readmore stretched-link mt-auto"><span>Tonton Video</span><i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Recent Blog Posts Section -->
@endsection
