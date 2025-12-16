@extends('layout.guest.main')
@section('content-title', 'Kurikulum')

@section('content')
<section class="kurikulum" id="kurikulum">
    <div class="container col-md-8">
        <header class="section-header">
            <p>KURIKULUM <span class="blog" style="color: darkorange">24</span></p>
        </header>
        <div class="card" style="border-radius: 15px; background-color: #f7f8cd;">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-4 course d-lg-flex ftco-animate justify-content-center">
                        <div class="img"><img src="{{ asset('front/img/images/de-best.png') }}" alt=""
                                srcset="" width="100%">
                        </div>
                    </div>
                    <div class="col-md-12 mb-4 course d-lg-flex ftco-animate justify-content-center">
                        <div>
                            <h3 style="text-align: center">
                                DE BEST, merupakan akronim dari Dua Puluh Empat Berkarakter
                                dan Beprestasi.
                                DE BEST menjadi pola yang digunakan untuk menumbuhkembangkan semua potensi
                                dan mengoptimalkan potensi dominan yang dimiliki oleh siswa
                                sehingga dapat mencapai prestasi puncak (top achievement).
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="card" style="border-radius: 15px; background-color: #f7f8cd">
            <div class="card-body">
                <div class="col-md-12 course d-lg-flex ftco-animate justify-content-center">
                    <div class="img"><img src="{{ asset('front/img/images/bintang-karakter.png') }}" alt=""
                            srcset="" width="100%">
                    </div>
                </div>
                <div class="col-md-12 mb-4 course d-lg-flex ftco-animate justify-content-center">
                    <div>
                        <h3 style="text-align: center">
                            6 Bintang Karakter adalah sebuah konsep pondasi pilar untuk bisa
                            mambangun manusia berkarakter, dimana setiap pilarnya
                            terdiri dari kumpulan nilai-nilai karakter sejenis.
                            Konsep 6 Bintang Karakter ini merupakan strategi untuk memudahkan penanaman
                            nilai-nilai karakter karena sesuai dengan mekanisme kerja otak,
                            yaitu nilai-nilai tertentu akan lebih mudah dipahami apabila ada polanya.
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="card" style="border-radius: 15px; background-color: #f7f8cd">
            <div class="card-body">
                <div class="col-md-12 mb-4 course d-lg-flex ftco-animate justify-content-center">
                    <header class="section-header">
                        <h2>KURIKULUM</h2>
                        <p>7 KECAKAPAN <span class="blog" style="color: darkorange">SEPANJANG HAYAT</span></p>
                    </header>
                </div>
                <div class="col-md-12 mb-4 course d-lg-flex ftco-animate p-30">
                    {{-- <div>
                        <i class="fa-regular fa-square-check fa-2xl" style="margin-top: 30px; word-spacing:5px"><span style="font-size: 30px"> Integritas </span></i>
                        <i class="fa-regular fa-square-check fa-2xl" style="margin-top: 30px; word-spacing:5px"><span style="font-size: 30px"> Integritas </span></i>
                        <i class="fa-regular fa-square-check fa-2xl" style="margin-top: 30px; word-spacing:5px"><span style="font-size: 30px"> Integritas </span></i>
                        <i class="fa-regular fa-square-check fa-2xl" style="margin-top: 30px; word-spacing:5px"><span style="font-size: 30px"> Integritas </span></i>
                        <i class="fa-regular fa-square-check fa-2xl" style="margin-top: 30px; word-spacing:5px"><span style="font-size: 30px"> Integritas </span></i>
                        <i class="fa-regular fa-square-check fa-2xl" style="margin-top: 30px; word-spacing:5px"><span style="font-size: 30px"> Integritas </span></i>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
