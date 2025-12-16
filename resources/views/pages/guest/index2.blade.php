@extends('layout.guest.main')
@section('content-title', 'Beranda')

@section('content')

<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">Membentuk Generasi Berkarakter, Berprestasi, Mendunia</h1>
                <div data-aos="fade-up" data-aos-delay="600">
                    <div class="text-center text-lg-start">
                        <a href="#about"
                            class="btn-get-started scrollto d-inline-flex align-items-center justify-content-end align-self-center">
                            <span>Mulai</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 hero-img" data-aos="zoom-out" data-aos-delay="100">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    {{-- <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div> --}}
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            {{-- <iframe width="100%" height="500" src="https://www.youtube.com/embed/NLmmbel3kzY"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe> --}}
                            <img src="{{ asset('repo/landing/slideshow/WebSlide1.jpg') }}"
                                class="d-block w-100 opacity-15" alt="...">
                            {{-- <img src="{{ asset('front/img/images/course-5.jpg') }}" class="d-block w-100
                            opacity-15"
                            alt="..."> --}}
                            <div class="carousel-caption d-none d-md-block">
                            </div>
                        </div>
                        <div class="carousel-item">
                            {{-- <iframe width="100%" height="500" src="https://www.youtube.com/embed/NLmmbel3kzY"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe> --}}
                            <img src="{{ asset('repo/landing/slideshow/WebSlide2.jpg') }}"
                                class="d-block w-100 opacity-15" alt="...">
                            {{-- <img src="{{ asset('front/img/images/course-5.jpg') }}" class="d-block w-100
                            opacity-15"
                            alt="..."> --}}
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

            </div>
        </div>
    </div>
</section>
<!-- End Hero -->

