@extends('layout.admin.main')

@section('title', 'Data Prestasi Siswa | SekolahKarakter24')

@section('sidebar')
    @include('layout.admin.partials.sidebar.bank')
@endsection

@section('content')
    <!-- Basic table card start -->
    <div class="card">
        <div class="card-header">
            <h5>Data Prestasi Siswa</h5>
        </div>

        <div class="card-block">

            <div class="row">
                <div class="col-lg-12 col-xl-12">
                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Kelas</b></label>
                        <div class="col-lg-9 col-xl-9 col-form-label">
                            {{ $prestasiSiswa->siswaPrestasi->kelasSiswa->namaKelas->nama_kelas }}
                            ({{ $prestasiSiswa->siswaPrestasi->kelasSiswa->tahun_ajaran }})
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Siswa</b></label>
                        <div class="col-lg-9 col-xl-9 col-form-label">
                            {{ $prestasiSiswa->siswaPrestasi->ppdbSiswa->nama }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Judul</b></label>
                        <div class="col-lg-9 col-xl-9 col-form-label">
                            {{ $prestasiSiswa->judul }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Juara</b></label>
                        <div class="col-lg-9 col-xl-9 col-form-label">
                            {{ $prestasiSiswa->juara }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Tempat Kompetisi</b></label>
                        <div class="col-lg-9 col-xl-9 col-form-label">
                            {{ $prestasiSiswa->tempat_kompetisi }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Tanggal Kompetisi</b></label>
                        <div class="col-lg-9 col-xl-9 col-form-label">
                            {{ date('d M Y', strtotime($prestasiSiswa->tgl_kompetisi)) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Kategori</b></label>
                        <div class="col-lg-9 col-xl-9 col-form-label">
                            {{ $prestasiSiswa->kategori }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Deskripsi</b></label>
                        <div class="col-lg-9 col-xl-9 col-form-label">
                            {!! $prestasiSiswa->deskripsi !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Foto</b></label>
                        <div class="col-lg-9 col-xl-9 col-form-label">
                            @if ($prestasiSiswa->foto != null)
                                @if (file_exists('repo/prestasi/' . date('Y', strtotime($prestasiSiswa->tgl_kompetisi)) . '/' . $prestasiSiswa->foto))
                                    <a href="{{ asset('repo/prestasi/' . date('Y', strtotime($prestasiSiswa->tgl_kompetisi)) . '/' . $prestasiSiswa->foto) }}"
                                        class="btn btn-info btn-sm" target="_blank">
                                        Preview
                                    </a>
                                @endif
                            @endif
                        </div>
                    </div>
                    <a href="{{ url()->previous() }}" class="btn btn-sm btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>

                    @if (auth()->user()->jenis == 'admin')

                        @if ($prestasiSiswa->foto != null)
                            @if (file_exists('repo/prestasi/' . date('Y', strtotime($prestasiSiswa->tgl_kompetisi)) . '/' . $prestasiSiswa->foto))
                                {{-- @if (file_exists('storage/siswa/' . $prestasiSiswa->id_siswa . '/prestasi' . '/' . $prestasiSiswa->foto)) --}}
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#addFotoModal">Ganti Foto</button>
                            @else
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#addFotoModal">Upload Foto</button>
                            @endif
                        @else
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#addFotoModal">Upload Foto</button>
                        @endif

                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                            data-target="#editPrestasiSiswaModal">Ubah Data</button>

                        <form action="{{ route('prestasiSiswa.destroy', $prestasiSiswa->id) }}" class="d-inline"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="deleteFunction()">Hapus</button>
                        </form>
                    @else
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Basic table card end -->

    @include('pages.admin.bank_data.prestasi.uploadFoto')
    @include('pages.admin.bank_data.prestasi.edit')

@endsection

<script>
    function deleteFunction() {
        event.preventDefault(); // prevent form submit
        var form = event.target.form; // storing the form
        swal({
                title: "Anda yakin ingin menghapus?",
                // text: "But you will still be able to retrieve this file.",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ya!",
                cancelButtonText: "Tidak!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    form.submit(); // submitting the form when user press yes
                } else {
                    // swal("Cancelled", "Your imaginary file is safe :)", "error");
                    swal("Dibatalkan", "", "error");
                }
            });
    }
</script>
