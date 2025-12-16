@extends('layout.guest.main')
@section('content-title', '24 TV')

@section('content')
<section class="news" id="news">
    <div class="container col-md-8">
        <header class="section-header">
            <h2>NEWS</h2>
            <p>24 <span class="blog">TV</span></p>
        </header>
        <div class="row">
            @foreach ($beritaTv as $beritaTv)
                <div class="col-md-12 mb-4 course d-lg-flex ftco-animate">
                    <div class="videos">
                        <iframe width="500px" height="300px" src="https://www.youtube.com/embed/{{ $beritaTv->link_vidio }}"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    </div>
                    <div class="text bg-light p-4">
                        <a href="{{ route('tvDetail') }}" class="link">
                            <h4>{{ $beritaTv->judul }}</h4>
                        </a>
                        <div class="p-2 d-flex justify-content-between align-items-center">
                            <span><i class="fas fa-user-alt"></i> {{ $beritaTv->userPost->name }}
                                &nbsp;/&nbsp; <i class="fas fa-calendar-alt"></i>
                                {{ date('d M Y', strtotime($beritaTv->created_at)) }}</span>
                        </div>
                    </div>
                </div>
                <hr>
            @endforeach
            {{-- <div class="col-lg-12 mb-4 course d-lg-flex ftco-animate">
                <div class="videos">
                    <iframe width="500px" height="300px" src="https://www.youtube.com/embed/B1Rxlu0rzPI"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
                <div class="text bg-light p-4">
                    <a href="{{ route('tvDetail') }}" class="link">
                        <p>Silaturrahim Alumni SDM24 Tahun 2010</p>
                    </a>
                    <div class="p-2 d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-user-alt"></i> By Official &nbsp;/&nbsp; <i class="fas fa-calendar-alt"></i> 24 Agustus 2023</span>
                    </div>
                    <h3>Separated they live in. A small river named Duden flows by their place and supplies it with the
                        necessary regelialia. It is a paradisematic country. Separated they live in. A small river named
                        Duden flows by their place and supplies it with the
                        necessary regelialia. It is a paradisematic country</h3>
                </div>
            </div>
            <hr>
            <div class="col-lg-12 mb-4 course d-lg-flex ftco-animate">
                <div class="videos">
                    <iframe width="500px" height="300px" src="https://www.youtube.com/embed/B1Rxlu0rzPI"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
                <div class="text bg-light p-4">
                    <a href="{{ route('tvDetail') }}" class="link">
                        <p>Silaturrahim Alumni SDM24 Tahun 2010</p>
                    </a>
                    <div class="p-2 d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-user-alt"></i> By Official &nbsp;/&nbsp; <i class="fas fa-calendar-alt"></i> 24 Agustus 2023</span>
                    </div>
                    <h3>Separated they live in. A small river named Duden flows by their place and supplies it with the
                        necessary regelialia. It is a paradisematic country. Separated they live in. A small river named
                        Duden flows by their place and supplies it with the
                        necessary regelialia. It is a paradisematic country</h3>
                </div>
            </div>
            <hr>
            <div class="col-lg-12 mb-4 course d-lg-flex ftco-animate">
                <div class="videos">
                    <iframe width="500px" height="300px" src="https://www.youtube.com/embed/B1Rxlu0rzPI"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
                <div class="text bg-light p-4">
                    <a href="{{ route('tvDetail') }}" class="link">
                        <p>Silaturrahim Alumni SDM24 Tahun 2010</p>
                    </a>
                    <div class="p-2 d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-user-alt"></i> By Official &nbsp;/&nbsp; <i class="fas fa-calendar-alt"></i> 24 Agustus 2023</span>
                    </div>
                    <h3>Separated they live in. A small river named Duden flows by their place and supplies it with the
                        necessary regelialia. It is a paradisematic country. Separated they live in. A small river named
                        Duden flows by their place and supplies it with the
                        necessary regelialia. It is a paradisematic country</h3>
                </div>
            </div> --}}
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</section>
@endsection
