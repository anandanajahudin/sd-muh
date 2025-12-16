@extends('layout.admin.main')

@section('title', 'Data Kejadian Siswa | SekolahKarakter24')

@section('sidebar')
    @include('layout.admin.partials.sidebar.bank')
@endsection

@section('content')
    <!-- Basic table card start -->
    <div class="card">
        <div class="card-header">
            <h5>Data Kejadian Siswa</h5>
        </div>

        <div class="card-block">

            <div class="row">
                <div class="col-lg-12 col-xl-12">
                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Kelas</b></label>
                        <div class="col-lg-9 col-xl-9 col-form-label">
                            {{ $kejadianSiswa->siswaKejadian->kelasSiswa->namaKelas->nama_kelas }}
                            ({{ $kejadianSiswa->siswaKejadian->kelasSiswa->tahun_ajaran }})
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Siswa</b></label>
                        <div class="col-lg-9 col-xl-9 col-form-label">
                            {{ $kejadianSiswa->siswaKejadian->ppdbSiswa->nama }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Judul</b></label>
                        <div class="col-lg-9 col-xl-9 col-form-label">
                            {{ $kejadianSiswa->judul }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Tanggal Kejadian</b></label>
                        <div class="col-lg-9 col-xl-9 col-form-label">
                            @if ($kejadianSiswa->tgl_kejadian != null)
                                {{ date('d M Y', strtotime($kejadianSiswa->tgl_kejadian)) }}
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Deskripsi</b></label>
                        <div class="col-lg-9 col-xl-9 col-form-label">
                            {!! $kejadianSiswa->deskripsi !!}
                        </div>
                    </div>
                    <a href="{{ url()->previous() }}" class="btn btn-sm btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>

                    @if (auth()->user()->jenis == 'Kepala Sekolah' ||
                            auth()->user()->jenis == 'admin' ||
                            auth()->user()->jenis == 'Bendahara')
                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                            data-target="#editKejadianSiswaModal">Ubah Data</button>

                        <form action="{{ route('kejadianSiswa.destroy', $kejadianSiswa->id) }}" class="d-inline"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="deleteFunction()">Hapus</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Basic table card end -->

    @include('pages.admin.bank_data.kejadian.edit')

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
