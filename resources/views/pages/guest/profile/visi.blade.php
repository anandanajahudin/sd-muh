@extends('layout.guest.main')
@section('content-title', 'Visi Misi')

@section('content')
<section id="services" class="services">
    <div class="container" data-aos="fade-up">
        <header class="section-header">
            <p>Visi & Misi Kami</p>
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
@endsection
