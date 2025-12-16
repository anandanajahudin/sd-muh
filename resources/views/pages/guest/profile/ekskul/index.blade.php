@extends('layout.guest.main')
@section('content-title', 'Ekstrakulikuler')

@section('content')
<section id="services" class="services">
    <div class="container" data-aos="fade-up">
        <header class="section-header">
            <p>Ekstrakulikuler</p>
        </header>
        <div class="row gy-4">
            <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
                <h3 class="text-center">Olahraga</h3>
                <div class="row gy-4">
                    @foreach ($ekskulOlahraga as $ekskulOlahraga)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                            <a href="{{ route('ekskul.show', $ekskulOlahraga->id) }}">
                                <div class="service-box blue">
                                    <img src="{{ asset('repo/ekskul/'.$ekskulOlahraga->id.'/'.$ekskulOlahraga->logo) }}" class="img-fluid mb-3" alt=""
                                        width="100px" height="100px">
                                    <h3>{{ $ekskulOlahraga->judul }}</h3>
                                    {!! $ekskulOlahraga->deskripsi !!}
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <hr/>
                <h3 class="text-center mt-3">Organisasi</h3>
                <div class="row gy-4">
                    @foreach ($ekskulOrganisasi as $ekskulOrganisasi)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                            <a href="{{ route('ekskul.show', $ekskulOrganisasi->id) }}">
                                <div class="service-box orange">
                                    <img src="{{ asset('repo/ekskul/'.$ekskulOrganisasi->id.'/'.$ekskulOrganisasi->logo) }}" class="img-fluid mb-3" alt=""
                                        width="100px" height="100px">
                                    <h3>{{ $ekskulOrganisasi->judul }}</h3>
                                    {!! $ekskulOrganisasi->deskripsi !!}
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <hr/>
                <h3 class="text-center mt-3">Seni</h3>
                <div class="row gy-4">
                    @foreach ($ekskulSeni as $ekskulSeni)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                            <a href="{{ route('ekskul.show', $ekskulSeni->id) }}">
                                <div class="service-box green">
                                    <img src="{{ asset('repo/ekskul/'.$ekskulSeni->id.'/'.$ekskulSeni->logo) }}" class="img-fluid mb-3" alt=""
                                        width="100px" height="100px">
                                    <h3>{{ $ekskulSeni->judul }}</h3>
                                    {!! $ekskulSeni->deskripsi !!}
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
