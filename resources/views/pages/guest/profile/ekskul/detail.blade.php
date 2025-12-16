@extends('layout.guest.main')
@section('content-title', 'Ekskul '.$ekskulDetail->judul)

@section('content')
<section class="news-full" id="news-full">
    <div class="container col-md-8">
        <header class="section-header">
            <h2>EKSTRAKULIKULER - {{ $ekskulDetail->ekskul->jenis }}</h2>
            <p>{{ $ekskulDetail->ekskul->judul }}</p>
        </header>
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12 sm-12 mb-4 course d-lg-flex ftco-animate justify-content-center">
                        <div class="container-fluid bg-light">
                            <p class="news-title">{{ $ekskulDetail->judul }}</p>
                            <div class="card-body">
                                <img src="{{ asset('repo/ekskul/'.$ekskulDetail->id_ekskul.'/'.$ekskulDetail->foto) }}" class="img-fluid d-flex justify-content-center" alt="{{ $ekskulDetail->judul }}">
                                {!! $ekskulDetail->deskripsi !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