<main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('repo/landing/slideshow/WebSlide1.jpg') }}" class="d-block w-100 opacity-15"
                        alt="...">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('repo/landing/slideshow/WebSlide2.jpg') }}" class="d-block w-100 opacity-15"
                        alt="...">
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
                    <img src="{{ asset('front/img/images/course-6.jpg') }}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="content">
                        <h3>Selamat Datang di Sekolah Karakter 24 Surabaya</h3>
                        <h2 class="ph">Sekolah Karakter menjadi respon terhadap tantangan
                            generasi masa depan Indonesia yang semakin kompleks, sehingga penting untuk mempersiapkan
                            Generasi Unggul dan Terbaik agar dapat menjawab tantangan masa depan.</h2>
                        <p>
                            Cita-cita kami untuk menjadi Sekolah Unggul yang berprestasi menjadi pijakan SEKOLAH
                            KARAKTER dalam menyelenggarakan, mengembangkan, serta optimalisasi semua potensi yang
                            dimiliki warga sekolah.
                        </p>
                        <div class="text-center text-lg-start">
                            <a href="{{ route('profil') }}" class="btn-read-more">
                                <span class="keterangan">Strategi Kami</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End About Section -->

    <!-- ======= Values Section ======= -->
    <section id="values" class="values">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <h2>4 NILAI SEKOLAH KARAKTER</h2>
                <p>DI <span class="sklh">SEKOLAH KARAKTER</span> 24 SURABAYA</p>
            </header>
            <div class="row">
                <div class="col-lg-3 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="200" data-tilt>
                    <div class="box">
                        <img src="{{ asset('front/img/images/superior.png') }}" class="img-fluid" alt="">
                        <h3>Unggul</h3>
                        <p>Komitmen kami bersama anda untuk mendidik calon penerus bangsa yang bersaing dan cerdas.</p>
                    </div>
                </div>
                <div class="col-lg-3 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="200" data-tilt>
                    <div class="box2">
                        <img src="{{ asset('front/img/images/role.png') }}" class="img-fluid" alt="">
                        <h3>Berkarakter</h3>
                        <p>Mendidik calon penerus bangsa yang berbudi pekerti luhur.</p>
                    </div>
                </div>
                <div class="col-lg-3 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400" data-tilt>
                    <div class="box3">
                        <img src="{{ asset('front/img/images/award.png') }}" class="img-fluid text-white" alt="">
                        <h3>Berprestasi</h3>
                        <p>Membangun pola pikir calon penerus bangsa yang tidak hanya menjadi lebih baik namun menjadi
                            yang terbaik.</p>
                    </div>
                </div>
                <div class="col-lg-3 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600" data-tilt>
                    <div class="box4">
                        <img src="{{ asset('front/img/images/team.png') }}" class="img-fluid" alt="">
                        <h3>Mendunia</h3>
                        <p>Harapan kami tidak hanya mengiringi langkah calon penerus bangsa, namun juga membawa mereka
                            menuju tujuan terbaik mereka.</p>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Values Section -->

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
                        <img src="{{ asset('front/img/images/bintang-karakter.png') }}" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quotes -->
    <section class="quotes mt-4">
        <div class="container h-50" data-aos="fade-up">
            <div class="row d-flex justify-content-center align-items-center h-50" data-aos="fade-up">
                {{-- <div class="col col-lg-12 col-xl-12"> --}}
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
        </div>
    </section><!-- End Quotes Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <p><span class="duapuluh">20 YEARS</span> OF EXPERIENCE</p>
            </header>
            <div class="row gy-4">
                <div class="col-lg-3 col-md-6">
                    <div class="count-box">
                        <i class="bi bi-mortarboard"></i>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="18" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Certified Teacher</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="count-box">
                        <i class="bi bi-people" style="color: #ee6c20;"></i>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="352" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Successful Kids</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="count-box">
                        <i class="bi bi-emoji-smile" style="color: #15be56;"></i>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="564" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Happy Parents</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="count-box">
                        <i class="bi bi-star" style="color: #bb0852;"></i>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="300" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Award Won</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Counts Section -->

    <!-- ======= 24 News Section ======= -->
    <section id="portfolio" class="portfolio bg-light">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <h2>BERITA</h2>
                <p>24 <span class="pr">NEWS</span></p>
            </header>
            </header>
            <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                        <img src="{{ asset('front/img/images/image-5.jpg') }}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Kegiatan Study Tour (SBY ZOO)</h4>
                            <p>Kelas 3</p>
                            <div class="portfolio-links">
                                <a href="/news_lengkap" title="More Details"><i class="bi bi-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <div class="portfolio-wrap">
                        <img src="{{ asset('front/img/images/image-1.jpg') }}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Kegiatan Study Tour (Kebun Mangrove)</h4>
                            <p>Kelas 4</p>
                            <div class="portfolio-links">
                                <a href="/news_lengkap" title="More Details"><i class="bi bi-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                        <img src="{{ asset('front/img/images/image-6.jpg') }}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Pengenalan Tentang Tanaman Mangrove</h4>
                            <p>Kelas 3</p>
                            <div class="portfolio-links">
                                <a href="/news_lengkap" title="More Details"><i class="bi bi-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <div class="portfolio-wrap">
                        <img src="{{ asset('front/img/images/course-1.jpg') }}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Sesi Pembelajaran Outclass</h4>
                            <p>Kelas 4</p>
                            <div class="portfolio-links">
                                <a href="/news_lengkap" title="More Details"><i class="bi bi-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <div class="portfolio-wrap">
                        <img src="{{ asset('front/img/images/course-2.jpg') }}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Mempelajari Flora Tanam</h4>
                            <p>Kegiatan Kelas 3</p>
                            <div class="portfolio-links">
                                <a href="/news_lengkap" title="More Details"><i class="bi bi-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                        <img src="{{ asset('front/img/images/backg_3.jpg') }}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Pentas GMT</h4>
                            <p>Kelas 6</p>
                            <div class="portfolio-links">
                                <a href="/news_lengkap" title="More Details"><i class="bi bi-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="{{ asset('front/img/portfolio/portfolio-7.jpg')}}" class="img-fluid" alt="">
                <div class="portfolio-info">
                    <h4>Card 1</h4>
                    <p>Card</p>
                    <div class="portfolio-links">
                        <a href="{{ asset('front/img/portfolio/portfolio-7.jpg')}}" data-gallery="portfolioGallery"
                            class="portfokio-lightbox" title="Card 1"><i class="bi bi-plus"></i></a>
                        <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
                <img src="{{ asset('front/img/portfolio/portfolio-8.jpg')}}" class="img-fluid" alt="">
                <div class="portfolio-info">
                    <h4>Card 3</h4>
                    <p>Card</p>
                    <div class="portfolio-links">
                        <a href="{{ asset('front/img/portfolio/portfolio-8.jpg')}}" data-gallery="portfolioGallery"
                            class="portfokio-lightbox" title="Card 3"><i class="bi bi-plus"></i></a>
                        <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
                <img src="{{ asset('front/img/portfolio/portfolio-9.jpg')}}" class="img-fluid" alt="">
                <div class="portfolio-info">
                    <h4>Web 3</h4>
                    <p>Web</p>
                    <div class="portfolio-links">
                        <a href="{{ asset('front/img/portfolio/portfolio-9.jpg')}}" data-gallery="portfolioGallery"
                            class="portfokio-lightbox" title="Web 3"><i class="bi bi-plus"></i></a>
                        <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                    </div>
                </div>
            </div>
        </div> --}}
        </div>
        </div>
    </section><!-- End 24 News Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <h2>Testimonials</h2>
                <p>TESTIMONI <span class="t1">AYAH BUNDA</span></p>
            </header>
            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="200">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit
                                rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam,
                                risus at semper.
                                {{-- <iframe src="https://www.youtube.com/embed/gx40AvylMJA" title="YouTube video player"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen></iframe> --}}
                            </p>
                            <div class="profile mt-auto">
                                <img src="{{ asset('front/img/images/teacher_7.jpg') }}" class="testimonial-img" alt="">
                                <h3>Saul Goodman</h3>
                                <h4>Ceo &amp; Founder</h4>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit
                                rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam,
                                risus at semper.
                                {{-- <iframe src="https://www.youtube.com/embed/gx40AvylMJA" title="YouTube video player"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen></iframe> --}}
                            </p>
                            <div class="profile mt-auto">
                                <img src="{{ asset('front/img/images/teacher_4.jpg') }}" class="testimonial-img" alt="">
                                <h3>Sara Wilsson</h3>
                                <h4>Designer</h4>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit
                                rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam,
                                risus at semper.
                                {{-- <iframe src="https://www.youtube.com/embed/gx40AvylMJA" title="YouTube video player"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen></iframe> --}}
                            </p>
                            <div class="profile mt-auto">
                                <img src="{{ asset('front/img/images/teacher_3.jpg') }}" class="testimonial-img" alt="">
                                <h3>Jena Karlis</h3>
                                <h4>Store Owner</h4>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit
                                rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam,
                                risus at semper.
                                {{-- <iframe src="https://www.youtube.com/embed/gx40AvylMJA" title="YouTube video player"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen></iframe> --}}
                            </p>
                            <div class="profile mt-auto">
                                <img src="{{ asset('front/img/images/teacher_2.jpg') }}" class="testimonial-img" alt="">
                                <h3>Matt Brandon</h3>
                                <h4>Freelancer</h4>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit
                                rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam,
                                risus at semper.
                                {{-- <iframe src="https://www.youtube.com/embed/gx40AvylMJA" title="YouTube video player"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen></iframe> --}}
                            </p>
                            <div class="profile mt-auto">
                                <img src="{{ asset('front/img/images/teacher6.jpg') }}" class="testimonial-img" alt="">
                                <h3>John Larson</h3>
                                <h4>Entrepreneur</h4>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Team Section ======= -->
    {{-- <section id="team" class="team bg-light">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <h2>PTK 24</h2>
                <p>TENAGA <span class="kependidikan">KEPENDIDIKAN</span></p>
            </header>

            <div class="row gy-4">

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="member">
                        <div class="member-img">
                            <img src="{{ asset('front/img/images/teacher.jpg') }}" class="img-fluid"
    alt="">
    <div class="social">
        <a href=""><i class="bi bi-twitter"></i></a>
        <a href=""><i class="bi bi-facebook"></i></a>
        <a href=""><i class="bi bi-instagram"></i></a>
        <a href=""><i class="bi bi-linkedin"></i></a>
    </div>
    </div>
    <div class="member-info">
        <h4>Norma Setyaningrum</h4>
        <span>Kepala Sekolah</span>
        <p>Velit aut quia fugit et et. Dolorum ea voluptate vel tempore tenetur ipsa quae aut. Ipsum
            exercitationem iure minima enim corporis et voluptate.</p>
    </div>
    </div>
    </div>

    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
        <div class="member">
            <div class="member-img">
                <img src="{{ asset('front/img/images/teacher_2.jpg') }}" class="img-fluid" alt="">
                <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
            <div class="member-info">
                <h4>Rizqi Samsul Abidin</h4>
                <span>Guru PJOK</span>
                <p>Quo esse repellendus quia id. Est eum et accusantium pariatur fugit nihil minima suscipit
                    corporis. Voluptate sed quas reiciendis animi neque sapiente.</p>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
        <div class="member">
            <div class="member-img">
                <img src="{{ asset('front/img/images/teacher_3.jpg') }}" class="img-fluid" alt="">
                <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
            <div class="member-info">
                <h4>Fulan bin Abu Fulan</h4>
                <span>Guru</span>
                <p>Vero omnis enim consequatur. Voluptas consectetur unde qui molestiae deserunt. Voluptates
                    enim aut architecto porro aspernatur molestiae modi.</p>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
        <div class="member">
            <div class="member-img">
                <img src="{{ asset('front/img/images/teacher_4.jpg') }}" class="img-fluid" alt="">
                <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
            <div class="member-info">
                <h4>Fulanah bin Abu Fulanah</h4>
                <span>Guru</span>
                <p>Rerum voluptate non adipisci animi distinctio et deserunt amet voluptas. Quia aut aliquid
                    doloremque ut possimus ipsum officia.</p>
            </div>
        </div>
    </div>

    </div>

    </div>

    </section><!-- End Team Section --> --}}

    <!-- ======= Recent Blog Posts Section ======= -->
    <section id="recent-blog-posts" class="recent-blog-posts">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <h2>BERITA</h2>
                <p>24 <span class="blog">TV</span></p>
            </header>
            <div class="row">
                <div class="col-lg-4">
                    <div class="post-box">
                        <div class="post-img">
                            {{-- <iframe width="100%" src="https://www.youtube.com/embed/B1Rxlu0rzPI"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe> --}}
                            <img src="{{ asset('front/img/images/course-1.jpg') }}" alt="" srcset="">
                        </div>
                        <span class="post-date">4 Oktober 2022</span>
                        <h3 class="post-title">Siswa Kelas 4 Belajar Ragam Flora Tanaman</h3>
                        <a href="https://www.youtube.com/embed/B1Rxlu0rzPI"
                            class="readmore stretched-link mt-auto"><span>Tonton Video</span><i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="post-box">
                        <div class="post-img">
                            {{-- <iframe width="100%" src="https://www.youtube.com/embed/B1Rxlu0rzPI"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe> --}}
                            <img src="{{ asset('front/img/images/course-1.jpg') }}" alt="" srcset="">
                        </div>
                        <span class="post-date">4 Oktober 2022</span>
                        <h3 class="post-title">KTS Dengan Tema Ragam Flora Gantung</h3>
                        <a href="https://www.youtube.com/embed/B1Rxlu0rzPI"
                            class="readmore stretched-link mt-auto"><span>Tonton Video</span><i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="post-box">
                        <div class="post-img">
                            {{-- <iframe width="100%" src="https://www.youtube.com/embed/B1Rxlu0rzPI"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe> --}}
                            <img src="{{ asset('front/img/images/course-1.jpg') }}" alt="" srcset="">
                        </div>
                        <span class="post-date">4 Oktober 2022</span>
                        <h3 class="post-title">Siswa Kelas 5 Menikmati Belajar di Luar Kelas</h3>
                        <a href="https://www.youtube.com/embed/B1Rxlu0rzPI"
                            class="readmore stretched-link mt-auto"><span>Tonton Video</span><i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Recent Blog Posts Section -->

    <!-- ======= Gallery Photo ====== -->
    <section class="slider">
        {{-- <div class="container-wrap">
            <div class="row no-gutters">
                <div class="col-md-3 ftco-animate">
                    <a href="assets/img/images/image-1.jpg"
                        class="gallery image-popup img d-flex align-items-center"><img
                            src="{{ asset('front/img/images/image-1.jpg') }}" alt="" srcset=""
        width="100%" height="100%">
        <div class="icon mb-4 d-flex align-items-center justify-content-center">
        </div>
        </a>
        </div>
        <div class="col-md-3 ftco-animate">
            <a href="" class="gallery image-popup img d-flex align-items-center"><img
                    src="{{ asset('front/img/images/image-2.jpg') }}" alt="" srcset="" width="100%">
                <div class="icon mb-4 d-flex align-items-center justify-content-center">
                </div>
            </a>
        </div>
        <div class="col-md-3 ftco-animate">
            <a href="" class="gallery image-popup img d-flex align-items-center"><img
                    src="{{ asset('front/img/images/image-1.jpg') }}" alt="" srcset="" width="100%" height="100%">
                <div class="icon mb-4 d-flex align-items-center justify-content-center">
                </div>
            </a>
        </div>
        <div class="col-md-3 ftco-animate">
            <a href="" class="gallery image-popup img d-flex align-items-center"><img
                    src="{{ asset('front/img/images/image-2.jpg') }}" alt="" srcset="" width="100%">
                <div class="icon mb-4 d-flex align-items-center justify-content-center">
                </div>
            </a>
        </div>
        </div>
        </div> --}}
        <div class="slider" x-data="{ start: true, end: false }" style="padding-top: 10px;">
            <header class="section-header">
                <h2 style="color: #fff">DOKUMENTASI</h2>
                <p style="color: #fff">GALERI 24</p>
            </header>
            <div class="slider__content" x-ref="slider"
                x-on:scroll.debounce="$refs.slider.scrollLeft == 0 ? start = true : start = false; Math.abs(($refs.slider.scrollWidth - $refs.slider.offsetWidth) - $refs.slider.scrollLeft) < 5 ? end = true : end = false;">
                <div class="slider__item">
                    <img class="slider__image" src="{{ asset('front/img/images/course-6.jpg') }}" alt="Image">
                    <div class="slider__info">
                        <h2 class="fw-bold">Kegiatan 1</h2>
                    </div>
                </div>
                <div class="slider__item">
                    <img class="slider__image" src="{{ asset('front/img/images/image-1.jpg') }}" alt="Image">
                    <div class="slider__info">
                        <h2 class="fw-bold">Kegiatan 2</h2>
                    </div>
                </div>
                <div class="slider__item">
                    <img class="slider__image" src="{{ asset('front/img/images/image-2.jpg') }}" alt="Image">
                    <div class="slider__info">
                        <h2 class="fw-bold">Kegiatan 3</h2>
                    </div>
                </div>
                <div class="slider__item">
                    <img class="slider__image" src="{{ asset('front/img/images/image-3.jpg') }}" alt="Image">
                    <div class="slider__info">
                        <h2 class="fw-bold">Kegiatan 4</h2>
                    </div>
                </div>
                <div class="slider__item">
                    <img class="slider__image" src="{{ asset('front/img/images/image-4.jpg') }}" alt="Image">
                    <div class="slider__info">
                        <h2 class="fw-bold">Kegiatan 5</h2>
                    </div>
                </div>
                <div class="slider__item">
                    <img class="slider__image" src="{{ asset('front/img/images/image-5.jpg') }}" alt="Image">
                    <div class="slider__info">
                        <h2 class="fw-bold">Kegiatan 6</h2>
                    </div>
                </div>
                <div class="slider__item">
                    <img class="slider__image" src="{{ asset('front/img/images/image-6.jpg') }}" alt="Image">
                    <div class="slider__info">
                        <h2 class="fw-bold">Kegiatan 7</h2>
                    </div>
                </div>
                <div class="slider__item">
                    <img class="slider__image" src="{{ asset('front/img/images/course-6.jpg') }}" alt="Image">
                    <div class="slider__info">
                        <h2 class="fw-bold">Kegiatan 8</h2>
                    </div>
                </div>
                <div class="slider__item">
                    <img class="slider__image" src="{{ asset('front/img/images/course-6.jpg') }}" alt="Image">
                    <div class="slider__info">
                        <h2 class="fw-bold">Kegiatan 9</h2>
                    </div>
                </div>
                <div class="slider__item">
                    <img class="slider__image" src="{{ asset('front/img/images/course-6.jpg') }}" alt="Image">
                    <div class="slider__info">
                        <h2 class="fw-bold">Kegiatan 10</h2>
                    </div>
                </div>
            </div>
            <div class="slider__nav" style="display: flex;justify-content: center;">
                <button class="slider__nav__button"
                    x-on:click="$refs.slider.scrollBy({left: $refs.slider.offsetWidth * -1, behavior: 'smooth'});"
                    x-bind:class="start ? '' : 'slider__nav__button--active'">Previous</button>
                <button class="slider__nav__button"
                    x-on:click="$refs.slider.scrollBy({left: $refs.slider.offsetWidth, behavior: 'smooth'});"
                    x-bind:class="end ? '' : 'slider__nav__button--active'">Next</button>
            </div>
        </div>
    </section><!-- Enf Gallery -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <p>INGIN MENGAJUKAN <span class="cus">KONSULTASI DENGAN KAMI ?</span></p>
                <h2 style="margin-top: 15px;">Kami siap memberikan yang terbaik bagi anak dari Ayah Bunda. Apabila
                    ada
                    yang ingin ditanyakan dan disampaikan, kami siap membantu.</h2>
            </header>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="row gy-4">
                                    <div class="col-md-12">
                                        <h5>Kirim Pesan / Pertanyaan untuk Kami?</h5>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="name" class="form-control" placeholder="Nama Anda"
                                            required>
                                    </div>
                                    <div class="col-md-6 ">
                                        <input type="email" class="form-control" name="email" placeholder="E-Mail Anda"
                                            required>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="number" class="form-control" name="subject"
                                            placeholder="Nomor WhatsApp" required>
                                    </div>
                                    <div class="col-md-12">
                                        <textarea class="form-control" name="message" rows="6" placeholder="Pesan"
                                            required></textarea>
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
                            <div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 100%">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.4048921578988!2d112.72388527381668!3d-7.308327671850793!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb7808dc2965%3A0xb38e6b043f1a06b2!2sSD%20Muhammadiyah%2024!5e0!3m2!1sid!2sid!4v1686100342702!5m2!1sid!2sid"
                                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>
@endsection