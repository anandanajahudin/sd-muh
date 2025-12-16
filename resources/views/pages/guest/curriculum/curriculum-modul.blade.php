@extends('layout.guest.main')
@section('content-title', 'Modul Belajar')

@section('content')
<section class="modul" id="modul">
    <div class="container col-md-8">

        <header class="section-header">
            <p><span class="blog" style="color: darkorange">MODUL PEMBELAJARAN</span></p>
        </header>

        @php
            // Ambil semua modul + relasi KelasMaster
            $allModuls = App\Models\Modul::with('jenisModul', 'modulKelas')
                ->orderBy('judul', 'ASC')
                ->get()
                ->groupBy(fn($item) => $item->modulKelas->kelas); // group by angka kelas
        @endphp


        @foreach ($kelasMasters->groupBy('kelas') as $kelasNumber => $kelasGroup)

            <div class="mt-5 mb-3">
                <h2 class="text-center fw-bold">
                    Kelas {{ $kelasNumber }}
                </h2>
            </div>

            @php
                // Ambil modul berdasarkan angka kelas
                $moduls = $allModuls[$kelasNumber] ?? collect();
            @endphp

            @if ($moduls->count() > 0)
                <div class="row">
                    @foreach ($moduls as $modul)
                        <div class="col-md-4 col-lg-3 mb-4">
                            <div class="card shadow-sm h-100" style="border-radius: 12px;">

                                @if($modul->gambar)
                                    <img src="{{ asset('uploads/modul/'.$modul->gambar) }}"
                                        class="card-img-top"
                                        style="border-radius: 12px 12px 0 0; height: 160px; object-fit: cover;">
                                @else
                                    <div style="height:160px; background:#f1f1f1; border-radius: 12px 12px 0 0;"
                                        class="d-flex justify-content-center align-items-center">
                                        <i class="fa-solid fa-book fa-3x text-secondary"></i>
                                    </div>
                                @endif

                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title fw-bold">
                                        {{ $modul->judul }}
                                    </h5>

                                    <p class="card-text text-muted" style="flex-grow:1">
                                        {{ Str::limit(strip_tags($modul->deskripsi), 80) }}
                                    </p>

                                    <span class="badge bg-warning text-dark mb-2">
                                        {{ $modul->jenisModul->judul ?? 'Tidak ada jenis' }}
                                    </span>

                                    @if($modul->file)
                                        <a href="{{ asset('repo/modul/'.$modul->id_kelas_master.'/'.$modul->id.'/'.$modul->file) }}"
                                        class="btn btn-primary btn-sm mt-auto"
                                        target="_blank"
                                        style="border-radius: 8px;">
                                        <i class="fa-solid fa-download"></i> Download Modul
                                        </a>
                                    @endif
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center text-muted">
                    <i>Belum ada modul untuk kelas ini.</i>
                </p>
            @endif

            <hr class="my-5">

        @endforeach


    </div>
</section>
@endsection
