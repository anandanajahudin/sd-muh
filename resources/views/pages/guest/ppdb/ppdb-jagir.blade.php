@extends('layout.guest.main')

@section('content-title', 'SPMB SK24')

@section('content')
    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <p>SISTEM PENERIMAAN MURID BARU (SPMB)</p>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                        {{ $message }}, Silahkan Klik <i class="bi bi-arrow-right"></i>
                        <a href="https://wa.me/6282131502424" class="btn btn-primary">Konfirmasi Pembayaran</a>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i
                                class="ti-close"></i></button>
                    </div>
                @endif
            </header>

            {{-- <div class="row gy-4 d-felx justify-content-center" data-aos="fade-left">
                <img src="{{ asset('front/img/images/logo.png') }}" alt="" width="20px" height="20px">


                <img src="{{ asset('repo/ppdb/spmb-banner.jpeg') }}" class="img-fluid" alt="">
            </div> --}}

            <div class="ppdb-wrapper text-center" data-aos="fade-left">

                <!-- Logo + Ilustrasi Atas -->
                <div class="ppdb-header">
                    <img src="{{ asset('front/img/images/logo.png') }}"
                        alt="Logo SD Muhammadiyah 24">

                    <h5 class="ppdb-subtitle">
                        Sistem Penerimaan Murid Baru (SPMB)
                    </h5>

                    <h3 class="ppdb-title">
                        SD Muhammadiyah 24 Surabaya
                    </h3>

                    <p class="ppdb-year">
                        Tahun Pelajaran 2026/2027
                    </p>
                </div>

                <!-- Banner Utama -->
                <div class="ppdb-banner mt-4">
                    <img src="{{ asset('repo/ppdb/spmb-banner.jpeg') }}"
                        class="img-fluid rounded shadow"
                        alt="Banner SPMB">
                </div>
            </div>

            <div class="card bayar">
                <div class="card-body" style="border-radius: 25px">
                    <header class="section-header" style="padding-bottom: -20px">
                        <p>INFORMASI <span class="pr">SPMB {{ $ppdbTahunIni }}</span></p>
                    </header>

                    <div class="px-5">
                        <div class="px-5">{!! $ppdbDeskripsi !!}</div>
                        @if ($ppdbVidio != null)
                            <div class="d-flex flex-column">
                                <iframe src="https://www.youtube.com/embed/{{ $ppdbVidio }}"
                                    title="PPDB {{ $ppdbTahunIni }}" frameborder="0" height="400"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen></iframe>
                            </div>
                        @endif
                        <hr />

                        <div class="text-center d-grid gap-2" style="margin: 30px">
                            {{-- <a href="{{ route('formulir') }}" class="btn-daftar-kelas btn-block mb-2"> --}}
                            <a href="https://bit.ly/SPMBSDM24" class="btn-daftar-kelas btn-block mb-2">
                                <span class="keterangan">Daftar Kelas</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                            @if ($ppdbFile != null)
                                @if (file_exists('repo/ppdb/' . $tahunIni . '/' . $ppdbFile))
                                    <a href="{{ asset('repo/ppdb/' . $tahunIni . '/' . $ppdbFile) }}" target="_blank"
                                        class="btn-download btn-block">
                                        <span class="keterangan">Download Brosur</span>
                                        <i class="bi bi-download"></i>
                                    </a>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section><!-- End Pricing Section -->
@endsection

@push('scripts')
    <style>
        .ppdb-wrapper {
            padding: 10px 15px;
        }

        .ppdb-header {
            max-width: 700px;
            margin: 0 auto;
        }

        .ppdb-subtitle {
            color: #009688;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .ppdb-title {
            font-weight: 700;
            color: #004d40;
            margin-bottom: 5px;
        }

        .ppdb-year {
            font-size: 14px;
            color: #555;
        }

        .ppdb-banner img {
            max-width: 100%;
            border-radius: 12px;
        }

    </style>
@endpush
