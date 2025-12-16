@extends('layout.admin.main')

@section('title', 'Data Testimoni | SekolahKarakter24')

@section('sidebar')
    @include('layout.admin.partials.sidebar.kelolaLanding.testimoni')
@endsection

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"><i class="ti-close"></i></button>
        </div>
    @endif

    <!-- Basic table card start -->
    <div class="card">
        <div class="card-header">
            <h5>Data Testimoni Sekolah</h5>
            <div class="card-header-right mr-3">
                <a data-toggle="modal" data-target="#addTestimoniModal">
                    <button class="btn btn-success btn-round btn-sm">Tambah</button>
                </a>
                {{-- <a href="{{ route('kelas.trash') }}">
                <button class="btn btn-primary btn-round btn-sm"><i class="ti-trash text-white"></i></button>
            </a> --}}
            </div>
        </div>

        <div class="card-body">
            <div class="card-block table-border-style">
                <div class="table-responsive">
                    <table id="tabel" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Judul</th>
                                <th>Nilai</th>
                                <th>Testimoni</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($testimoni as $testimoni)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $testimoni->nama }}</td>
                                    <td>{{ $testimoni->pekerjaan->judul }}</td>
                                    <td>
                                        <div class="stars" style="color: #ffc107;">
                                            @if ($testimoni->nilai == 5)
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                            @elseif ($testimoni->nilai == 4)
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                            @elseif ($testimoni->nilai == 3)
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                            @elseif ($testimoni->nilai == 2)
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                            @else
                                                <i class="bi bi-star-fill"></i>
                                            @endif
                                        </div>
                                    </td>
                                    <td>{{ $testimoni->testimoni }}</td>
                                    <td class="table-action" width="10%">
                                        <a href="{{ route('dataTestimoni') . '/' . $testimoni->id }}"
                                            class="btn btn-primary btn-sm">
                                            <i class="ti-arrow-right"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Basic table card end -->

    @include('pages.admin.landing.testimoni.create')

@endsection
