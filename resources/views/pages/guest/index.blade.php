@extends('layout.guest.main')
@section('content-title', 'Beranda')

@section('content')

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('repo/landing/slideshow/' . $bannerPrimary) }}" class="d-block w-100 opacity-15"
                            alt="...">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('repo/landing/slideshow/' . $bannerSecondary) }}"
                            class="d-block w-100 opacity-15" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
        <!-- End About Section -->

        <section id="about" class="about bg-light">
            <div class="container" data-aos="fade-up">
                <div class="row gx-0">
                    <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                        {{-- <img src="{{ asset('front/img/images/course-6.jpg') }}" class="img-fluid" alt=""> --}}
                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/FY0FbeOWH3I"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    </div>
                    <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                        <div class="content">
                            <h3>Selamat Datang di Sekolah Karakter</h3>
                            <h3>SD Muhammadiyah 24 Surabaya</h3>
                            {!! $keterangan !!}

                            <div class="text-center text-lg-start">
                                <a href="{{ route('profil') }}" class="btn-read-more mr-2">
                                    <span class="keterangan">Strategi Kami</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                                {{-- <a href="{{ url('download') }}" class="btn-read-more">
                                    <span class="keterangan">Download</span>
                                    <i class="bi bi-download"></i>
                                </a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End About Section -->

        <!-- ======= Counts Section ======= -->
        <div id="counts" class="counts">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('programUnggulan') }}">
                        <div class="count-box">
                            <i class="bi bi-mortarboard"></i>
                            <div>
                                <span>Program Unggulan</span>
                                {{-- <span data-purecounter-start="0" data-purecounter-end="18" data-purecounter-duration="1"
                                class="purecounter"></span> --}}
                                <p>Program Unggulan</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    @foreach ($kelasMaster as $kelasMaster)
                        <a href="{{ route('ppdb.detail', $kelasMaster->id) }}">
                            <div class="count-box">
                                <i class="bi bi-people" style="color: #ee6c20;"></i>
                                <div>
                                    <span>Kelas Bilingual</span>
                                    {{-- <span data-purecounter-start="0" data-purecounter-end="352" data-purecounter-duration="1"
                                    class="purecounter"></span> --}}
                                    <p>Kelas Bilingual</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('ekskul') }}">
                        <div class="count-box">
                            <i class="bi bi-emoji-smile" style="color: #15be56;"></i>
                            <div>
                                <span>Ekstrakulikuler</span>
                                {{-- <span data-purecounter-start="0" data-purecounter-end="564" data-purecounter-duration="1"
                                class="purecounter"></span> --}}
                                <p>Ekstrakulikuler</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('daycare') }}">
                        <div class="count-box">
                            <i class="bi bi-star" style="color: #bb0852;"></i>
                            <div>
                                <span>Daycare 24</span>
                                {{-- <span data-purecounter-start="0" data-purecounter-end="300" data-purecounter-duration="1"
                                class="purecounter"></span> --}}
                                <p>Daycare 24</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div><!-- End Counts Section -->

        <!-- ======= Values Section ======= -->
        <section id="values" class="values bg-light">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    {{-- <h2>4 NILAI SEKOLAH KARAKTER</h2> --}}
                    {{-- <p>DI <span class="sklh">SEKOLAH KARAKTER</span> 24 SURABAYA</p> --}}
                    <p>4 NILAI </p>
                    <p><span class="sklh">SEKOLAH KARAKTER 24</span></p>
                    <p>SURABAYA</p>
                </header>
                <div class="row">
                    @foreach ($nilaiSekolah as $nilai)
                        @if ($nilai->id == 1)
                            @php
                                $box = 'box';
                            @endphp
                        @elseif($nilai->id == 2)
                            @php
                                $box = 'box2';
                            @endphp
                        @elseif($nilai->id == 3)
                            @php
                                $box = 'box3';
                            @endphp
                        @else
                            @php
                                $box = 'box4';
                            @endphp
                        @endif

                        <div class="col-lg-3 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="200" data-tilt>
                            <div class="{{ $box }}">
                                <img src="{{ asset('front/img/images/nilai/' . $nilai->logo) }}" class="img-fluid"
                                    alt="">
                                <h3>{{ $nilai->judul }}</h3>
                                <p>{!! $nilai->deskripsi !!}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section><!-- End Values Section -->

        <section id="quotes" class="quotes">
            <div class="container" data-aos="fade-up">
                <h2><b>Visi dan Misi</b></h2>
                <hr />
                <div class="row gx-0">
                    <div class="col-lg-2" data-aos="zoom-out" data-aos-delay="200">
                        <h4><b>Visi</b></h4>
                    </div>
                    <div class="col-lg-9 justify-content-center" data-aos="fade-up" data-aos-delay="200">
                        <blockquote class="blockquote">
                            <p class="pb-3">
                                <i class="fas fa-quote-left fa-xs text-white"></i>
                                <span><i>{{ $visi }}</i></span>
                                <i class="fas fa-quote-right fa-xs text-white"></i>
                            </p>
                        </blockquote>
                    </div>
                    <div class="col-lg-2" data-aos="zoom-out" data-aos-delay="200">
                        <h4><b>Misi</b></h4>
                    </div>
                    <div class="col-lg-9 justify-content-center" data-aos="fade-up" data-aos-delay="200">
                        @foreach ($misi as $misi)
                            <p><i class="fas fa-check fa-xs text-white"></i> {{ $misi->deskripsi }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </section><!-- End About Section -->

        <!-- De-Best -->
        <section id="features" class="features" style="background-color: #f7f8cd;">
            <div class="container" data-aos="fade-up">
                <div class="row feature-icons" data-aos="fade-up">
                    <header>
                        <p>5 PILAR <span class="debest">DEBEST</span></p>
                    </header>
                    <div class="row">
                        <div class="col-xl-4 text-center" data-aos="fade-right" data-aos-delay="100">
                            <img src="{{ asset('front/img/images/de-best.png') }}" class="img-fluid p-4" alt="">
                        </div>
                        <div class="col-xl-4 d-flex content">
                            <div class="row align-self-center gy-2">
                                <div class="col-md-6 icon-box" data-aos="fade-up">
                                    <i class="fa-solid fa-book-quran"></i>
                                    <div>
                                        <h4>QUR'AN</h4>
                                    </div>
                                </div>
                                <div class="col-md-6 mr-10 icon-box" data-aos="fade-up" data-aos-delay="100">
                                    <i class="fa-solid fa-people-group"></i>
                                    <div>
                                        <h4>SOCIAL RESPONSIBILITY</h4>
                                    </div>
                                </div>
                                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                                    <i class="fa fa-atom"></i>
                                    <div>
                                        <h4>SAINTEK</h4>
                                    </div>
                                </div>
                                <div class="col-md-6 mr-10 icon-box" data-aos="fade-up" data-aos-delay="300">
                                    <i class="fa-solid fa-trophy"></i>
                                    <div>
                                        <h4>SPORT & ART</h4>
                                    </div>
                                </div>
                                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                                    <i class="fa-solid fa-book"></i>
                                    <div>
                                        <h4>LITERACY</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 text-center" data-aos="fade-right" data-aos-delay="100">
                            <img src="{{ asset('front/img/images/bintang-karakter.png') }}" class="img-fluid"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Quotes -->
        {{-- <section class="quotes mt-4">
        <div class="container h-50" data-aos="fade-up">
            <div class="row d-flex justify-content-center align-items-center h-50" data-aos="fade-up">
                <div class="card" style="border-radius: 15px; background-color: rgb(196, 240, 240)">
                    <div class="card-body p-5">

                        <div class="text-center mb-4 pb-2 " data-aos="fade-up">
                            <img src="{{ asset('front/img/images/biografi.png') }}" alt="Bulb" width="300px">
                        </div>

                        <figure class="text-center mb-0" data-aos="fade-up">
                            <blockquote class="blockquote">
                                <p class="pb-3">
                                    <i class="fas fa-quote-left fa-xs text-primary"></i>
                                    <span class="lead font-italic" style="font-weight: bold">Apa saja yang bisa
                                        membuat orang Islam yang baik, juga bisa membuatnya menjadi warga negara yang
                                        baik.</span>
                                    <i class="fas fa-quote-right fa-xs text-primary"></i>
                                </p>
                            </blockquote>
                            <figcaption class="blockquote-footer mb-0">
                                K.H. Ahmad Dahlan
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Quotes Section --> --}}

        <!-- ======= 24 News Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <h2>BERITA</h2>
                    <p>24 NEWS</p>
                    {{-- <p>24 <span class="pr">NEWS</span></p> --}}
                </header>
                <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                    @foreach ($berita as $berita)
                        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                            <div class="portfolio-wrap">
                                <img src="{{ asset('repo/berita/dataBerita/' . $berita->id . '/' . $berita->gambar) }}"
                                    class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <h4 class="p-3">{{ $berita->judul }}</h4>
                                    {{-- <p>Kelas 3</p> --}}
                                    <span class="post-date" style="color: #f68c09">
                                        <i class="fas fa-user-alt"></i> {{ $berita->userPost->name }}
                                        &nbsp;/&nbsp; <i class="fas fa-calendar-alt"></i>
                                        {{ date('d M Y', strtotime($berita->created_at)) }}
                                    </span>
                                    <div class="portfolio-links">
                                        <a href="{{ route('newsDetail', $berita->id) }}" title="More Details"><i
                                                class="bi bi-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-lg-12 mt-4 d-flex justify-content-center">
                        <a href="{{ route('news') }}" class="btn btn-success">Lihat Semua</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- End 24 News Section -->

        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials bg-light">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <h2>Testimoni</h2>
                    <p>TESTIMONI <span class="t1">AYAH BUNDA</span></p>
                </header>
                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="200">
                    <div class="swiper-wrapper">
                        @foreach ($testimoniVidio as $testimoniVidio)
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <iframe src="https://www.youtube.com/embed/{{ $testimoniVidio->link }}"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        allowfullscreen></iframe>

                                    <div class="stars mt-3">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i>
                                    </div>
                                    <p>
                                        {{ $testimoniVidio->testimoni }}
                                    </p>
                                </div>
                            </div><!-- End testimonial item -->
                        @endforeach
                        @foreach ($testimoni as $testimoni)
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <div class="profile mt-auto">
                                        {{-- @if ($testimoni->foto == null) --}}
                                        <img src="{{ asset('front/img/images/icon-user.png') }}" class="testimonial-img"
                                            alt="">
                                        {{-- @else
                                            <img src="{{ asset('repo/testimoni/' . $testimoni->foto) }}"
                                                class="testimonial-img" alt="">
                                        @endif --}}
                                        <h3>{{ $testimoni->nama }}</h3>
                                        <h4>{{ $testimoni->pekerjaan->judul }}</h4>
                                    </div>
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <p>
                                        {{ $testimoni->testimoni }}
                                    </p>
                                </div>
                            </div><!-- End testimonial item -->
                        @endforeach
                    </div>
                    <div class="swiper-pagination">
                    </div>
                </div>
            </div>
        </section>
        <!-- End Testimonials Section -->

        <!-- ======= Recent Blog Posts Section ======= -->
        <section id="recent-blog-posts" class="recent-blog-posts">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <h2>BERITA</h2>
                    <p>24 TV Surabaya</p>
                </header>
                <div class="row">
                    @foreach ($beritaTv as $beritaTv)
                        <div class="col-lg-4">
                            <div class="post-box">
                                <div class="post-img">
                                    <iframe width="100%"
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
                <div class="row">
                    <div class="col-lg-12 mt-4 d-flex justify-content-center">
                        <a href="{{ route('tv') }}" class="btn btn-success">Lihat Semua</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Recent Blog Posts Section -->

        <!-- ======= Agenda 24 Section ======= -->
        <section id="portfolio" class="portfolio bg-light">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <h2>BERITA</h2>
                    <p>AGENDA 24</p>
                    {{-- <p>24 <span class="pr">NEWS</span></p> --}}
                </header>
                <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                    @foreach ($agenda as $agenda)
                        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                            <div class="portfolio-wrap">
                                <img src="{{ asset('repo/berita/dataAgenda/' . $agenda->id . '/' . $agenda->gambar) }}"
                                    style="width: 100%; height: 15vw; object-fit: cover;" alt="">
                                <div class="portfolio-info">
                                    <h4>{{ $agenda->judul }}</h4>
                                    {{-- <p>Kelas 3</p> --}}
                                    <span class="post-date" style="color: #f68c09">
                                        <i class="fas fa-user-alt"></i> {{ $agenda->userPost->name }}
                                        &nbsp;/&nbsp; <i class="fas fa-calendar-alt"></i>
                                        {{ date('d M Y', strtotime($agenda->created_at)) }}
                                    </span>
                                    <div class="portfolio-links">
                                        <a href="{{ route('agendaDetail', $agenda->id) }}" title="More Details"><i
                                                class="bi bi-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-lg-12 mt-4 d-flex justify-content-center">
                        <a href="{{ route('agenda') }}" class="btn btn-success">Lihat Semua</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- End 24 News Section -->

        <!-- ======= Gallery Photo ====== -->
        {{-- <section class="slider bg-light">
            <div class="slider" x-data="{ start: true, end: false }" style="padding-top: 10px;">
                <header class="section-header">
                    <h2>DOKUMENTASI</h2>
                    <p>GALERI 24</p>
                </header>
                <div class="slider__content" x-ref="slider"
                    x-on:scroll.debounce="$refs.slider.scrollLeft == 0 ? start = true : start = false; Math.abs(($refs.slider.scrollWidth - $refs.slider.offsetWidth) - $refs.slider.scrollLeft) < 5 ? end = true : end = false;">
                    @foreach ($galeri as $galeri)
                        <div class="slider__item">
                            <img class="slider__image" src="{{ asset('repo/berita/dataBerita/'.$galeri->id.'/'.$galeri->gambar) }}"alt="Image">
                            <div class="slider__info">
                                <a href="{{ route('newsDetail', $galeri->id) }}">
                                    <h2 class="fw-bold">{{ $galeri->judul }}</h2>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="slider__nav" style="display: flex;justify-content: center;">
                    <button class="btn btn-success btn-sm"
                        x-on:click="$refs.slider.scrollBy({left: $refs.slider.offsetWidth * -1, behavior: 'smooth'});"
                        x-bind:class="start ? '' : 'slider__nav__button--active'">Previous</button>
                    <button class="btn btn-success btn-sm"
                        x-on:click="$refs.slider.scrollBy({left: $refs.slider.offsetWidth, behavior: 'smooth'});"
                        x-bind:class="end ? '' : 'slider__nav__button--active'">Next</button>
                </div>
            </div>
        </section> --}}
        <!-- End Gallery -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <p>INGIN KONSULTASI<span class="cus"> DENGAN KAMI ?</span></p>
                    <h2 style="margin-top: 15px;">
                        Kami siap memberikan yang terbaik bagi anak dari Ayah Bunda.
                    </h2>
                    </h2>Apabila ada yang ingin ditanyakan dan disampaikan, kami siap membantu.</h2>
                </header>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                                        {{ $message }}
                                        <button type="button" class="btn-close" autofocus data-bs-dismiss="alert"
                                            aria-label="Close"><i class="ti-close"></i></button>
                                    </div>
                                @endif
                                <form action="{{ route('index.storePesanHome') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row gy-4">
                                        <div class="col-md-12">
                                            <h5>Kirim Pesan / Pertanyaan untuk Kami?</h5>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                                name="nama" id="nama" placeholder="Nama Anda" required>
                                        </div>
                                        <div class="col-md-6 ">
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                id="email" placeholder="E-Mail Anda">
                                        </div>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control @error('telp') is-invalid @enderror"
                                                name="telp" id="telp" oninput="phoneNumbers(this.value)"
                                                placeholder="08xxxxxx" required>
                                        </div>
                                        <div class="col-md-12">
                                            <textarea class="form-control @error('pesan') is-invalid @enderror" name="pesan" id="pesan" rows="6"
                                                placeholder="Pesan" required></textarea>
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn btn-success">Kirim</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="lokasi card">
                            <div class="card-body">
                                <h5 class="mb-3">Lokasi Kami</h5>
                                <div id="map-container-google-1" class="z-depth-1-half map-container"
                                    style="height: 100%">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.4048921578988!2d112.72388527381668!3d-7.308327671850793!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb7808dc2965%3A0xb38e6b043f1a06b2!2sSD%20Muhammadiyah%2024!5e0!3m2!1sid!2sid!4v1686100342702!5m2!1sid!2sid"
                                        width="100%" height="100%" style="border:0;" allowfullscreen=""
                                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i></a>
@endsection

@push('scripts')
    <script>
        function phoneNumbers(text) {
            text = text.replace(/[^0-9]/g, '');
            var inputResult = document.getElementById('telp');
            inputResult.value = text;
        }
    </script>
@endpush
