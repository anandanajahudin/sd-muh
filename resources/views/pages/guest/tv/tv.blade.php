@extends('layout.guest.main')
@section('content-title', '24 TV')

@section('content')
    <!-- ======= Recent Blog Posts Section ======= -->
    <section id="recent-blog-posts" class="recent-blog-posts">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <h2>BERITA</h2>
                <p>24 <span class="blog" style="color: #539165;">TV</span></p>
            </header>
            <div class="row">
                @foreach ($beritaTv as $beritaTv)
                    <div class="col-lg-4">
                        <div class="post-box">
                            <div class="post-img">
                                <iframe width="100%" src="https://www.youtube.com/embed/{{ $beritaTv->link_vidio }}"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen></iframe>
                            </div>
                            <span class="post-date">
                                <i class="fas fa-user-alt"></i> {{ $beritaTv->userPost->name }}
                                &nbsp;/&nbsp; <i class="fas fa-calendar-alt"></i>
                                {{ date('d M Y', strtotime($beritaTv->created_at)) }}
                            </span>
                            <a href="{{ route('tvDetail', $beritaTv) }}">
                                <h3 class="post-title">{{ $beritaTv->judul }}</h3>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section><!-- End Recent Blog Posts Section -->
@endsection
