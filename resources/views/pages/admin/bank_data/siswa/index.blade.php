@extends('layout.admin.main')

@section('title', 'Data Siswa | SekolahKarakter24')

@section('sidebar')
    @include('layout.admin.partials.sidebar.bank')
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
            <h5>Data Siswa</h5>

            @if (auth()->user()->jenis == 'Kepala Sekolah' ||
                    auth()->user()->jenis == 'admin' ||
                    auth()->user()->jenis == 'Bendahara')
                <div class="card-header-right mr-3">
                    <a data-toggle="modal" data-target="#addSiswaModal">
                        <button class="btn btn-success btn-round btn-sm">Tambah</button>
                    </a>

                    @if (auth()->user()->jenis == 'admin')
                        <a data-toggle="modal" data-target="#importUserSiswaModal">
                            <button class="btn btn-info btn-round btn-sm">Import User Siswa</button>
                        </a>
                        <a data-toggle="modal" data-target="#importPpdbSiswaModal">
                            <button class="btn btn-info btn-round btn-sm">Import PPDB Siswa</button>
                        </a>
                        <a data-toggle="modal" data-target="#importSiswaModal">
                            <button class="btn btn-info btn-round btn-sm">Import Siswa</button>
                        </a>
                    @endif
                </div>
        </div>
        @endif

        <div class="card-body">
            <div class="card-block table-border-style">
                <div class="table-responsive">
                    <table id="tabel" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tahun Ajaran</th>
                                <th>Kelas</th>
                                <th>NIS</th>
                                <th>NISN</th>
                                <th>Nama</th>
                                <th>Gender</th>
                                {{-- <th>Asal TK</th> --}}
                                <th>Mutasi dari SD</th>
                                <th>Nama Ayah</th>
                                <th>Pekerjaan Ayah</th>
                                <th>Pendapatan Ayah</th>
                                <th>Nama Ibu</th>
                                <th>Pekerjaan Ibu</th>
                                <th>Pendapatan Ibu</th>
                                <th>Alamat</th>

                                @if (auth()->user()->jenis == 'Kepala Sekolah' ||
                                        auth()->user()->jenis == 'admin' ||
                                        auth()->user()->jenis == 'Bendahara')
                                    <th>Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $siswa)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $siswa->kelasSiswa->tahun_ajaran }}</td>
                                    <td>{{ $siswa->kelasSiswa->namaKelas->nama_kelas }}</td>
                                    <td>{{ $siswa->nis }}</td>
                                    <td>{{ $siswa->nisn }}</td>
                                    <td>{{ $siswa->ppdbSiswa->nama }}</td>
                                    <td>
                                        @if ($siswa->ppdbSiswa->gender == 'L')
                                            Laki-laki
                                        @else
                                            Perempuan
                                        @endif
                                    </td>
                                    {{-- <td>
                                        @if ($siswa->ppdbSiswa->tkSiswa->nama != null)
                                            {{ $siswa->ppdbSiswa->tkSiswa->nama }}
                                        @else
                                        @endif
                                    </td> --}}
                                    <td>
                                        @if ($siswa->id_mutasi != null)
                                            {{ $siswa->mutasi->nama }}
                                        @else
                                        @endif
                                    </td>
                                    <td>{{ $siswa->ppdbSiswa->nama_ayah }}</td>
                                    <td>
                                        @if ($siswa->ppdbSiswa->pekerjaan_ayah != null)
                                            {{ App\Models\Pekerjaan::where('id', $siswa->ppdbSiswa->pekerjaan_ayah)->first()->judul }}
                                        @else
                                        @endif
                                    </td>
                                    <td>@currency($siswa->ppdbSiswa->pendapatan_ayah)</td>
                                    <td>{{ $siswa->ppdbSiswa->nama_ibu }}</td>
                                    <td>
                                        @if ($siswa->ppdbSiswa->pekerjaan_ibu != null)
                                            {{ App\Models\Pekerjaan::where('id', $siswa->ppdbSiswa->pekerjaan_ibu)->first()->judul }}
                                        @else
                                        @endif
                                    </td>
                                    <td>@currency($siswa->ppdbSiswa->pendapatan_ibu)</td>
                                    <td>{{ $siswa->ppdbSiswa->alamat }}</td>

                                    @if (auth()->user()->jenis == 'Kepala Sekolah' ||
                                            auth()->user()->jenis == 'admin' ||
                                            auth()->user()->jenis == 'Bendahara')
                                        <td class="table-action" width="10%">
                                            <a href="{{ route('siswa') . '/' . $siswa->id }}"
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

    @include('pages.admin.bank_data.siswa.create')
    @include('pages.admin.bank_data.siswa.importUser')
    @include('pages.admin.bank_data.siswa.importPpdbSiswa')
    @include('pages.admin.bank_data.siswa.importSiswa')

@endsection
