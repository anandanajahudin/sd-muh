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
            <div class="row gy-4 d-felx justify-content-center" data-aos="fade-left">
                @foreach ($kelasMaster as $kelasMaster)
                    <div class="col-lg-3 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="100">
                        <a href="{{ route('ppdb.detail', $kelasMaster->id) }}">
                            <div class="box">
                                <h3 style="color: #f68c09;">{{ $kelasMaster->jenis }} Class</h3>
                                @php
                                    if ($kelasMaster->jenis == 'Billingual') {
                                        $gambar = 'bilingual.webp';
                                    } else {
                                        $gambar = 'reguler.webp';
                                    }
                                @endphp

                                <img src="{{ asset('repo/ppdb/' . $gambar) }}" class="img-fluid" alt="">

                                <a href="{{ route('ppdb.detail', $kelasMaster->id) }}" class="btn btn-primary btn-block mb-3">
                                    <span class="keterangan">Lihat Kelas</span>
                                </a>

                                {!! $kelasMaster->keterangan !!}
                            </div>
                        </a>
                    </div>
                @endforeach
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
                        {{-- <div class="d-flex flex-column mb-3">
                        <div class="btn-group-vertical" role="group" aria-label="Vertical button group">
                            <input type="radio" class="btn-check" name="options" id="option1"
                                autocomplete="off" />
                            <label class="btn btn-outline-success btn-lg" for="option1">
                                <div class="d-flex justify-content-between">
                                    <span>Bank Muamalat</span>
                                    <span>7730001752</span>
                                </div>
                            </label>

                            <input type="radio" class="btn-check" name="options" id="option2"
                                autocomplete="off" checked />
                            <label class="btn btn-outline-success btn-lg" for="option2">
                                <div class="d-flex justify-content-between">
                                    <span>Bank BSI </span>
                                    <span>8992424240</span>
                                </div>
                            </label>
                        </div>
                    </div> --}}
                        <div class="text-center d-grid gap-2" style="margin: 30px">
                            {{-- <a href="{{ route('formulir') }}" class="btn-daftar-kelas btn-block mb-2"> --}}
                            <a href="https://bit.ly/SPMBSDM24" class="btn-daftar-kelas btn-block mb-2">
                                <span class="keterangan">Daftar Kelas</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                            @if ($ppdbImage != null)
                                @if (file_exists('repo/ppdb/' . $tahunIni . '/' . $ppdbImage))
                                    <a href="{{ asset('repo/ppdb/' . $tahunIni . '/' . $ppdbImage) }}" target="_blank"
                                        class="btn-download btn-block">
                                        <span class="keterangan">Download Brosur Gambar</span>
                                        <i class="bi bi-download"></i>
                                    </a>
                                @endif
                            @endif

                            @if ($ppdbFile != null)
                                @if (file_exists('repo/ppdb/' . $tahunIni . '/' . $ppdbFile))
                                    <a href="{{ asset('repo/ppdb/' . $tahunIni . '/' . $ppdbFile) }}" target="_blank"
                                        class="btn-download btn-block">
                                        <span class="keterangan">Download Brosur PDF</span>
                                        <i class="bi bi-download"></i>
                                    </a>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
    </section><!-- End Pricing Section -->
@endsection
