@extends('layout.guest.main')
@section('content-title', 'Ekskul '.$programUnggulan->judul)

@section('content')
<section class="news-full" id="news-full">
    <div class="container col-md-8">
        <header class="section-header">
            <h2>PROGRAM UNGGULAN</h2>
            <p><span class="blog">{{ $programUnggulan->judul }}</span></p>
        </header>
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12 sm-12 mb-4 course d-lg-flex ftco-animate justify-content-center">
                        <div class="container-fluid bg-light">
                            <div class="card-body">
                                <img src="{{ asset('repo/programUnggulan/'.$programUnggulan->id.'/'.$programUnggulan->logo) }}" style="margin: 0px auto; width: 20%; height: 20%;" class="img-fluid d-flex justify-content-center" alt="{{ $programUnggulan->judul }}">
                                {!! $programUnggulan->deskripsi !!}

                                <hr/>
                                <h5><b>Kegiatan</b></h5>
                                <div class="row">
                                    @foreach ($kegiatan as $kegiatan)
                                        <div class="col-md-4">
                                            <a href="{{ route('programUnggulanDetail.show', $kegiatan->id) }}">
                                                <div class="card p-3" style="background: #fff; border-color:#539165;">
                                                    <img src="{{ asset('repo/programUnggulan/'.$kegiatan->id_program_unggulan.'/'.$kegiatan->foto) }}" class="img-fluid d-flex justify-content-center" alt="{{ $programUnggulan->judul }}">
                                                    {{ $kegiatan->judul }}
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                                <hr/>

                                <h5><b>Prestasi</b></h5>
                                <div class="row">
                                    @foreach ($prestasi as $prestasi)
                                        <div class="col-md-4">
                                            <a href="{{ route('programUnggulanDetail.show', $prestasi->id) }}">
                                                <div class="card p-3" style="background: #fff; border-color:#539165;">
                                                    <img src="{{ asset('repo/programUnggulan/'.$prestasi->id_program_unggulan.'/'.$prestasi->foto) }}" class="img-fluid d-flex justify-content-center" alt="{{ $programUnggulan->judul }}">
                                                    {{ $prestasi->judul }}
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                                <hr/>

                                <h5><b>Brosur</b></h5>
                                <div class="row">
                                    @foreach ($brosur as $brosur)
                                        <div class="col-md-4">
                                            <a href="{{ route('programUnggulanDetail.show', $brosur->id) }}">
                                                <div class="card p-3" style="background: #fff; border-color:#539165;">
                                                    <img src="{{ asset('repo/programUnggulan/'.$brosur->id_program_unggulan.'/'.$brosur->foto) }}" class="img-fluid d-flex justify-content-center" alt="{{ $programUnggulan->judul }}">
                                                    {{ $brosur->judul }}
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
