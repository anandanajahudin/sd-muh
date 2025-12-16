@extends('layout.admin.main')

@section('title', 'Muhasabah Pegawai | SekolahKarakter24')

@section('sidebar')
    @include('layout.admin.partials.sidebar.muhasabah')
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
            <h5>Muhasabah Pegawai</h5>

            @if (auth()->user()->jenis == 'Kepala Sekolah' ||
                    auth()->user()->jenis == 'admin' ||
                    auth()->user()->jenis == 'Bendahara')
                <div class="card-header-right mr-3">
                    <a data-toggle="modal" data-target="#addMuhasabahModal">
                        <button class="btn btn-success btn-round btn-sm">Tambah</button>
                    </a>
                </div>
            @endif
        </div>

        <div class="card-body">
            <div class="card-block table-border-style">
                <div class="table-responsive">
                    <table id="tabel" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>NBM</th>
                                <th>Nama</th>
                                <th>Jenis</th>

                                @if (auth()->user()->jenis == 'Kepala Sekolah' ||
                                        auth()->user()->jenis == 'admin' ||
                                        auth()->user()->jenis == 'Bendahara')
                                    <th>Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($muhasabahGuru as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->pegawai->nip }}</td>
                                    <td>{{ $user->pegawai->nama }}</td>
                                    <td>{{ ucfirst($user->jenis) }}</td>

                                    @if (auth()->user()->jenis == 'Kepala Sekolah' ||
                                            auth()->user()->jenis == 'admin' ||
                                            auth()->user()->jenis == 'Bendahara')
                                        <td class="table-action" width="10%">
                                            <a href="{{ route('daftarMuhasabah', $user->id) }}"
                                                class="btn btn-primary btn-sm">
                                                <i class="ti-arrow-right"></i>
                                            </a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Basic table card end -->

@endsection
