@extends('layout.guest.main')
@section('content-title', 'Profil')

@section('content')
    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <p>TENTANG <span class="pr">KAMI</span></p>
            </header>
            <div class="row feture-tabs" style="margin-top: 100px;" data-aos="fade-up">
                <div class="col-lg-6">
                    <h3>
                        Selamat Datang di Sekolah Karakter
                        <span class="txt">SD Muhammadiyah 24 Surabaya</span>
                    </h3>
                    <!-- Tabs -->
                    {{-- <ul class="nav nav-pills mb-3">
                        <li>
                            <h5 class="tg" style="margin-top: 30px">Tentang Kami</h5>
                        </li>
                    </ul><!-- End Tabs --> --}}
                    <!-- Tab Content -->
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab1">
                            {!! $deskripsi !!}
                        </div><!-- End Tab 1 Content -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/FY0FbeOWH3I"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                </div>
            </div><!-- End Feature Tabs -->
        </div>
    </section>
    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <p>Visi & Misi Kami : <br>
                {{-- <span class="pr">Menjadi Sekolah Unggul, Berkarakter dan Berprestasi</span></p> --}}
            </header>
            <div class="row gy-4">
                <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-box orange">
                        <img src="{{ asset('front/img/images/win.png') }}" class="img-fluid mb-3" alt="" width="100px"
                            height="100px">
                        <h3>Visi kami :</h3>
                        <h3>{{ $visi }}</h3>
                        {{-- <span class="pr">Menjadi Sekolah Unggul, Berkarakter dan Berprestasi</span> --}}
                    </div>
                </div>
                <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
                    <h3 class="text-center">Misi kami :</h3>
                    <div class="row gy-4">
                        @foreach ($misiAtas as $misiAtas)
                            @php
                                $gambar = '';
                                if ($misiAtas->id == 1) { $gambar = 'planningc'; }
                                else if($misiAtas->id == 2) { $gambar = 'learningc'; }
                                else { $gambar = 'communityc'; }
                            @endphp

                            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                                <div class="service-box blue">
                                    <img src="{{ asset('front/img/images/'.$gambar.'.png') }}" class="img-fluid mb-3" alt=""
                                        width="100px" height="100px">
                                    <h3>{{ $misiAtas->deskripsi }}</h3>
                                </div>
                            </div>
                        @endforeach

                        @foreach ($misiBawah as $misiBawah)
                            @php
                                $gambar = '';
                                if ($misiBawah->id == 4) { $gambar = 'shalat'; }
                                else if($misiBawah->id == 5) { $gambar = 'celebrating'; }
                                else { $gambar = 'communityc'; }
                            @endphp

                            <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="500">
                                <div class="service-box green">
                                    <img src="{{ asset('front/img/images/'.$gambar.'.png') }}" class="img-fluid mb-3" alt=""
                                        width="100px" height="100px">
                                    <h3>{{ $misiBawah->deskripsi }}</h3>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Services Section -->

    <!-- ======= 24 News Section ======= -->
    {{-- <section id="portfolio" class="portfolio">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <h2>PENCAPAIAN</h2>
                <p>PRESTASI SISWA <span class="pr">SD KARAKTER 24</span></p>
            </header>
            <div id="carouselExampleCaptions" class="carousel slide">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="{{ asset('front/img/images/course-2.jpg') }}" class="d-block w-100"
                            alt="Sunset Over the City" />
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Juara 1 EcoGreen Tingkat Kota</h5>
                      <p>Some representative placeholder content for the first slide.</p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('front/img/images/course-2.jpg') }}" class="d-block w-100"
                            alt="Sunset Over the City" />
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Juara 1 EcoGreen Tingkat Kota</h5>
                      <p>Some representative placeholder content for the second slide.</p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('front/img/images/course-2.jpg') }}" class="d-block w-100"
                            alt="Sunset Over the City" />
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Juara 1 EcoGreen Tingkat Kota</h5>
                      <p>Some representative placeholder content for the third slide.</p>
                    </div>
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
        </div>
    </section><!-- End 24 News Section --> --}}
@endsection
