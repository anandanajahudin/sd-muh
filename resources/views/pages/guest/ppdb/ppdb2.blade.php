@extends('layout.guest.main')
@section('content-title', 'PPDB SK24')
@section('content')
<!-- ======= Pricing Section ======= -->
<section id="pricing" class="pricing">
    <div class="container" data-aos="fade-up">
        <header class="section-header">
            <h2>PPDB</h2>
            <p>PENERIMAAN PESERTA <span class="pr">DIDIK BARU</span></p>
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="ti-close"></i></button>
                </div>
            @endif
        </header>
        <div class="row gy-4 d-felx justify-content-center" data-aos="fade-left">
            <div class="col-lg-3 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="100">
                <div class="box">
                    <h3 style="color: #7c4706;">Reguler Class</h3>
                    {{-- <div class="price"><sup>Rp</sup>x.xxx.xxx,00<span></span></div> --}}
                    <img src="{{ asset('front/img/images/munaqosyah.jpg') }}" class="img-fluid" alt="">
                    <ul>
                        <li>22 Siswa/Kelas</li>
                        <li>Metode Belajar Modul</li>
                        <li>Program Hafidz Quran 2 Juz</li>
                    </ul>
                    {{-- <a href="#" class="btn-buy">Registrasi</a> --}}
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                <div class="box">
                    {{-- <span class="featured">Favorite</span> --}}
                    <h3 style="color: #142403;">Billingual Class</h3>
                    {{-- <div class="price"><sup>Rp</sup>x.xxx.xxx,00<span></span></div> --}}
                    <img src="{{ asset('front/img/images/munaqosyah.jpg') }}" class="img-fluid" alt="">
                    <ul>
                        <li>28 Siswa/Kelas</li>
                        <li>Tipe Kelas 3 Bahasa</li>
                        <li>Program Hafidz Quran 4 Juz</li>
                    </ul>
                    {{-- <a href="#" class="btn-buy">Registrasi</a> --}}
                </div>
            </div>
        </div>
        <div class="card bayar">
            <div class="card-body" style="border-radius: 25px">
                {{-- <div class="row" style="border-radius: 25px"> --}}
                    <div class="col-md-12 col-lg-12 col-xl-12 mb-4 mb-md-0">
                        <header class="section-header" style="padding-bottom: -20px">
                            <p>INFORMASI <span class="pr">PEMBAYARAN</span></p>
                        </header>
                        <div>
                            <p class="text-center">
                                Konfirmasi pendaftaran dengan mengirimkan foto bukti pembayaran via WA dengan klik
                                tombol
                                "Konfirmasi Pembayaran Formulir". Setelah konfirmasi pembayaran silahkan daftar dengan
                                klik tombol "Daftar Kelas" <br></p>
                            <p class="text-center fw-bold">
                                Silahkan Melakukan Pembayaran Formulir Pendaftaran Sesuai Kelas yang Dipilih Ke Nomor
                                Rekening :
                            </p>
                            <p class="text-center">Informasi Rekening a/n SD MUHAMMADIYAH 24 SURABAYA</p>
                            <hr/>
                            <div class="d-flex flex-column mb-3">
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
                            </div>
                            <div class="text-center d-grid gap-2" style="margin: 30px">
                                {{-- <a href="/formulir" class="btn btn-warning btn-block mb-2"> --}}
                                <a href="{{ route('formulir') }}" class="btn-daftar-kelas btn-block mb-2">
                                    <span class="keterangan">Daftar Kelas</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                                {{-- <a href="https://wa.me/6282131502424" class="btn btn-primary btn-block"> --}}
                                <a href="https://wa.me/6282131502424" class="btn-konfirmasi btn-block">
                                    <span class="keterangan">Konfirmasi Pembayaran</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                {{-- </div> --}}
            </div>
        </div>



</section>
</div>
</div>
</section><!-- End Pricing Section -->
@endsection
