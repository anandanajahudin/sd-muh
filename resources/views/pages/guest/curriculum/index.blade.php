@extends('layout.guest.main')
@section('content-title', 'Kurikulum')

@section('content')
<section class="kurikulum" id="kurikulum">
    <div class="container col-md-8">
        <header class="section-header">
            <p><span class="blog" style="color: darkorange">KURIKULUM 24</span></p>
        </header>

        @foreach ($kurikulum as $kurikulum)
            <div class="card" style="border-radius: 15px; background-color: #f7f8cd;">
                <div class="card-body">
                    <div class="row">
                        @if($kurikulum->id == 1 || $kurikulum->id == 2)
                            <div class="col-md-12 mb-4 course d-lg-flex ftco-animate justify-content-center">
                                <div class="img">
                                    @php
                                        $logo = '';
                                        if ($kurikulum->id == 1) {
                                            $logo = 'de-best.png';
                                        } else if ($kurikulum->id == 2) {
                                            $logo = 'bintang-karakter.png';
                                        } else {}
                                        @endphp
                                    <img src="{{ asset('front/img/images/'.$logo ) }}"
                                    alt="" srcset="" width="100%">
                                </div>
                            </div>
                        @endif

                        <header class="section-header">
                            <p><span class="kurikulumTitle" style="color: darkorange">{{ $kurikulum->judul }}</span></p>
                        </header>
                        <div class="col-md-12 mb-4 course d-lg-flex ftco-animate justify-content-center">
                            <div class="text-center px-5">
                                {!! $kurikulum->deskripsi !!}
                            </div>
                        </div>
                        <div class="col-md-12 mb-4 course d-lg-flex ftco-animate p-30">
                            <div class="px-5">
                                @if($kurikulum->id == 1 || $kurikulum->id == 2)
                                    @php
                                        $detailKurikulum = App\Models\KurikulumDetail::where('id_kurikulum', $kurikulum->id)->get();
                                    @endphp

                                    @foreach ($detailKurikulum as $detailKurikulum)
                                        <hr/>
                                        <h3 style="margin-bottom: 10px; margin-top: 20px;">
                                            <i class="fa-regular fa-square-check fa-xl"></i>
                                            {{ $detailKurikulum->judul }}
                                        </h3>
                                        {!! $detailKurikulum->deskripsi !!}
                                    @endforeach

                                @elseif ($kurikulum->id == 3 || $kurikulum->id == 4 || $kurikulum->id == 5)
                                    @php
                                        $detailKurikulum = App\Models\KurikulumDetail::where('id_kurikulum', $kurikulum->id)->get();
                                    @endphp

                                    @foreach ($detailKurikulum as $detailKurikulum)
                                        <h3 style="margin-bottom: 20px;">
                                            <i class="fa-regular fa-square-check fa-xl"></i>
                                            {{ $detailKurikulum->judul }}
                                        </h3>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        @endforeach
    </div>
</section>
@endsection
