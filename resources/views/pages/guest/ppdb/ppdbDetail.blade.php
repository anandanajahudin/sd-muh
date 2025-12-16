@extends('layout.guest.main')
@section('content-title', 'PPDB SK24')
@section('content')
<!-- ======= Pricing Section ======= -->
<section id="pricing" class="pricing">
    <div class="container" data-aos="fade-up">
        <header class="section-header">
            <h2>PPDB</h2>
            <p>PENERIMAAN PESERTA DIDIK BARU</p>
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="ti-close"></i></button>
                </div>
            @endif
        </header>
        <div class="card bayar">
            <div class="card-body px-5" style="border-radius: 25px">
                <header class="section-header">
                    <p><span class="pr">{{ $jenisKelas }} Class</span></p>
                </header>
                @foreach ($kelasMaster as $kelasMaster)
                    {!! $kelasMaster->deskripsi !!}
                @endforeach
                <hr/>
                <div class="text-center d-grid gap-2" style="margin: 30px">
                    <a href="{{ route('formulir') }}" class="btn-daftar-kelas btn-block mb-2">
                        <span class="keterangan">Daftar Kelas</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                    @if ($ppdbFile != null)
                        @if(file_exists('repo/ppdb/'.$tahunIni.'/'.$ppdbFile))
                            <a href="{{ asset('repo/ppdb/'.$tahunIni.'/'.$ppdbFile) }}" target="_blank" class="btn-download btn-block">
                                <span class="keterangan">Download Brosur</span>
                                <i class="bi bi-download"></i>
                            </a>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</section><!-- End Pricing Section -->
@endsection
