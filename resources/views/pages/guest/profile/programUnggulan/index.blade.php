@extends('layout.guest.main')
@section('content-title', 'Program Unggulan')

@section('content')
<section id="services" class="services">
    <div class="container" data-aos="fade-up">
        <header class="section-header">
            <p>Program Unggulan</p>
        </header>
        <div class="row gy-4">
            <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
                <div class="row gy-4">
                    @foreach ($programUnggulan as $programUnggulan)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                            <a href="{{ route('programUnggulan.show', $programUnggulan->id) }}">
                                <div class="service-box blue">
                                    <img src="{{ asset('repo/programUnggulan/'.$programUnggulan->id.'/'.$programUnggulan->logo) }}" class="img-fluid mb-3" alt=""
                                        width="100px" height="100px">
                                    <h3>{{ $programUnggulan->judul }}</h3>
                                    {!! $programUnggulan->deskripsi !!}
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
