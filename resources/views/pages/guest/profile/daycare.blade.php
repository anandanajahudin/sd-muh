@extends('layout.guest.main')
@section('content-title', 'Daycare 24')

@section('content')
    <section class="news-full" id="news-full">
        <div class="container col-md-8">
            <header class="section-header">
                <p><span class="blog">DAYCARE 24</span></p>
            </header>
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12 sm-12 mb-4 course d-lg-flex ftco-animate justify-content-center">
                            <div class="container-fluid bg-light">
                                <div class="card-body">
                                    <img src="{{ asset('repo/daycare/' . $daycare_img) }}"
                                        class="img-fluid d-flex justify-content-center" alt="Daycare 24">
                                    {!! $daycare !!}

                                    {{-- <p>
                                    <b>Daycare 24</b> adalah program fasilitas dari Sekolah Karakter 24 Surabaya
                                    agar memudahkan para Pengajar untuk menitipkan putra-putrinya selama kegiatan belajar mengajar,
                                    tanpa khawatir putra-putrinya tidak mendapatkan perhatian.
                                </p>
                                <p>
                                    Pada program <b>Daycare 24</b> kami menyediakan pendampingan
                                    dan edukasi kepada putra-putri bapak ibu Pengajar
                                    untuk bermain, belajar, beribadah seperti shalat, mengaji,
                                    serta melatih kreativitas putra-putri dengan melakukan praktek bersama teman-teman
                                    dan pendamping Daycare 24.
                                </p> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
