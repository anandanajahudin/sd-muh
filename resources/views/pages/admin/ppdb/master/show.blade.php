@extends('layout.admin.main')

@section('title', 'Data Master PPDB | SekolahKarakter24')

@section('sidebar')
    @include('layout.admin.partials.sidebar.bank')
@endsection

@section('content')
    <!-- Basic table card start -->
    <div class="card">
        <div class="card-header">
            <h5>Data Master PPDB</h5>
        </div>

        <div class="card-block">

            <div class="row">
                <div class="col-lg-8 col-xl-12">
                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Judul</b></label>
                        <div class="col-lg-9 col-xl-9">{{ $ppdb->judul }}</div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Tahun Ajaran</b></label>
                        <div class="col-lg-9 col-xl-9">{{ $ppdb->tahun_ajaran }}</div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Tahun</b></label>
                        <div class="col-lg-9 col-xl-9">{{ $ppdb->tahun }}</div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Tanggal Mulai PPDB</b></label>
                        <div class="col-lg-9 col-xl-9">
                            @if ($ppdb->tgl_awal != null)
                                {{ date('d M Y', strtotime($ppdb->tgl_awal)) }}
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Tanggal Batas PPDB</b></label>
                        <div class="col-lg-9 col-xl-9">
                            @if ($ppdb->tgl_batas != null)
                                {{ date('d M Y', strtotime($ppdb->tgl_batas)) }}
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Deskripsi</b></label>
                        <div class="col-lg-9 col-xl-9">
                            {!! $ppdb->deskripsi !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Gambar Brosur</b></label>
                        <div class="col-lg-9 col-xl-9">
                            @if ($ppdb->brosur != null)
                                @if (file_exists('repo/ppdb/' . $ppdb->tahun . '/' . $ppdb->brosur))
                                    <a href="{{ asset('repo/ppdb/' . $ppdb->tahun . '/' . $ppdb->brosur) }}"
                                        class="btn btn-info btn-sm" target="_blank">
                                        Preview
                                    </a>
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>File Brosur (PDF)</b></label>
                        <div class="col-lg-9 col-xl-9">
                            @if ($ppdb->file != null)
                                @if (file_exists('repo/ppdb/' . $ppdb->tahun . '/' . $ppdb->file))
                                    <a href="{{ asset('repo/ppdb/' . $ppdb->tahun . '/' . $ppdb->file) }}"
                                        class="btn btn-info btn-sm" target="_blank">
                                        Preview
                                    </a>
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Link Vidio</b></label>
                        <div class="col-lg-9 col-xl-9">
                            <a href="https://www.youtube.com/watch?v={{ $ppdb->link }}" target="_blank">
                                {{ $ppdb->link }}</a>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Daftar Calon Siswa/Siswi</b></label>
                        <div class="col-lg-9 col-xl-9">
                            <a href="{{ route('ppdbSiswa.daftarCalonSiswa', $ppdb->id) }}" class="btn btn-info btn-sm">
                                Preview
                            </a>
                        </div>
                    </div>

                    <a href="{{ url()->previous() }}" class="btn btn-sm btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>

                    @if (auth()->user()->jenis == 'Kepala Sekolah' ||
                            auth()->user()->jenis == 'admin' ||
                            auth()->user()->jenis == 'Bendahara')
                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                            data-target="#editPpdbModal">
                            Ubah</button>

                        @if ($ppdb->brosur != null)
                            @if (file_exists('repo/ppdb/' . $ppdb->tahun . '/' . $ppdb->brosur))
                                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                    data-target="#editGambarModal">
                                    Ganti Gambar</button>
                            @else
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#editGambarModal">
                                    Upload Gambar</button>
                            @endif
                        @else
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#editGambarModal">
                                Upload Gambar</button>
                        @endif

                        @if ($ppdb->file != null)
                            @if (file_exists('repo/ppdb/' . $ppdb->tahun . '/' . $ppdb->file))
                                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                    data-target="#editFileModal">
                                    Ganti File</button>
                            @else
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#editFileModal">
                                    Upload File</button>
                            @endif
                        @else
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#editFileModal">
                                Upload File</button>
                        @endif

                        <form action="{{ route('ppdbMaster.destroy', $ppdb->id) }}" class="d-inline" method="POST">
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

    @include('pages.admin.ppdb.master.edit')
    @include('pages.admin.ppdb.master.editGambar')
    @include('pages.admin.ppdb.master.editFile')

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
