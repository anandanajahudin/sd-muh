@extends('layout.guest.main')
@section('content-title', 'Mengapa 24')

@section('content')
{{-- <section id="portfolio" class="portfolio">
    <div class="container" data-aos="fade-up">
        <header class="section-header">
            <h2>BERPRESTASI</h2>
            <p>PRESTASI SISWA <span class="pr">SD KARAKTER 24</span></p>
        </header>
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
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
    </div>
</section> --}}

    <!-- ======= Values Section ======= -->
    <section id="values" class="values">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <p>MENGAPA HARUS <span class="sklh"><br>SEKOLAH KARAKTER 24</span> SURABAYA?</p>
            </header>
            <div class="row">
                <div class="col-lg-3 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="200" data-tilt>
                    <div class="box">
                        <img src="{{ asset('front/img/images/moon.png') }}" class="img-fluid" alt="">
                        {{-- <h3>Unggul</h3> --}}
                        <p>SEKOLAH KARAKTER SD MUHAMMADIYAH 24 SURABAYA merupakan Sekolah Islam Unggulan yang didirikan oleh Muhammadiyah pada 9 Maret tahun 1978.</p>
                    </div>
                </div>
                <div class="col-lg-3 mt-4 mt-lg-0"" data-aos="fade-up" data-aos-delay="200" data-tilt>
                    <div class="box2">
                        <img src="{{ asset('front/img/images/family-tree.png') }}" class="img-fluid" alt="">
                        {{-- <h3>Berkarakter</h3> --}}
                        <p>Pendirian SEKOLAH KARAKTER merupakan respon terhadap tantangan generasi masa depan Indonesia yang semakin kompleks, sehingga penting untuk mempersiapkan Generasi Unggul dan Terbaik agar dapat menjawab tantangan masa depan.</p>
                    </div>
                </div>
                <div class="col-lg-3 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400" data-tilt>
                    <div class="box3">
                        <img src="{{ asset('front/img/images/brain.png') }}" class="img-fluid text-white"
                            alt="">
                        {{-- <h3>Berprestasi</h3> --}}
                        <p>Visi Menjadi Sekolah Unggul yang Berkarakter dan Berprestasi menjadi pijakan SEKOLAH KARAKTER dalam menyelenggarakan, mengembangkan, serta optimalisasi semua potensi yang dimiliki warga sekolah.</p>
                    </div>
                </div>
                <div class="col-lg-3 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600" data-tilt>
                    <div class="box4">
                        <img src="{{ asset('front/img/images/good-mood.png') }}" class="img-fluid" alt="">
                        {{-- <h3>Mendunia</h3> --}}
                        <p>Melalui Pendidikan Karakter yang Kontekstual (Contextual), Menyenangkan (Joyfull) dan Bermakna (Meaningful), SEKOLAH KARAKTER terus berupaya menanamkan nilai-nilai kehidupan dan optimalisasi potensi anak melalui 5 Pilar DEBEST (Qurani, Saintek, Literasi, Sport & Art dan Social Responcibility) dan Penyemaian 6 Bintang Karakter yang dikemas secara sistematis, metodis dan terukur dalam Kurikulum 24.</p>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Values Section -->
@endsection
