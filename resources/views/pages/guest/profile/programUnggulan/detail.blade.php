@extends('layout.guest.main')
@section('content-title', 'Program Unggulan '.$programUnggulanDetail->judul)

@section('content')
<section class="news-full" id="news-full">
    <div class="container col-md-8">
        <header class="section-header">
            <h2>PROGRAM UNGGULAN</h2>
            <p>{{ $programUnggulanDetail->programUnggulan->judul }}</p>
        </header>
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12 sm-12 mb-4 course d-lg-flex ftco-animate justify-content-center">
                        <div class="container-fluid bg-light">
                            <p class="news-title">{{ $programUnggulanDetail->judul }}</p>
                            <div class="card-body">
                                <img src="{{ asset('repo/programUnggulan/'.$programUnggulanDetail->id_program_unggulan.'/'.$programUnggulanDetail->foto) }}" class="img-fluid d-flex justify-content-center" alt="{{ $programUnggulanDetail->judul }}">
                                {!! $programUnggulanDetail->deskripsi !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
