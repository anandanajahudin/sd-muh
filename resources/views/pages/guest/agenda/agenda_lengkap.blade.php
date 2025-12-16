@extends('layout.guest.main')
@section('content-title', 'Detail Berita')

@section('content')
<section class="news-full" id="news-full">
    <div class="container col-md-8">
        <header class="section-header">
            <p>AGENDA <span class="blog">24</span></p>
        </header>
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12 sm-12 mb-4 course d-lg-flex ftco-animate justify-content-center">
                        <div class="container-fluid bg-light">
                            <p class="news-title">{{ $agenda->judul }}</p>
                            <div class="card-body">
                                <img src="{{ asset('repo/berita/dataAgenda/'.$agenda->id.'/'.$agenda->gambar) }}" class="img-fluid" alt="Responsive image">
                                <div class="p-2 d-flex justify-content-between align-items-center">
                                    <span>
                                        <i class="fas fa-user-alt"></i> {{ $agenda->userPost->name }}
                                        &nbsp;/&nbsp; <i class="fas fa-calendar-alt"></i>
                                        {{ date('d M Y', strtotime($agenda->created_at)) }}
                                    </span>
                                </div>
                                {!! $agenda->deskripsi !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
